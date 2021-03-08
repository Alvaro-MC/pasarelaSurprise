var img1, img2, img3, text1, text2, text3, title, img4, text4, text5, text6, nombre, apellido, correo, telefono, pass
var t, p

function ver_pass(login) {
    x = document.getElementById("pass_sesion")
    y = document.getElementById("pass_register")

    if (login) {
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } else {
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
}

//Funcion BD
function validarCamposBD() {
    //Validar Campos Regex
    if (nombre.value.length >= 40) { nombre.value = "" }
    if (apellido.value.length >= 40) { apellido.value = "" }
    if (correo.value.length >= 50) { correo.value = "" }
    if (telefono.value.length > 11) { telefono.value = "" }
    if (pass.value.length >= 30) { pass.value = "" }
}
//Llenado de datos de modal
function modal_mobile_panel(number, modal) {
    p = number
    video = document.getElementById('header-video-container')
    title_w = document.getElementById('text-title-popup-variable-web')
    img1 = document.getElementById('img-left-popup-variable-web')
    img2 = document.getElementById('img-right-popup-variable-web')
    img3 = document.getElementById('img-down-popup-variable-web')
    text1 = document.getElementById('text-first-popup-variable-web')
    text2 = document.getElementById('text-second-popup-variable-web')
    text3 = document.getElementById('text-third-popup-variable-web')

    title = document.getElementById('text-title-popup-variable-mobile')
    img4 = document.getElementById('img-left-popup-variable-mobile')
    text4 = document.getElementById('text-first-popup-variable-mobile')
    text5 = document.getElementById('text-second-popup-variable-mobile')
    text6 = document.getElementById('text-third-popup-variable-mobile')
    switch (number) {
        case 1:
            pintar_modal((modal == 1) ? 1 : 2, "img/portico-huanchaco.jpg", "img/mapa-8.png", "img/panel-1.png", "Pórtico Huanchaco", "Horario: 7:00 a.m. - 9:00 p.m.", "Av.Chan Chan Altura Camposanto Parque Eterno", "1024px X 384px", number, '<video src="video/videos-paneles/portico-huanchaco.mp4" autoplay loop></video>')
            break;
        case 2:
            pintar_modal((modal == 1) ? 1 : 2, "img/portico-laesperanza01.jpg", "img/mapa-6.png", "img/panel-1.png", "Pórtico Esperanza 01", "Horario: 7:00 a.m. - 9:00 p.m.", "Av.José G. Condorcanqui Cdra 10 - LA ESPERANZA", "1024px X 384px", number, '<video src="video/videos-paneles/portico-huanchaco.mp4" autoplay loop></video>')
            break;
        case 3:
            pintar_modal((modal == 1) ? 1 : 2, "img/portico-laesperanza02.jpg", "img/mapa-4.png", "img/panel-1.png", "Pórtico Esperanza 02", "Horario: 7:00 a.m. - 9:00 p.m.", "Av.José G. Condorcanqui Cdra 12 - LA ESPERANZA", "1024px X 384px", number, '<video src="video/videos-paneles/portico-huanchaco.mp4" autoplay loop></video>')
            break;
        case 4:
            pintar_modal((modal == 1) ? 1 : 2, "img/portico-mallplaza.jpg", "img/mapa-1.png", "img/panel-1.png", "Pórtico Mall Aventura", "Horario: 7:00 a.m. - 9:00 p.m.", "Av.América oeste Cdra 7 - Frente a Mall Aventura", "1024px X 384px", number, '<video src="video/videos-paneles/portico-mall.mp4" autoplay loop></video>')
            break;
        case 5:
            pintar_modal((modal == 1) ? 1 : 2, "img/paradero-larco.jpg", "img/mapa-3.png", "img/panel-2.png", "Paradero Av. Larco", "Horario: 7:00 a.m. - 9:00 p.m.", "Av. Larco cruce con Av.Fátima", "540px de ancho x 1080px de alto", number, '<video src="video/videos-paneles/paradero-larco.mp4" autoplay loop></video>')
            break;
        case 6:
            pintar_modal((modal == 1) ? 1 : 2, "img/paradero-elgolf.jpg", "img/mapa-7.png", "img/panel-2.png", "Paradero El Golf", "Horario: 7:00 a.m. - 9:00 p.m.", "Av.El golf cruce con Prol. César Vallejo", "540px de ancho x 1080px de alto", number, '<video src="video/videos-paneles/paradero-elgolf.mp4" autoplay loop></video>')
            break;
        case 7:
            pintar_modal((modal == 1) ? 1 : 2, "img/portico-realplaza.jpg", "img/mapa-2.png", "img/panel-1.png", "Pórtico Real Plaza", "Horario: 7:00 a.m. - 9:00 p.m.", "Prol.Cesar Vallejo cuadra 13 - Frente a Real Plaza", "1024px X 384px", number, '<video src="video/videos-paneles/portico-realplaza.mp4" autoplay loop></video>')
            break;
        case 8:
            pintar_modal((modal == 1) ? 1 : 2, "img/portico-elporvenir.jpg", "img/mapa-5.png", "img/panel-1.png", "Pórtico El Porvenir", "Horario: 7:00 a.m. - 9:00 p.m.", "Av.Pumacahua Cdra 13 - Porvenir", "1024px X 384px", number, '<video src="video/videos-paneles/portico-elporvenir.mp4" autoplay loop></video>')
            break;
    }
}

function pintar_modal(modal, ubicacion, mapa, panel, titulo, horario, direccion, tamano, number, video) {
    localStorage.setItem("plantilla_video", '1');
    localStorage.setItem("titulo", titulo)
    localStorage.setItem("horario", horario)
    localStorage.setItem("direccion", direccion)
    localStorage.setItem("tamano", tamano)
    if (modal == 1) {
        img1.src = ubicacion
        img2.src = mapa
        img3.src = panel
        text1.value = horario
        text2.value = direccion
        text3.value = tamano
        title_w.value = titulo
        localStorage.setItem("panel", number);
        $('#prueba-btn-1').click()
    } else {
        title.value = titulo
        img4.src = ubicacion
        text4.value = horario
        text5.value = direccion
        text6.value = tamano
        localStorage.setItem("panel", number);
        $('#prueba-btn-2').click()
    }
}

function recovery() {
    location.href = "pages/recovery.php"
}

function sendInv(video) {
    enlace = "surprise.php?inv=" + video
    window.open(enlace, "_blank");
}