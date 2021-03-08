function sendRequest(nombre, apellido, telefono, mensaje) {
    $.ajax({
        url: '../../app/controllers/invitacion/ajxInvitacion.php',
        method: 'POST',
        data: {
            request: 1100,
            nombre: nombre,
            apellido: apellido,
            telefono: telefono,
            mensaje: mensaje
        },
        success: function(data) {
            document.getElementById('alertResponseShare').classList.remove('alert-warning', 'alert-danger')
            document.getElementById('alertResponseShare').classList.add('alert', 'alert-success')
            document.getElementById('txtResponseShare').innerText = 'Enlace creado con éxito'
            document.getElementById('url-copy').value = data
            document.getElementById('success').click()
        }
    });
}