<?php

require_once '../../app/baseClass/RecoveryValidate.php';

$acceso = new RecoveryValidate;
if($acceso->getEstadoValidate() == 0){
    header('Location: ../index.php');
}
$user = $acceso->getUser();

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
    <link rel="stylesheet" type="text/css" href="../css/surprise.css">
    <link rel="stylesheet" type="text/css" href="../css/me_surprise.css">
    <link rel="stylesheet" type="text/css" href="../css/media-surprise.css">
    <link rel="stylesheet" type="text/css" href="../css/media-me-surprise.css">

    <script src="../js/index.js"></script>
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="Icon" href="../img/iconos/favicon.svg" type=”image/x-icon” />
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        ::placeholder {
            color: #824A97 !important;
        }

        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(90deg);
            }

            50% {
                transform: rotate(180deg);
            }

            75% {
                transform: rotate(270deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Cabecera -->
    <header class="header content">
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
                <div class="container">
                    <div class="row" style="margin-top: 12%;">
                        <div class="col-12">
                            <div class="container" style="color:#824A97;">
                                <div class="row justify-content-center">
                                    <div class="col-10 col-md-6 col-lg-4 mb-3">
                                        <label for="pass_new" class="form-label">Contraseña</label>
                                        <input type="password" placeholder="Escriba aqui su contraseña" class="form-control" id="pass_new" name="pass" required>
                                        <div class="invalid-feedback">
                                            Por favor ingresa tu contraseña
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-10 col-md-6 col-lg-4 mb-3">
                                        <label for="pass_repeat_new" class="form-label" value="">Repita su contraseña</label>
                                        <input type="password" placeholder="Escriba de nuevo su contraseña" class="form-control" id="pass_repeat_new" name="repeatpass" required>
                                        <div class="invalid-feedback">
                                            Por favor ingresa tu contraseña
                                        </div>
                                        <input type="checkbox" onclick="v_pass()" id="checkpass">
                                        <label for="checkpass" class="mt-3">Mostrar Contraseña</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary btn-crear style-morado" type="submit" onclick="validatePass()">Confirmar</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <div class="a" id="alertCh"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        function v_pass() {
            x = document.getElementById("pass_new")
            y = document.getElementById("pass_repeat_new")

            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }

        function validatePass() {
            pass_new = document.getElementById('pass_new')
            pass_repeat = document.getElementById('pass_repeat_new')
            usuario = <?php echo $user['id_usuario']; ?>

            document.getElementById('alertCh').classList.remove('alert','alert-warning','alert-danger','alert-success')
            document.getElementById('alertCh').innerHTML = '<div id="loading" class="mx-auto mt-2" style="width: 40px;height: 40px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'

            if (pass_new.value.length > 0 && pass_repeat.value.length > 0) {
                if (pass_new.value == pass_repeat.value) {
                    password = pass_new.value
                    requestPassVerify(password, usuario)
                } else {
                    document.getElementById('alertCh').classList.remove('alert-warning','alert-success')
                    document.getElementById('alertCh').classList.add('alert','alert-danger')
                    document.getElementById('alertCh').innerText = 'Las contraseñas no son iguales'
                }
            } else {
                document.getElementById('alertCh').classList.remove('alert-danger','alert-success')
                document.getElementById('alertCh').classList.add('alert')
                document.getElementById('alertCh').classList.add('alert-warning')
                document.getElementById('alertCh').innerText = 'Por favor ingresa una contraseña válida'
            }
        }
    </script>
    <script src="../js/request/passVerifyRequest.js"></script>
</body>

</html>