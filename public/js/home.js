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
//Llenado de datos de modal
function previsualizar(video, panel) {
    pop = document.getElementById("video-popup-pre");

    if (panel == 5 || panel == 6) {
        switch (video) {
            case 1:
                pintar_pre(pop, "../video/videos-amor/spots/panel-amistad.mp4");
                break;
            case 2:
                pintar_pre(pop, "../video/videos-amor/spots/panel-amor-1.mp4");
                break;
            case 3:
                pintar_pre(pop, "../video/videos-amor/spots/panel-amor-2.mp4");
                break;
        }
    } else {
        switch (video) {
            case 1:
                pintar_pre(pop, "../video/videos-amor/spots/portico-amistad.mp4");
                break;
            case 2:
                pintar_pre(pop, "../video/videos-amor/spots/portico-amor-1.mp4");
                break;
            case 3:
                pintar_pre(pop, "../video/videos-amor/spots/portico-amor-2.mp4");
                break;
        }
    }
}

function pintar_pre(pop, vid) {
    pop.src = vid;
    document.getElementById("btn-prev").click();
}

function cambioPanel() {
    localStorage.setItem("plantilla_video", '1');
    var selectBox = document.getElementById("boxCambioPanel");
    var panel = selectBox.options[selectBox.selectedIndex].value;
    localStorage.setItem("panel", panel);
    if (panel != 5 && panel != 6) {
        document.getElementById("menuPanelPlantilla").innerHTML =
            '<h6 style="color: #fff;" class="mt-2 mx-auto">Plantillas Horizontales</h6><div id="horizontalPlant" class="container plant px-1 mt-2 mb-2"><a class="mx-auto" href="javascript:cambioVideoPanel(1)"><video class="img-fluid img-wrap-hori mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-horizontal.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(2)"><video class="img-fluid img-wrap-hori mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-horizontal-1.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(3)"><video class="img-fluid img-wrap-hori mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-horizontal-2.mp4"></video></a></div>';
        document.getElementById("videoEditable").innerHTML =
            '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-horizontal.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
        document.getElementById("prevVideoPop").innerHTML =
            '<video id="video-popup-pre" class="video-ini" style="width:100%;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/portico-amistad.mp4"></video>';
        document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-h" class="texto-1-h text-center txtarea">Escribe aqui tu mensaje</textarea>';
    } else {
        document.getElementById("menuPanelPlantilla").innerHTML =
            '<h6 style="color: #fff;" class="mt-2 mx-auto">Plantillas Verticales</h6><div id="verticalPlant" class="container plant px-1 mt-2 mb-2"><a class="mx-auto" href="javascript:cambioVideoPanel(1)"><video class="img-fluid img-wrap mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-vertical.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(2)"><video class="img-fluid img-wrap mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-vertical-1.mp4"></video></a><a class="mx-auto" href="javascript:cambioVideoPanel(3)"><video class="img-fluid img-wrap mx-auto mt-2 mb-2" autoplay><source id="source-video-3" src="../video/videos-amor/amor-vertical-2.mp4"></video></a></div>';
        document.getElementById("videoEditable").innerHTML =
            '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-vertical.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
        document.getElementById("prevVideoPop").innerHTML =
            '<video id="video-popup-pre" class="video-ini" style="height:80vh;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/panel-amistad.mp4"></video>';
        document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-v" class="texto-1-v text-center txtarea">Escribe aqui tu mensaje</textarea>';
    }
    switch (panel) {
        case "1":
            localStorage.setItem("titulo", "Pórtico Huanchaco")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/portico-huanchaco.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "2":
            localStorage.setItem("titulo", "Paradero la Esperanza 01")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/paradero-laesperanza02.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "3":
            localStorage.setItem("titulo", "Paradero la Esperanza 02")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/paradero-laesperanza02.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "4":
            localStorage.setItem("titulo", "Pórtico el Mall")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/portico-mall.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "5":
            localStorage.setItem("titulo", "Paradero Larco")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/paradero-larco.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "6":
            localStorage.setItem("titulo", "Paradero el Golf")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/paradero-elgolf.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "7":
            localStorage.setItem("titulo", "Pórtico Real Plaza")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/portico-realplaza.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
        case "8":
            localStorage.setItem("titulo", "Pórtico el Porvenir")
            document.getElementById("panel-img").innerHTML =
                '<video src="../video/videos-paneles/portico-elporvenir.mp4" style="width:100%" playsinline autoplay muted loop></video>';
            break;
    }
    setTitlePanel(panel)
}

