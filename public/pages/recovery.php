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

    <?php require_once 'includes/head.php'; ?>

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
                            <!-- <form action="index.php" method="post" class="g-3 needs-validation" novalidate> -->
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-10 col-md-6 col-lg-4 mb-3">
                                        <label for="email" class="form-label mb-3" style="color:#824A97;">Ingresa tu Correo electr??nico</label>
                                        <input type="email" placeholder="Ingresa el correo a recuperar" class="form-control" id="emailrecovery" name="email" required>
                                        <div class="invalid-feedback">
                                            Por favor ingresa tu correo
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mt-3">
                                        <button class="btn btn-primary btn-crear style-morado" type="submit" onclick="recovery()">Recuperar Contrase??a</button>
                                    </div>
                                    <div class="col-12 text-center mt-3" id="alertMss">
                                        <p id="response" style="text-transform: none;"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        function recovery() {
            correo = document.getElementById('emailrecovery').value
            document.getElementById('alertMss').classList.remove('alert','alert-warning','alert-danger','alert-success')
            document.getElementById('response').innerHTML = '<div id="loading" class="mx-auto mt-2" style="width: 40px;height: 40px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'
            if (correo.length > 0) {
                recovery_auth(correo)
            } else {
                document.getElementById('alertMss').classList.remove('alert-warning')
                document.getElementById('alertMss').classList.remove('alert-success')
                document.getElementById('alertMss').classList.add('alert')
                document.getElementById('alertMss').classList.add('alert-danger')
                document.getElementById('response').innerText = "Por favor ingresar un correo v??lido";
            }
        }
    </script>
    <script src="../js/request/recovery_pass.js"></script>
</body>

</html>