<?php @session_start();

require_once 'Conexion.php';
require_once 'VideoModel.php';
require_once '../../baseClass/CriptoString.php';


class CarritoModel{
    private $pdo;
    private $video;
    private $carrito;
    
    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
        $this->video = new VideoModel;
    }
    
    /**
     * Funcion AddProduct
     * 
     * Esta funcion se encarga de direccionar la consulta de si existe o no un carrito y luego
     * procede a agregar el video al carrito correspondiente
     * 
     * @return Int - Codigo de error
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function addProduct($id_plan,$id_usuario,$codeCarrito,$panel,$plantilla,$newMensaje,$fecha){
        $this->actualizarCarrito($id_usuario, $codeCarrito);
        if(!empty($this->carrito)){
            //Agregar video
            return $this->video->addVideo($fecha, $newMensaje, $plantilla, $this->carrito['id_carrito'], $id_plan, $panel);
        }else{
            return 400;
        }
    }

    /**
     * Función ActualizarCarrito
     * 
     * Esta funcion se encarga de actualizar la variable carrito de la clase
     * con el arreglo que nos proporciona la consulta a la BD, de no existir carrito
     * solicita la creacion de uno.
     * 
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function actualizarCarrito($id_usuario,$codigoCarrito){
        $query = "select * from carrito where codigo_carrito=:codigo and id_usuario=:usuario and estado='activo'";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'codigo' => $codigoCarrito,
            'usuario' => $id_usuario
        ]);
        $carrito = $prepared->fetch(PDO::FETCH_ASSOC);
        if(isset($carrito['id_usuario'])){
            $this->carrito = $carrito;
        }else{
            $this->crearCarrito($id_usuario,$codigoCarrito);
        }
    }

    /**
     * Funcion crearCarrito
     * 
     * Esta funcion se encarga de crear un carrito con el codigo que llega
     * como parametro de entrada, luego solicita la actualizarcion del carrito
     * en las variables de la clase
     * 
     * @return Int - Codigo de error | Solicitud de actualizacion
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function crearCarrito($id_usuario,$codeCarrito){
        $sql = "insert into carrito(fecha_creacion,id_usuario,codigo_carrito) values (now(),:usuario,:codigo)";

        $query = $this->pdo->prepare($sql);
        $resultAdd = $query->execute([
            'usuario' => $id_usuario,
            'codigo' => $codeCarrito
        ]);
    
        if ($resultAdd) {
            $this->actualizarCarrito($id_usuario,$codeCarrito);
        }else{
            echo "Fallo Crear Carrito";
        }
    }

    function removeVideo($video, $carrito, $usuario){
        $cripto = new CriptoString;
        $id_video = $cripto->decryptStringUrl($video,'fce13b2907f59949e7e94b9e1','b9b5fc58dcc8d43e');
        //Extramos el costo que vamos a reducir
        $queryResult = $this->pdo->prepare("select p.costo as costo from planes p join video v on p.id_plan=v.id_plan where v.id_video=:video");
        $queryResult->execute([
            'video' => $id_video
        ]);
        $plan  = $queryResult->fetch(PDO::FETCH_ASSOC);
        $responseRemove = $this->video->removeVideo($id_video);
        if($responseRemove == 200){
            $this->actualizarVideoCarrito('0', $carrito, $usuario, $id_video,$plan['costo']);
            return 200;
        }
    }

    function actualizarVideoCarrito($opcion, $carrito, $usuario, $video, $costo){
        switch($opcion){
            case 0:
                //Actualizamos el carrito a -1 video
                $query = "update carrito set total=total-:costo where codigo_carrito = :carrito and id_usuario=:usuario and estado='activo'";
                $prepared = $this->pdo->prepare($query);
                $prepared->execute([
                    'costo' => $costo,
                    'carrito' => $carrito,
                    'usuario' => $usuario
                ]);
                $query = "update carrito set nro_videos=nro_videos-1 where codigo_carrito = :carrito and id_usuario=:usuario and estado='activo'";
                $prepared = $this->pdo->prepare($query);
                $prepared->execute([
                    'carrito' => $carrito,
                    'usuario' => $usuario
                ]);
                break;
            case 1:
                //Por integrar - Falta separar de la clase Video
                break;
        }
    }

    function getListProducts($usuario, $carrito){
        $list = '';
        $total = 0;
        // $car = '';
        $cripto = new CriptoString;
        if($this->consultarEstadoCarrito($carrito, $usuario) > 0){
            $queryResult = $this->pdo->prepare("select v.mensaje as mensaje, v.fecha_publicacion as fecha, p.ubicacion as ubicacion, pl.costo as costo, c.total as total, v.id_video as video, c.codigo_carrito as car from video v join carrito c on v.id_carrito=c.id_carrito join panel p on p.id_panel=v.id_panel join planes pl on pl.id_plan=v.id_plan where c.codigo_carrito=:codigo and c.id_usuario=:usuario and c.estado='activo'");
            $queryResult->execute([
                'codigo' => $carrito,
                'usuario' => $usuario
            ]);
            while ($user = $queryResult->fetch(PDO::FETCH_ASSOC)) {
                $total = $user['total'];
                // $car = $user['car'];
                $id_video = $cripto->encryptStringUrl($user['video'],'fce13b2907f59949e7e94b9e1','b9b5fc58dcc8d43e');
                $list = $list."<div class='row row-item-product' id='".$id_video."'>
                        <div class='col-6' style='text-align: left !important'>
                            <h5>Video amistad</h5>
                            <p class='par-item-product'>".$user['mensaje']."<br>Fecha : ".$user['fecha']."<br><strong>Direccion:</strong>".$user['ubicacion']."</p>
                        </div>
                        <div class='col-2 text-center'>
                            <p class='par-item-product'><strong>S/".$user['costo']."</strong></p>
                        </div>
                        <div class='col-3 text-center'><button id=' {$id_video}' class='btn btn-warning' onclick='sendInv(".$id_video.".id)'>Enviar invitación</button></div>
                        <div class='col-1 text-center'><button id=' {$id_video}' class='btn btn-danger' onclick='removeVideo(".$id_video.".id)'><i class='fas fa-minus icon-delete-product'></i></button></div>
                    </div>";
            }
            $pagar = "<button id='' class='btn btn-primary btn-crear style-morado' type='submit' onclick='pagar()'>Pagar  <strong>S/. ".$total."</strong></button>";
            if(!empty($list)){
                return array('response' => '1','products' => $list,'total' => $pagar);
            }else{
                return array('response' => '0','products' => '','total' => '');
            }
        }else{
            return array('response' => '0','products' => '','total' => '');
        }
    }

    /**
     * Funcion ConsultarEstadoCarrito
     * 
     * Esta funcion se encarga de consultar a la BD la cantidad de videos que existe
     * en un carrito en especifico
     * 
     * @return Int
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function consultarEstadoCarrito($carrito, $usuario){
        $queryResult = $this->pdo->prepare("select nro_videos from carrito where codigo_carrito=:codigo and id_usuario=:usuario and estado='activo'");
        $queryResult->execute([
            'codigo' => $carrito,
            'usuario' => $usuario
        ]);
        $carrito = $queryResult->fetch(PDO::FETCH_ASSOC);
        return $carrito['nro_videos'];
    }

    function removeSessionCar($usuario, $carrito){
        $query = "update carrito set estado='inactivo' where codigo_carrito = :carrito and id_usuario=:usuario and estado='activo'";
        $prepared = $this->pdo->prepare($query);
        $prepared->execute([
            'carrito' => $carrito,
            'usuario' => $usuario
        ]);
    }

}