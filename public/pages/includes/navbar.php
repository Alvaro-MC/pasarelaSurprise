<!-- NAVBAR -->
<nav class="navbar navbar-dark">
    <div class="container-fluid">
        <?php
        if (!isset($_SESSION['id_usuario'])) {
        ?>
            <div>
                <a href="#" class="toggle-nav js-nav hide" data-bs-toggle="collapse" data-bs-target="#navbarMobile" aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars fa-2x"></i></a>

                <div class="nav-wrap disp-true">
                    <nav class="menu mt-1">
                        <ul>
                            <li class="first-border"><a class="first-item" href="#paneles">Mapa</a></li>
                            <li><a class="mx-1" href="#contacto">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div style="display: flex;">
                <button class="btn btn-primary btn-sm style-blanco btn-nav m-auto" type="button" id="">
                    <i class="fas fa-user"></i>
                </button>
                <div class="mx-3">
                    <p class="mb-0" style="color:#fff;">Bienvenido <?php echo $_SESSION['nombre']; ?></p>
                    <a href="javascript:logout()">Cerrar Sesion</a>
                </div>
            </div>
        <?php
        }
        ?>


        <!-- Prueba de Envio post por AJAX -->
        <input type="text" id="texto" value="1" style="display: none;">

        <?php
        if (!isset($_SESSION['id_usuario'])) {
        ?>
            <div style="display: flex;">
                <button type="button" class="btn btn-primary btn-sm style-blanco mx-4" data-bs-toggle="modal" data-bs-target="#ventanaModalSesion" id="iniciarSesion">Iniciar Sesión</button>
                <button type="button" class="btn btn-primary btn-sm mx-0 style-blanco" data-bs-toggle="modal" data-bs-target="#ventanaModalRegister" id="registrarse">Registrarse</button>
                <button type="button" class="btn btn-primary btn-sm style-blanco" id="gracias" data-bs-toggle="modal" data-bs-target="#ventanaGracias" style="display:none;">Gracias</button>
            </div>
        <?php
        } else {
        ?>
            <button type="button" class="btn btn-primary btn-sm style-blanco mx-4" data-bs-toggle="modal" data-bs-target="#ventanaCarritoCompras" id="carritoCompras" style="display: none;">Ver Carrito</button>
            <div style="display: flex;">
                <div class="cont-float none" id="avisoCarrito"><i class="fas fa-hand-point-right icon-cont-float"></i></div>
                <div>
                    <button class="btn btn-primary btn-sm style-blanco btn-nav" type="button" onclick="verCarrito()">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </div>
                <?php
                if ($_SERVER["REQUEST_URI"] == "/surprise/public/pages/home.php") {
                ?>
                    <button class="btn btn-primary btn-sm style-blanco btn-nav" type="button" id="prevPanel" data-bs-toggle="modal" data-bs-target="#ventanaPanelSurprise">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-primary btn-sm style-blanco btn-nav" type="button" id="ajustesNav" onclick="activarAjustes()">
                        <i class="fas fa-cog"></i>
                    </button>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>

    </div>

    <div class="collapse navbar-collapse disp-none" id="navbarMobile">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#paneles-mobile">Mapa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contacto">Contacto</a>
            </li>
        </ul>
    </div>
</nav>