<!-- PopUp de Panel 1 -->
<div class="modal fade" id="ventanaModalPanel1" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content mc-panel">
            <div class="modal-body pb-4">
                <div class="container-fluid cont-modal-panel">
                    <div class="row row-up">
                        <div class="col-md-8">
                            <div class="sombra-panel">
                                <img src="img/portico-mallplaza.jpg" class="img-fluid" id="img-left-popup-variable-web">
                            </div>
                        </div>
                        <div class="col-md-4 ms-auto sombra-panel pt-3">
                            <img id="img-right-popup-variable-web" src="img/mapa-1.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 ms-auto">
                            <div class="cont-modal-img-panel sombra-panel">
                                <img src="img/panel-1.png" class="img-fluid" id="img-down-popup-variable-web">
                            </div>
                        </div>
                        <div class="col-md-9 ms-auto">
                            <div class="div-list-panel sombra-panel">
                                <ol class="list-panel px-4 pt-4 pb-3">
                                    <form action="home.php" method="post">
                                        <li class="item-list-panel" style="display:none;">
                                            <input class="item-pop-up mayus ml-0 ml-md-4 text-center" id="text-title-popup-variable-web" value="" name="titulo" disabled="">
                                        </li>
                                        <li class="item-list-panel">
                                            <img src="img/iconos/ICONOS-01.svg">
                                            <input class="item-pop-up" id="text-first-popup-variable-web" name="horario" value="" disabled="">
                                        </li>
                                        <li class="item-list-panel">
                                            <img src="img/iconos/ICONOS-02.svg">
                                            <input class="item-pop-up" id="text-second-popup-variable-web" name="direccion" value="" disabled="">
                                        </li>
                                        <li class="item-list-panel">
                                            <img src="img/iconos/ICONOS-03.svg">
                                            <input class="item-pop-up" id="text-third-popup-variable-web" name="tamano" value="" disabled="">
                                        </li>
                                    </form>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-12 col-md-6 mt-3">
                            <h6 class="par-blanco">Tipo de anuncio</h6>
                            <div class="alert alert-info pt-1 pb-1 mb-1">Básico</div>

                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <h6 class="par-blanco">Elegir fecha de anuncio</h6>
                            <div class="col text-center">
                                <input type="date" id="calendario" required><button id="btn-loadResponse-date" class="btn btn-info btn-valid-date mt-1 mb-1 mx-auto" onclick="validarFecha()">Validar Fecha</button>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <div id="alertResponseDate" class="pt-1 pb-1 mt-2">
                                <p id="txtResponseDate" class="mb-0 p-2"></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 align-self-center">
                            <button class="btn btn-success btn-premium" style="width: 100%;">Cambiar a Premium</button>
                        </div>
                        <div class="col-md-6 col-12 text-center mt-1" id="btn-stock-panel">
                            <a class="flex caja-btn-crear crear-panel style-melon" href="javascript:registrarPanel()">
                                <p><strong>Crear</strong></p><img class="img-fluid btn-carita-head" src="img/iconos/carita.svg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PopPup Mobile Panel -->
<div class="modal fade" id="modalMobilePanel" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-sesion">
            <div class="modal-header modal-sesion-header">
                <div class="col-12">
                    <h5 id="tituloVentana" class="mayus text-center">Elige tu Panel</h5>
                </div>
            </div>

            <div class="modal-body modal-sesion-body">
                <div class="container">
                    <div class="row px-3">
                        <div class="col-12 text-center p-2 caja-img-mobile-card" style="background-color: #EC6460; transform: scale(1);">
                            <img class="img-fluid" id="img-left-popup-variable-mobile" src="img/portico-huanchaco.jpg" alt="First slide">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <ol class="list-panel px-4 pt-4 pb-3 text-left">
                                <form action="home.php" method="post">
                                    <li class="item-list-panel item-list-panel-mobile">
                                        <input class="item-pop-up pop-mob mayus ml-0 ml-md-4 text-center" id="text-title-popup-variable-mobile" value="" name="titulo" disabled="">
                                    </li>
                                    <li class="item-list-panel item-list-panel-mobile">
                                        <i class="far fa-clock mr-3"></i>
                                        <input class="item-pop-up pop-mob" id="text-first-popup-variable-mobile" value="" name="horario" disabled="">
                                    </li>
                                    <li class="item-list-panel item-list-panel-mobile">
                                        <i class="fas fa-map-marked-alt mr-3"></i>
                                        <input class="item-pop-up pop-mob" id="text-second-popup-variable-mobile" value="" name="direccion" disabled="">
                                    </li>
                                    <li class="item-list-panel item-list-panel-mobile">
                                        <i class="fas fa-ruler-combined mr-3"></i>
                                        <input class="item-pop-up pop-mob" id="text-third-popup-variable-mobile" value="" name="tamano" disabled="">
                                    </li>
                                </form>
                            </ol>
                        </div>
                        <div class="col-12 text-center">
                            <div class="col-12 mt-3">
                                <h6 class="par-blanco">Tipo de anuncio</h6>
                                <div class="alert alert-info pt-0 pb-0">Básico</div>
                                <button class="btn btn-success btn-premium">Cambiar a Premium</button>
                            </div>
                            <div class="col-12 mt-3">
                                <h6 class="par-blanco">Fecha de anuncio</h6>
                                <div class="alert alert-info pt-0 pb-0">Fecha del anuncio</div>
                                <div class="col text-center">
                                    <div>
                                        <input type="date" id="calendario" required>
                                        <div>
                                            <button id="btn-loadResponse-date" class="btn btn-info btn-valid-date mt-1 mb-1 mx-auto" onclick="validarFecha()">Validar Fecha</button>
                                            <button class="btn btn-success btn-valid-date mt-1 mb-1 mx-auto">Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="col text-center">
                                        <div id="alertResponseDate" class="pt-1 pb-1 mt-2">
                                            <p id="txtResponseDate" class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row mb-3">
                                    <div class="col text-center">
                                        <div id="alertResponseDate" class="pt-1 pb-1 mt-2">
                                            <p id="txtResponseDate" class="mb-0"></p>
                                        </div>
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-6 text-center" id="btn-stock-panel-mobile">
                                        <a class="flex caja-btn-crear crear-panel style-melon" href="javascript:registrarPanel()">
                                            <p><strong>Crear</strong></p><img class="img-fluid btn-carita-head" src="img/iconos/carita.svg">
                                        </a>
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>