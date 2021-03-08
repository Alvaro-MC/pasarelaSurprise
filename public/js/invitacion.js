function compartir() {
    document.getElementById('alertResponseShare').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('txtResponseShare').innerHTML = '<div id="loading" class="mx-auto" style="width: 30px;height: 30px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'

    nombre_r = document.getElementById('nombre_r')
    apellido_r = document.getElementById('apellido_r')
    telefono_r = document.getElementById('telefono_r')
    mensaje_r = document.getElementById('mensaje_r')

    if (nombre_r.value.length >= 40 || apellido_r.value.length >= 40 || telefono_r.value.length > 20) {
        if (nombre_r.value.length >= 40) {
            nombre_r.value = ""
        }
        if (apellido_r.value.length >= 40) {
            apellido_r.value = ""
        }
        if (telefono_r.value.length > 11) {
            telefono_r.value = ""
        }
    }

    if (nombre_r.value != '' && apellido_r.value != '' && telefono_r.value != '' && mensaje_r.value != '') {
        sendRequest(nombre_r.value, apellido_r.value, telefono_r.value, mensaje_r.value)
    } else {
        document.getElementById('alertResponseShare').classList.remove('alert-success', 'alert-danger')
        document.getElementById('alertResponseShare').classList.add('alert', 'alert-warning')
        document.getElementById('txtResponseShare').innerText = 'Por rellena los campos con datos válidos'
    }
}