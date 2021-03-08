function requestLogin(correo, pass) {
    $.ajax({
        url: "../../app/controllers/login/ajxLogin.php",
        method: "POST",
        data: {
            request: 201,
            correo: correo,
            pass: pass
        },
        success: function(data) {
            switch (data) {
                case '409':
                    document.getElementById('alertMss').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMss').classList.add('alert', 'alert-danger')
                    document.getElementById('response').innerText = "Por favor, revisa tu correo y tu contraseña";
                    break;
                case '1':
                    document.getElementById('alertMss').classList.remove('alert-warning', 'alert-danger')
                    document.getElementById('alertMss').classList.add('alert', 'alert-success')
                    document.getElementById('response').innerText = "Login Exitoso";
                    setTimeout(function() {
                        location.reload()
                    }, 200);
                    break;
            }
        }
    });
}

function requestRegister(nombre, apellido, correo, telefono, contrasena) {
    $.ajax({
        url: "../../app/controllers/register/ajxRegister.php",
        method: "POST",
        data: {
            request: 202,
            nombre: nombre,
            apellido: apellido,
            correo: correo,
            telefono: telefono,
            pass: contrasena
        },
        success: function(data) {
            switch (data) {
                case '1':
                    document.getElementById('alertMssR').classList.remove('alert-warning', 'alert-danger')
                    document.getElementById('alertMssR').classList.add('alert', 'alert-success')
                    document.getElementById('responseR').innerText = "Usuario registrado exitosamente";
                    setTimeout(function() {
                        location.reload()
                    }, 300);
                    break;
                case '400':
                    document.getElementById('alertMssR').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMssR').classList.add('alert', 'alert-danger')
                    document.getElementById('responseR').innerText = "Por favor revise que los campos ingresados sean los correctos";
                    break;
                case '406':
                    document.getElementById('alertMssR').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMssR').classList.add('alert', 'alert-danger')
                    document.getElementById('responseR').innerText = "El usuario no pudo se registrado, por favor revise que los datos sean los correctos";
                    break;
                case '410':
                    document.getElementById('alertMssR').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMssR').classList.add('alert', 'alert-danger')
                    document.getElementById('responseR').innerText = "Parece que ya existe una cuenta con ese correo. Si no has sido tu por favor solicita el cambio de tu contraseña";
                    break;
                case '411':
                    document.getElementById('alertMssR').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMssR').classList.add('alert', 'alert-danger')
                    document.getElementById('responseR').innerText = "El usuario no pudo se registrado, por favor contáctese con el área de soporte";
                    break;

            }
        }
    });
}

function logout() {
    $.ajax({
        url: "../../app/controllers/logout/ajxLogout.php",
        method: "POST",
        data: {
            request: 0
        },
        success: function(data) {
            location.reload()
        }
    });
}


function validarFecha() {
    fecha = document.getElementById('calendario').value
    panel = localStorage.getItem('panel')

    document.getElementById('alertResponseDate').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('txtResponseDate').innerHTML = '<div id="loading" class="mx-auto" style="width: 30px;height: 30px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'


    if (fecha != '') {
        $.ajax({
            url: "../../app/controllers/panel/ajxPanel.php",
            method: "POST",
            data: {
                request: 1,
                fecha: fecha,
                panel: panel
            },
            success: function(data) {
                switch (data) {
                    case '406':
                        document.getElementById('alertResponseDate').classList.remove('alert-warning', 'alert-success')
                        document.getElementById('alertResponseDate').classList.add('alert', 'alert-danger')
                        document.getElementById('txtResponseDate').innerText = "Por favor ingresar una fecha";
                        break;
                    case '409':
                        document.getElementById('alertResponseDate').classList.remove('alert-success', 'alert-danger')
                        document.getElementById('alertResponseDate').classList.add('alert', 'alert-warning')
                        document.getElementById('txtResponseDate').innerText = "Ingresa una fecha válida";
                        break;
                    default:
                        if (data < 10) {
                            localStorage.setItem("fecha", fecha)
                            document.getElementById('alertResponseDate').classList.remove('alert-warning', 'alert-danger')
                            document.getElementById('alertResponseDate').classList.add('alert', 'alert-success')
                            document.getElementById('txtResponseDate').innerText = "Fecha actualizada";
                        } else {
                            document.getElementById('alertResponseDate').classList.remove('alert-success', 'alert-success')
                            document.getElementById('alertResponseDate').classList.add('alert', 'alert-danger')
                            document.getElementById('txtResponseDate').innerText = "El panel esta ocupado este día";
                        }
                        break;
                }
            }
        });
    } else {
        document.getElementById('alertResponseDate').classList.remove('alert-warning', 'alert-success')
        document.getElementById('alertResponseDate').classList.add('alert', 'alert-danger')
        document.getElementById('txtResponseDate').innerText = "Debe seleccionar una fecha";
    }
}

