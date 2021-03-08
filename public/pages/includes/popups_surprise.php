<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-sesion">
                <div class="modal-header modal-sesion-header">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 id="tituloVentana" class="text-center">Gracias por ser parte de <strong>SURPRISE</strong></h5>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center pt-3">
                                <input class="input-link" id="url-copy">
                            </div>
                            <div class="col-12 pt-5">
                                <ol class="social-link justify-content-center">
                                    <li><a href="#" onclick="copy('url-copy')" class="item-link cp"><i class="fas fa-copy"></i></a></li>
                                    <li><a id="enlace-wpp-envio" class="item-link wp" href="https://web.whatsapp.com/send?text=<?php echo $_SESSION['url-oficial'] ?>" data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-crear" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>