function requestPassVerify(password, id_usuario) {
    $.ajax({
        url: "../../app/controllers/user/ajxUser.php",
        method: "POST",
        data: {
            request: 1000,
            usuario: id_usuario,
            newpass: password
        },
        success: function(data) {
            if (data == 1) {
                document.getElementById('alertCh').classList.remove('alert-warning', 'alert-danger')
                document.getElementById('alertCh').classList.add('alert', 'alert-success')
                document.getElementById('alertCh').innerText = 'La contraseña ha sido cambiada'
                setTimeout(function() {
                    location.href = "../index.php"
                }, 3000);
            } else {
                document.getElementById('alertCh').classList.remove('alert-warning', 'alert-success')
                document.getElementById('alertCh').classList.add('alert', 'alert-danger')
                document.getElementById('alertCh').innerText = 'La contraseña no ha sido cambiada, por farvor intenta de nuevo o comunicate con el área de soporte'
                setTimeout(function() {
                    location.href = "../index.php"
                }, 4000);
            }

        }
    });
}