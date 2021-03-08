<!-- PopUp Confirmacion Home -->
<div class="modal fade" id="ventanaConfirmarDatos" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-sesion">
            <div class="modal-header modal-sesion-header">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h5 id="tituloVentana">Confirmación</h5>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="modal-body modal-sesion-body">
                <div class="col-12 mb-3">
                    <p>Al hacer click en confirmar, estará programando su video con los datos que se muestran en la sección siguiente.<br>Si desea posteriormente realizar algún cambio comuníquese con el área de soporte</p>
                </div>
                <div class="col-12 mb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">Tipo del anuncio : <p style="display:inline" id="tipoAnuncio"></p>
                            </div>
                            <div class="col-12">Fecha del anuncio : <p style="display:inline" id="fechaAnuncio"></p>
                            </div>
                            <div class="col-12">Panel del anuncio : <p style="display:inline" id="panelAnuncio"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center" id="divBtnConfirm">
                    <button class="btn btn-primary btn-crear style-morado" type="submit" onclick="programar()">Confirmar</button>
                    <button type="button" id="modalCloseConfirmacionAdd" class="btn btn-secondary" data-bs-dismiss="modal" style="display: none;">Close</button>
                </div>
                <div class="col-12 text-center mt-3 mb-2" id="alertConfirmAdd">
                    <p id="txtConfirmAdd" style="text-transform: none; margin-bottom: 0;"></p>
                </div>
            </div>
        </div>
    </div>
</div>


