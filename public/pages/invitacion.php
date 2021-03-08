<?php @session_start();

require_once '../../app/controllers/invitacion/InvitacionController.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ../index.php');
}
if (!isset($_GET['inv'])) {
    header('Location: ../index.php');
} else {
    //Validar que video existe
    $inv = new InvitacionController;
    $validVideo = $inv->validVideo($_GET['inv']);
    if ($validVideo == 0) {
        header('Location: ../index.php');
    } else {
        $data = $inv->getDataBasic($_GET['inv']);
        $_SESSION['cod_video'] = $_GET['inv'];
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z1RNYPYEHC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-Z1RNYPYEHC');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surprise</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/media.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/surprise.css">
    <link rel="stylesheet" type="text/css" href="../css/media-surprise.css">

    <script src="../../public/js/index.js"></script>


    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- BOOTSTRAP CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="Icon" href="../img/iconos/favicon.svg" type=”image/x-icon” />
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v9.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution="setup_tool" page_id="106095851325583" theme_color="#c75c59" logged_in_greeting="¡Hola! como podemos ayudarte?" logged_out_greeting="¡Hola! como podemos ayudarte?">
    </div>

    <?php require_once 'includes/popups_surprise.php'; ?>

    <!-- Cabecera -->
    <header class="header content">
        <a href="https://api.whatsapp.com/send?phone=+51 915157954" target="_blank" class="btn-whatsapp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="header-video">
            <video src="../video/video.mp4" autoplay loop></video>
        </div>
        <div class="header-overlay"></div>
        <div class="header-content">
            <!-- NAVBAR -->
            <div class="container-fluid container-nav">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="index.php"><img src="../img/iconos/logo-blanco.svg" alt="Logo Surprise" class="img-personal-fluid mt-3 mb-3"></a>
                    </div>
                </div>
            </div>
            <div class="texto">
                <div class="container-fluid mt-4">
                    <div class="row text-center">
                        <div class="col-12">
                            <h1><strong>GRACIAS</strong></h1>
                        </div>
                        <div class="col-12">
                            <p class="mayus">Por confiarnos tu felicidad y la de tu persona especial</p>
                            <p class="mayus">Nos alegra que ya sean parte de la familia de <strong>surprise</strong></p>
                        </div>
                        <div class="col-12 mt-5 mb-2">
                            <h2><strong>COMPARTE</strong></h2>
                            <p>¡Y llena de alegria!</p>
                            <a class="btn btn-melon text-center mt-2 style-melon" href="#form-float">
                                <h3>Mensaje Sorpresa</h3>
                            </a>
                        </div>
                        <div class="col-12 mb-4">
                            <div><a href="#form-float"><i class="fas fa-angle-double-down"></i></a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="container disp-float mt-5 mb-5" id="form-float">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nombre_r" class="form-label">Nombre del receptor</label>
                <input type="text" class="form-control" id="nombre_r" required>
                <div class="invalid-feedback">
                    Por favor ingresa el nombre del receptor
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="apellido_r" class="form-label">Apellido del receptor</label>
                <input type="text" class="form-control" id="apellido_r" required>
                <div class="invalid-feedback">
                    Por favor ingresa el apellido del receptor
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="telefono_r" class="form-label">Telefono del receptor</label>
                <input type="number" class="form-control" id="telefono_r" required>
                <div class="invalid-feedback">
                    Por favor ingresa el telefono del receptor
                </div>
            </div>
            <div class=" col-12 mb-3">
                <label for="mensaje_r" class="form-label">Escribe un mensaje</label>
                <textarea class="form-control txa-mensaje" id="mensaje_r" placeholder="Escribe aqui tu mensaje" required></textarea>
                <div class="invalid-feedback">
                    Por favor escribe un mensaje</div>
            </div>
            <div class=" col-12 mb-3">
                <label class="form-label">Ubicacion del panel</label>
                <div class="btn-special">
                    <?php echo $data['ubicacion']; ?>
                </div>
            </div>
            <div class=" col-12 col-md-4 mb-3">
                <label class="form-label">Fecha del anuncio</label>
                <div class="text-center btn-special">
                    <?php echo $data['fecha']; ?>
                </div>
            </div>
            <div class="col-12 text-center mt-3 mb-3" id="alertResponseShare">
                <p id="txtResponseShare" style="text-transform: none;" class="mb-0"></p>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary btn-crear style-morado" id="btn-compartir-inv" type="submit" onclick="compartir()">Compartir</button>
            </div>
        </div>
    </div>

    <!-- Button link modal -->
    <button id="success" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="display:none;">
    </button>



    <section class="container px-5 mt-3 mb-3">
        <div class="row anuncio">
            <div class="col-12 p-4">
                <p>"Recuerde que su anuncio debe hacerlo <strong>antes de las 5 P.M.</strong> si quiere que aparezca <strong>el día siguiente.</strong> De no ser asi, se estará subiendo en un plazo de 48 horas."</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->

    <footer id="contacto" class="container-fluid mt-4 p-6">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 align-self-center text-md-left mt-3 mb-3 mt-md-0 mb-md-0">
                <a href="index.php"><img src="../img/iconos/logo-blanco.svg" class="img-foo img-personal-fluid ml-0 ml-md-2 ml-xl-3"></a>
            </div>
            <div class="col-12 col-md-4 col-lg-3 align-self-center">
                <ol class="social-list-inf mb-0 mt-0 pl-0 mt-3 mb-3">
                    <li class="social-item-list-inf flex pl-4 pl-md-0 mb-2">
                        <div class="social-icon-inf mr-3 icon-footer text-center pt-1"><i class="fas fa-envelope socal-icon"></i></div>
                        <a href="mailto:hola@surprise.com" class="social-text-inf">hola@surprise.com.pe</a>
                    </li>

                    <li class="social-item-list-inf flex pl-4 pl-md-0 mb-2">
                        <div class="social-icon-inf mr-3 icon-footer text-center pt-1"><i class="fas fa-phone-alt"></i></div>
                        <a href="telf:+51 915157954" class="social-text-inf">+51 915157954</a>
                    </li>
                </ol>
            </div>
            <div class="col-12 col-md-2 col-lg-1 align-self-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 col-md-12 text-center mb-0 mb-md-2">
                            <div class="social-radius mx-auto"><a href="https://www.facebook.com/Surprisepe-106095851325583" target="_blank"><i class="fab fa-facebook-f mt-2 color-morado"></i></a></div>
                        </div>
                        <div class="col-6 col-md-12 text-center mt-0 mt-md-2">
                            <div class="social-radius mx-auto"><a href="https://instagram.com/surprise.itis?igshid=tqwc8mozqqrp" target="_blank"><i class="fab fa-instagram mt-2 color-morado"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $('.js-nav').click(function() {
            $(this).parent().find('.menu').toggleClass('active');
        });

        function copy(elemento) {
            a = document.getElementById(elemento)
            a.select();
            document.execCommand("copy");
        }
    </script>

    <script src="../js/invitacion.js"></script>
    <script src="../js/request/invitacionRequest.js"></script>

</body>

</html>