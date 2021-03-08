function recovery_auth(correo) {
    $.ajax({
        url: "../../app/controllers/recovery/ajxRecovery.php",
        method: "POST",
        data: {
            request: 600,
            correo: correo
        },
        success: function(data) {
            switch (data) {
                case '1':
                    document.getElementById('alertMss').classList.remove('alert-warning', 'alert-danger')
                    document.getElementById('alertMss').classList.add('alert', 'alert-success')
                    document.getElementById('response').innerText = "Le hemos enviado al correo un enlace de recuperación de contraseña";
                    break;
                case '400':
                    document.getElementById('alertMss').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMss').classList.add('alert', 'alert-danger')
                    document.getElementById('response').innerText = "Por favor ingresar un correo válido";
                    break;
                case '409':
                    document.getElementById('alertMss').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMss').classList.add('alert', 'alert-danger')
                    document.getElementById('response').innerText = "No se ha podido enviar el correo al destinatario";
                    break;
                case '410':
                    document.getElementById('alertMss').classList.remove('alert-warning', 'alert-success')
                    document.getElementById('alertMss').classList.add('alert', 'alert-warning')
                    document.getElementById('response').innerText = "Parece que no tenemos registrado ese correo, por favor intenta de nuevo";
                    break;
            }
        }
    });
}