function addVideoRequest(panel, mensaje) {
    fecha = localStorage.getItem("fecha")
    plantilla = localStorage.getItem("plantilla_video")

    document.getElementById('divBtnConfirm').classList.add('none')
    document.getElementById('alertConfirmAdd').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('txtConfirmAdd').innerHTML = '<div id="loading" class="mx-auto mt-2" style="width: 40px;height: 40px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'


    $.ajax({
        url: "../../app/controllers/carrito/ajxCarrito.php", // URL donde se guardará el video
        method: "POST",
        data: {
            request: 1000,
            panel: panel,
            plantilla: plantilla,
            mensaje: mensaje,
            fecha: fecha
        },
        success: function(data) {
            if (data == 1) {
                //Se agregó satisfactoriamente
                document.getElementById('alertConfirmAdd').classList.remove('alert-warning', 'alert-danger')
                document.getElementById('alertConfirmAdd').classList.add('alert', 'alert-success')
                document.getElementById('txtConfirmAdd').innerText = 'Video agregado al carrito'
                setTimeout(function() {
                    document.getElementById('modalCloseConfirmacionAdd').click()
                    document.getElementById('avisoCarrito').classList.remove('none')
                    document.getElementById('avisoCarrito').classList.add('visible')
                }, 300);
                setTimeout(function() {
                    document.getElementById('avisoCarrito').classList.remove('visible')
                    document.getElementById('avisoCarrito').classList.add('none')
                }, 3000);
            } else {
                document.getElementById('alertConfirmAdd').classList.remove('alert-warning', 'alert-success')
                document.getElementById('alertConfirmAdd').classList.add('alert', 'alert-danger')
                document.getElementById('txtConfirmAdd').innerText = 'No se pudo agregar al carrito'
            }
        }
    });

}

function verCarrito() {
    document.getElementById('listProducts').innerHTML = '<div id="loading" class="mx-auto mt-2" style="width: 40px;height: 40px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'
    document.getElementById('btnPagar').innerText = ''
    $.ajax({
        url: "../../app/controllers/carrito/ajxCarrito.php",
        method: "POST",
        data: {
            request: 1005
        },
        success: function(data) {
            list = JSON.parse(data)
            if (list['response'] == 1) {
                document.getElementById('listProducts').innerHTML = list['products']
                document.getElementById('btnPagar').innerHTML = list['total'];
            } else {
                document.getElementById('listProducts').innerText = "No tienes ningun video en tu carrito"
            }
        }
    });
    document.getElementById('carritoCompras').click()
}

function removeVideo(video) {
    $.ajax({
        url: "../../app/controllers/carrito/ajxCarrito.php",
        method: "POST",
        data: {
            request: 1007,
            video: video
        },
        success: function(data) {
            //Video removido con exito
            switch (data) {
                case '200':
                    verCarrito()
                    break;
            }
        }
    });
}

function pagar() {
    $.ajax({
        url: "../../app/controllers/carrito/ajxCarrito.php",
        method: "POST",
        data: {
            request: 1010
        },
        success: function(data) {
            //Enlace a pago con niubiz
            console.log(data)
            console.log("Start payment process")
        }
    });
}