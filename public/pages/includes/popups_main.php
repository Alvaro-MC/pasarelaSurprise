<!-- PopUp Inicio de Sesion -->
<div class="modal fade" id="ventanaModalSesion" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-sesion">
            <div class="modal-header modal-sesion-header">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h5 id="tituloVentana">Iniciar Sesión</h5>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="modal-body modal-sesion-body">
                <!-- <form action="index.php" method="post" class="row g-3 needs-validation" novalidate> -->
                <div class="col-12 mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo_sesion" name="correo" required>
                    <div class="invalid-feedback">
                        Por favor ingresa tu correo electrónico
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="pass_sesion" class="form-label" value="">Contraseña</label>
                    <input type="password" class="form-control" id="pass_sesion" name="pass" required>
                    <div class="invalid-feedback">
                        Por favor ingresa una contraseña
                    </div>
                    <input type="checkbox" onclick="ver_pass(true)" id="checkpass">
                    <label for="checkpass">Mostrar Contraseña</label>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary btn-crear style-morado" type="submit" onclick="login()">Ingresar</button>
                </div>
                <div class="col-12 text-center mt-3 mb-2" id="alertMss">
                    <p id="response" style="text-transform: none; margin-bottom: 0;"></p>
                </div>
                <div class="col-12 text-center mt-3">
                    <a href="javascript:recovery()" style="color:#824A97 !important; font-weight: 600;">¿Has olvidado tu contraseña?</a>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<!-- PopUp de Registro -->
<div class="modal fade" id="ventanaModalRegister" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-sesion">
            <div class="modal-header modal-sesion-header">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h5 id="tituloVentana">Registrate</h5>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="modal-body modal-sesion-body">
                <!-- <form action="registrar.php" method="post" class="row g-3 needs-validation" novalidate> -->
                <div class="col-12 mb-3">
                    <label for="name_register" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name_register" name="nombre" required>
                    <div class="invalid-feedback">
                        Por favor asegurate de ingresar un nombre válido
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="last_name_register" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="last_name_register" name="apellido" required>
                    <div class="invalid-feedback">
                        Por favor asegurate de ingresar un apellido válido
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="email_register" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_register" name="correo" required>
                    <div class="invalid-feedback">
                        Por favor asegurate de ingresar un correo válido
                    </div>
                </div>
                <div class=" col-12 mb-3">
                    <label for="phone_register" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" id="phone_register" name="telefono" maxlength="11" required>
                    <div class="invalid-feedback">
                        Por favor asegurate que tu telefono es correcto
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pass_register" name="pass" required>
                    <input type="checkbox" onclick="ver_pass(false)" id="checkpass2">
                    <label for="checkpass2">Mostrar Contraseña</label>
                    <div class="invalid-feedback">
                        Por favor ingresa una cotraseña válida
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Aceptar Términos y Condiciones
                        </label>
                        <div class="invalid-feedback mb-2">
                            Debes estar de acuerdo antes de enviar
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary btn-crear style-morado" type="submit" onclick="register()">Registrarme</button>
                </div>
                <div class="col-12 text-center mt-3 mb-2" id="alertMssR">
                    <p id="responseR" style="text-transform: none; margin-bottom: 0;"></p>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<!-- PopUp Carrito de Compras -->
<div class="modal fade" id="ventanaCarritoCompras" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content modal-sesion">
            <div class="modal-header modal-sesion-header">
                <div class="col-2"></div>
                <div class="col-md-8 offset-2">
                    <h5 id="tituloVentana">Carrito de compras</h5>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="modal-body modal-sesion-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid text-center" id="listProducts">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-4" id="btnPagar">
                </div>
                <div class="col-12 text-center mt-3 mb-2" id="alertResponseCar">
                    <p id="txtResponseCar" style="text-transform: none; margin-bottom: 0;"></p>
                </div>
            </div>
        </div>
    </div>
</div>