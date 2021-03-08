<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../libraries/PHPMailer/src/PHPMailer.php';
require_once '../../libraries/PHPMailer/src/Exception.php';
require_once '../../libraries/PHPMailer/src/SMTP.php';

require_once '../../baseClass/CriptoString.php';
require_once 'Conexion.php';
require_once 'UserModel.php';

class RecoveryModel{
    private $pdo;
    private $user;
    private $correoEncrypt = '';
    private $tokenEncrypt = '';
    private $llaveCorreoRecovery = array(
        "clave" => 'correo9para8cifrar7envio6por5la4url3',
        "iv" => 'e71865c3f21caf4a',
    );
    private $tokenRecovery = array(
        "token" => '',
        "iv_token" => '',
        "clave_token" => '',
    );

    function __construct(){
        $cnx = new Conexion;
        $this->pdo = $cnx->startConexion();
    }

    /**
     * Funcion RequestRecovery
     * 
     * Esta funcion es la encargada de gestionar y validar que el correo que solicita
     * la recuperacion de contraseña exista y lo redirige a la funcion
     * correspondiente para continuar con el proceso de recuperacion de contraseña
     * 
     * El retorno posible de esta funcion es un código que puede ser
     * 410 -> Correo no encontrado
     * 1 -> Envio satisfactorio del correo
     * 
     * @return Int
     * @author Alvaro Chico <alvaro.chico®grupomcperu.com>
     */
    function requestRecovery($correo){
        $this->user = new UserModel;
        if($this->user->validCorreo($correo)){
            $sendUser = $this->user->getUser($correo);
            $linkSendEmail = $this->setDataRecovery($sendUser);
            $responseSendEmail = $this->sendEmailRecovery($linkSendEmail, $sendUser);
        }else{
            return 410;
        }
    }

    /**
     * Funcion SetDataRecovery
     * 
     * Esta funcion se encarga de generar los tokens correspondientes oara la recuperacion
     * de la contraseña, asi como de setearlos respectivamente en el usuario que le corresponda
     * para finalmente retornar un link de recuperacion de contraseña.
     * 
     * @return String
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function setDataRecovery($user){
        $cripto = new CriptoString;
        $this->correoEncrypt = $cripto->encryptStringUrl($user['correo'], $this->llaveCorreoRecovery['clave'],$this->llaveCorreoRecovery['iv']);
        $this->tokenRecovery['token'] = $this->getStrongToken($this->getRandToken());
        $this->tokenRecovery['iv_token'] = $this->getRandIv();
        $this->tokenRecovery['clave_token'] = $this->getStrongtoken($user['correo'].$user['telefono']);
        $this->tokenEncrypt = $cripto->encryptStringUrl($this->tokenRecovery['token'],$this->tokenRecovery['clave_token'], $this->tokenRecovery['iv_token']);

        //Seteamos el token, iv_token y la llave en la BD para el usuario correspondiente
        $query = "update usuario set llave=:llave ,iv_token=:iv_token, token=:token where id_usuario=:id_usuario;";
        $queryResult = $this->pdo->prepare($query);
        $queryResult->execute([
            'llave' => $this->tokenRecovery['clave_token'],
            'iv_token' => $this->tokenRecovery['iv_token'],
            'token' => $this->tokenRecovery['token'],
            'id_usuario' => $user['id_usuario']
        ]);

        return "https://surprise.com.pe/auth/pass_verify.php?em=".$this->correoEncrypt."&token=".$this->tokenEncrypt;
    }

    /**
     * Function SendEmailRecovery
     * 
     * Esta funcion es la encargada de enviar el Email al usuario correspondiente
     * para la recuperacion de su contraseña.
     * Devuelve un dato booleano como respuesta de si el correo fue o no
     * enviado al usuario.
     * 
     * @return Boolean
     * @author Alvaro Chico <alvaro.chico@grupomcperu.com>
     */
    function sendEmailRecovery($linkSendEmail, $user){
        /* ************************************************************************************************************************ */
        /* Seteamos destinatario y demas campos */

        $remitente = 'hola@surprise.com.pe';
        $destinatario = $user['correo'];
        $subject = 'Recuperación de contraseña';
        $nameDest = $user['nombre'] . " " . $user['apellido'];


        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);


        /* ************************************************************************************************************************ */

        try {
            //Configuracion de remitente
            $mail->setFrom($remitente, 'Equipo de Surprise');
            $mail->addAddress($destinatario, $nameDest);

            // Content
            $mail->Subject = $subject;


            // Parametros SMTP

            /* Se indica que usaremos SMTP. */
            $mail->isSMTP();
            /* Direccion SMTP de servidor */
            $mail->Host = 'smtp.gmail.com';
            /* Usamos autenticacion SMTP */
            $mail->SMTPAuth = TRUE;
            /* Seteamos encriptacion de sistema */
            $mail->SMTPSecure = 'tls';
            /* Autenticacion SMTP de usuario. */
            $mail->Username = 'hola@surprise.com.pe';
            /* Autenticacion SMTP de pass */
            $mail->Password = 'holasurprise@2021';
            /* Seteamos el puerto */
            $mail->Port = 587;
            /* Seteamos configuracion de caracteres */
            $mail->CharSet = 'UTF-8';

            //CONFIGURACIÓN DEL MENSAJE, EL CUERPO DEL MENSAJE

            //Incrustamos IMG
            $mail->AddEmbeddedImage('../../../public/img/logo.png', 'logo');
            $mail->AddEmbeddedImage('../../../public/img/iconos/carita.png', 'carita');
            $mail->AddEmbeddedImage('../../../public/img/iconos/car.svg', 'correo');
            $mail->AddEmbeddedImage('../../../public/img/iconos/tel.svg', 'telefono');
            $mail->AddEmbeddedImage('../../../public/img/iconos/map.svg', 'direccion');
            $mail->AddEmbeddedImage('../../../public/img/iconos/fb.svg', 'fb');
            $mail->AddEmbeddedImage('../../../public/img/iconos/insta.svg', 'insta');
            //Cargamos la plantilla html   
            $shtml = file_get_contents('../../libraries/plantillasPHPMailer/plantilla.html');

            $cuerpo1 = str_replace('#nombre', $user['nombre'], $shtml);
            $cuerpo = str_replace('#link_recuperacion', $linkSendEmail, $cuerpo1);
            $mail->Body = $cuerpo; //cuerpo del mensaje
            $mail->AltBody = 'Si no puedes ver este mensaje, sigue este enlace para poder recuperar tu cuenta : ' . $linkSendEmail;

            $mail->send();
            echo 1;
        } catch (Exception $e) {
            // echo "Mensaje no enviado. Mailer Error: {$mail->ErrorInfo}";
            // echo $e->errorMessage();
            // echo $e->getMessage();
            echo '409';
        }
        /* ************************************************************************************************************************ */

    }

    function getRandIv(){
        return substr(md5(rand()), 0, 16);
    }
    function getRandToken(){
        return substr(md5(rand()), 0, 30);
    }
    function getStrongToken($string){
        return password_hash($string, PASSWORD_DEFAULT);
    }

}
        