<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/media.css">
    <link rel="stylesheet" type="text/css" href="../css/carrito.css">
    <link rel="stylesheet" type="text/css" href="../css/home_video.css">
    <link rel="stylesheet" type="text/css" href="../css/media-home.css">

    <?php require_once 'includes/head.php'; ?>

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

    <!-- PopUp de Panel 1 -->
    <div class="modal fade" id="ventanaPanelSurprise" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-dialog-centered modal-lg justify-content-center" role="document">
            <div class="modal-content mc-panel p-0">
                <div class="modal-body p-0">
                    <div class="container-fluid cont-modal-panel p-0">
                        <div class="row row-up">
                            <div class="col-12">
                                <div id="panel-img" class="sombra-panel" style="background-color: #f5e2d3;">
                                    <script>
                                        if (localStorage.getItem('panel') == 1) {
                                            document.write('<video src="../video/videos-paneles/portico-huanchaco.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 2) {
                                            document.write('<video src="../video/videos-paneles/paradero-laesperanza02.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 3) {
                                            document.write('<video src="../video/videos-paneles/paradero-laesperanza02.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 4) {
                                            document.write('<video src="../video/videos-paneles/portico-mall.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 5) {
                                            document.write('<video src="../video/videos-paneles/paradero-larco.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 6) {
                                            document.write('<video src="../video/videos-paneles/paradero-elgolf.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 7) {
                                            document.write('<video src="../video/videos-paneles/portico-realplaza.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                        if (localStorage.getItem('panel') == 8) {
                                            document.write('<video src="../video/videos-paneles/portico-elporvenir.mp4" style="width:100%" playsinline autoplay muted loop></video>')
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'includes/popups_main.php'; ?>
    <?php require_once 'includes/popups_home.php'; ?>

    <!-- Cabecera -> Video - NavBar - SliderNotas -->
    <?php require_once "includes/navbar.php"; ?>
    <main id="contentMain" class="heightFullScreen">
        <div class="container-fluid height-inherit px-0">
            <div class="row">
                <div id="progre1" class="col-4 progre"></div>
                <div id="progre2" class="col-4 progre"></div>
                <div id="progre3" class="col-4 progre"></div>
            </div>
            <div class="row height-inherit wrap-none">
                <div class="col-4 mw-4" id="content-menuLateral">
                    <div class="d-flex align-items-start heightFull back-menue">
                        <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <div class="item-menue nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-images" style="display: block;"></i>Plantillas</div>
                            <!-- <div class="item-menue nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</div> -->
                            <!-- <div class="item-menue nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</div> -->
                            <div class="item-menue nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-cog" style="display: block;"></i>Ajustes</div>
                        </div>
                        <div class="tab-content content-desp" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div id="menuPanelPlantilla"></div>
                                <script>
                                    if (localStorage.getItem('panel') != 5 && localStorage.getItem('panel') != 6) {
                                        document.getElementById('menuPanelPlantilla').innerHTML = '<h6 style="color: #fff;" class="mt-2 mx-auto">Plantillas Horizontales</h6><div id="horizontalPlant" class="container plant px-1 mt-2 mb-2"><a class="mx-auto" href="javascript:cambioVideoPanel(1)"><video class="img-fluid img-wrap-hori mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-horizontal.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(2)"><video class="img-fluid img-wrap-hori mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-horizontal-1.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(3)"><video class="img-fluid img-wrap-hori mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-horizontal-2.mp4"></video></a></div>'
                                    } else {
                                        document.getElementById('menuPanelPlantilla').innerHTML = '<h6 style="color: #fff;" class="mt-2 mx-auto">Plantillas Verticales</h6><div id="verticalPlant" class="container plant px-1 mt-2 mb-2"><a class="mx-auto" href="javascript:cambioVideoPanel(1)"><video class="img-fluid img-wrap mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-vertical.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(2)"><video class="img-fluid img-wrap mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-vertical-1.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(3)"><video class="img-fluid img-wrap mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-vertical-2.mp4"></video></a></div>'
                                    }
                                </script>
                            </div>
                            <!-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Perfiles</div> -->
                            <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Mensajes</div> -->
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <h6 class="par-blanco">Ubicación del panel</h6>
                                            <select class="form-select" aria-label="Default select example" id="boxCambioPanel" onchange="cambioPanel()">
                                                <option value="1" selected>Selecciona tu panel</option>
                                                <option value="1">Pórtico Huanchaco</option>
                                                <option value="2">Pórtico Esperanza 01</option>
                                                <option value="3">Pórtico Esperanza 02</option>
                                                <option value="4">Pórtico Mall Aventura</option>
                                                <option value="5">Paradero Av. Larco</option>
                                                <option value="6">Paradero El Golf</option>
                                                <option value="7">Pórtico Real Plaza</option>
                                                <option value="8">Pórtico El Porvenir</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <h6 class="par-blanco">Tipo de anuncio</h6>
                                            <div class="alert alert-info pt-0 pb-0">Básico</div>
                                            <button class="btn btn-success btn-premium">Cambiar a Premium</button>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <h6 class="par-blanco">Fecha de anuncio</h6>
                                            <!-- <div class="alert alert-info pt-0 pb-0">Fecha del anuncio</div> -->
                                            <div class="col text-center">
                                                <div>
                                                    <input type="date" id="calendario" required>
                                                    <div>
                                                        <button id="btn-loadResponse-date" class="btn btn-info btn-valid-date mt-1 mb-1 mx-auto" onclick="validarFecha()" style="width: 100%;">Actualizar Fecha</button>
                                                    </div>
                                                </div>
                                                <div class="col text-center">
                                                    <div id="alertResponseDate" class="pt-1 pb-1 mt-2">
                                                        <p id="txtResponseDate" class="mb-0"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="container cont-first">
                        <div class="row">
                            <div class="col-12 mt-2 mb-2 text-end">
                                <button class="btn btn-primary btn-sm style-blanco btn-nav" type="button" id="prevPanel" data-bs-toggle="modal" data-bs-target="#ventanaPrevisualizar">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-primary btn-sm style-blanco btn-nav" type="button" id="prevPanel" 
                                    <?php if(isset($_SESSION['usuario'])){ ?>
                                        onclick="confirmar()"
                                    <?php }else{ ?>
                                        onclick="registrar()"
                                    <?php } ?>

                                >Programar</button>
                            </div>
                        </div>
                        <div class="row heightFull mt-4 mb-4 content-video" id="videoEditable">
                            <script>
                                localStorage.setItem("plantilla_video", '1');
                                if (localStorage.getItem('panel') != 5 && localStorage.getItem('panel') != 6) {
                                    document.getElementById('videoEditable').innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-horizontal.mp4"></video><div id="vc-t" class="video-content vc-s text-center">'
                                    document.getElementById('vc-t').innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-h" class="texto-1-h text-center txtarea">Escribe aqui tu mensaje</textarea>'

                                } else {
                                    document.getElementById('videoEditable').innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-vertical.mp4"></video><div id="vc-t" class="video-content vc-s text-center"></div>'
                                    document.getElementById('vc-t').innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-v" class="texto-1-v text-center txtarea">Escribe aqui tu mensaje</textarea>'
                                }
                            </script>
                        </div>
                        <div class="col-12 mt-2 mb-2 text-end">
                            <button class="btn btn-primary btn-sm style-morado btn-nav" type="button" id="prevPanel">
                                Soporte<i class="far fa-question-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- PopUp de Panel 1 -->
    <div class="modal fade" id="ventanaPrevisualizar" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-dialog-centered modal-lg justify-content-center" role="document">
            <div class="modal-content mc-panel p-0">
                <div class="modal-body p-0">
                    <div class="container-fluid cont-modal-panel p-0">
                        <div class="row row-up">
                            <div class="col-12">
                                <div id="prevVideoPop" class="sombra-panel" style="
                                width: 100%;
                                background-color: #f5e2d3;">
                                    <script>
                                        if (localStorage.getItem("panel") == 5 || localStorage.getItem("panel") == 6) {
                                            document.write('<video id="video-popup-pre" class="video-ini" style="height:80vh;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/panel-amistad.mp4"></video>')
                                        } else {
                                            document.write('<video id="video-popup-pre" class="video-ini" style="width:100%;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/portico-amistad.mp4"></video>')
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-sm style-blanco mx-4" data-bs-toggle="modal" data-bs-target="#ventanaConfirmarDatos" id="confirmacionDeDatos" style="display: none;">Datos</button>
    <script>
        
        function programar(){
            panel = localStorage.getItem("panel")
            if (panel != 5 && panel != 6) {
                mensaje = document.getElementById('texto-panel-h').value
            } else {
                mensaje = document.getElementById('texto-panel-v').value
            }
            addVideoRequest(panel,mensaje)
        }

    </script>

    <script src="../js/home.js"></script>
    <script src="../js/general.js"></script>
    <script src="../js/request/homeRequest.js"></script>
    <script src="../js/request/generalRequest.js"></script>

</body>

</html>