function cambioVideoPanel(video) {
    localStorage.setItem("plantilla_video", video);
    id_panel = localStorage.getItem("panel");
    if (id_panel != 5 && id_panel != 6) {
        switch (video) {
            case 1:
                document.getElementById("videoEditable").innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-horizontal.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
                document.getElementById("prevVideoPop").innerHTML = '<video id="video-popup-pre" class="video-ini" style="width:100%;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/portico-amistad.mp4"></video>';
                document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-h" class="texto-1-h text-center txtarea">Escribe aqui tu mensaje</textarea>';
                break;
            case 2:
                document.getElementById("videoEditable").innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amor-horizontal-1.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
                document.getElementById("prevVideoPop").innerHTML = '<video id="video-popup-pre" class="video-ini" style="width:100%;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/portico-amor-1.mp4"></video>';
                document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="40" id="texto-panel-h" class="texto-2-h text-center txtarea">Escribe aqui tu mensaje</textarea>';
                break;
            case 3:
                document.getElementById("videoEditable").innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amor-horizontal-2.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
                document.getElementById("prevVideoPop").innerHTML = '<video id="video-popup-pre" class="video-ini" style="width:100%;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/portico-amor-2.mp4"></video>';
                document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-h" class="texto-3-h text-center txtarea">Escribe aqui tu mensaje</textarea>';
                break;
        }
    } else {
        switch (video) {
            case 1:
                document.getElementById("videoEditable").innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amistad-vertical.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
                document.getElementById("prevVideoPop").innerHTML = '<video id="video-popup-pre" class="video-ini" style="height:80vh;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/panel-amistad.mp4"></video>';
                document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-v" class="texto-1-v text-center txtarea">Escribe aqui tu mensaje</textarea>';
                break;
            case 2:
                document.getElementById("videoEditable").innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amor-vertical-1.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
                document.getElementById("prevVideoPop").innerHTML = '<video id="video-popup-pre" class="video-ini" style="height:80vh;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/panel-amor-1.mp4"></video>';
                document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="40" id="texto-panel-v" class="texto-2-v text-center txtarea">Escribe aqui tu mensaje</textarea>';
                break;
            case 3:
                document.getElementById("videoEditable").innerHTML = '<video class="mx-auto p-4" id="v3" autoplay><source id="source-video-3" src="../video/videos-amor/amor-vertical-2.mp4"></video><div id="vc-t" class="video-content vc-s text-center">';
                document.getElementById("prevVideoPop").innerHTML = '<video id="video-popup-pre" class="video-ini" style="height:80vh;" autoplay loop controls><source id="source-video-3" src="../video/videos-amor/spots/panel-amor-2.mp4"></video>';
                document.getElementById("vc-t").innerHTML = '<textarea type="text" maxlength="45" id="texto-panel-v" class="texto-3-v text-center txtarea">Escribe aqui tu mensaje</textarea>';
                break;
        }
    }
}

function activarAjustes() {
    document.getElementById("v-pills-settings-tab").click();
}

function validarFecha() {
    fecha = document.getElementById("calendario").value;
    document.getElementById("alertResponse").classList.remove("alert");
    document.getElementById("btn-loadResponse-date").innerHTML =
        "<div class='load-date'></div>";

    $.ajax({
        url: "validateDate.php",
        method: "POST",
        data: {
            fecha: fecha,
        },
        success: function(data) {
            if (data) {
                document
                    .getElementById("alertResponse")
                    .classList.remove("alert-danger");
                document.getElementById("alertResponse").classList.add("alert");
                document.getElementById("alertResponse").classList.add("alert-success");
                document.getElementById("txt-responseDate").innerText = "Fecha válida";
                document.getElementById("btn-loadResponse-date").innerText =
                    "Validar fecha";
            } else {
                document
                    .getElementById("alertResponse")
                    .classList.remove("alert-success");
                document.getElementById("alertResponse").classList.add("alert");
                document.getElementById("alertResponse").classList.add("alert-danger");
                document.getElementById("txt-responseDate").innerText =
                    "Fecha inválida, por favor ingrese una fecha válida";
                document.getElementById("btn-loadResponse-date").innerText =
                    "Validar fecha";
            }
        },
    });
}

function recovery() {
    location.href = "recovery.php"
}

function registrar() {
    document.getElementById('registrarse').click()
}

function confirmar() {
    document.getElementById('divBtnConfirm').classList.remove('none')
    document.getElementById('alertConfirmAdd').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('txtConfirmAdd').innerText = ''

    fecha = localStorage.getItem("fecha")
    panel = localStorage.getItem("titulo")
    fechaS = fecha.split('-')
    mes = verMes(fechaS[1])
    fechaF = fechaS[2] + " de " + mes + " del " + fechaS[0]
    if (fecha == '') {
        document.getElementById('fechaAnuncio').innerText = 'Debe seleccionar una fecha'
    } else {
        document.getElementById('fechaAnuncio').innerText = fechaF

    }
    document.getElementById('tipoAnuncio').innerText = 'Básico'
    document.getElementById('panelAnuncio').innerText = panel
    document.getElementById('confirmacionDeDatos').click()
}

function verMes(numero) {
    switch (numero) {
        case '01':
            return "enero"
            break
        case '02':
            return "febrero"
            break
        case '03':
            return "marzo"
            break
        case '04':
            return "abril"
            break
        case '05':
            return "mayo"
            break
        case '06':
            return "junio"
            break
        case '07':
            return "julio"
            break
        case '08':
            return "agosto"
            break
        case '09':
            return "septiembre"
            break
        case '10':
            return "octubre"
            break
        case '11':
            return "noviembre"
            break
        case '12':
            return "diciembre"
            break
    }
}


function sendInv(video) {
    enlace = "invitacion.php?inv=" + video
    window.open(enlace, "_blank");
}