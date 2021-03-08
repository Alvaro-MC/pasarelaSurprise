function login() {
    correo = document.getElementById('correo_sesion').value
    pass = document.getElementById('pass_sesion').value
    document.getElementById('alertMss').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('response').innerHTML = '<div id="loading" class="mx-auto mt-2" style="width: 40px;height: 40px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'
    if (correo.length > 0 && pass.length > 0) {
        requestLogin(correo, pass)
    } else {
        document.getElementById('alertMss').classList.remove('alert-warning', 'alert-success')
        document.getElementById('alertMss').classList.add('alert', 'alert-danger')
        document.getElementById('response').innerText = "Por favor ingresar datos válidos";
    }
}

function register() {
    nombre = document.getElementById('name_register').value
    apellido = document.getElementById('last_name_register').value
    correo = document.getElementById('email_register').value
    telefono = document.getElementById('phone_register').value
    contrasena = document.getElementById('pass_register').value
    document.getElementById('alertMssR').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('responseR').innerHTML = '<div id="loading" class="mx-auto mt-2" style="width: 40px;height: 40px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'

    if (nombre.length >= 40) { nombre = "" }
    if (apellido.length >= 40) { apellido = "" }
    if (correo.length >= 50) { correo = "" }
    if (telefono.length > 25) { telefono = "" }
    if (contrasena.length >= 30) { contrasena = "" }

    if (nombre.length > 0 && apellido.length > 0 && correo.length > 0 && telefono.length > 0 && contrasena.length > 0) {
        requestRegister(nombre, apellido, correo, telefono, contrasena)
    } else {
        document.getElementById('alertMssR').classList.remove('alert-warning', 'alert-success')
        document.getElementById('alertMssR').classList.add('alert', 'alert-danger')
        document.getElementById('responseR').innerText = "Por favor ingresar datos válidos";
    }
}