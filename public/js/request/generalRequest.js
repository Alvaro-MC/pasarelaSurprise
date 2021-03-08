function viewCarrito() {
    // Mostrar DIV de cargar en el PopUp del carrito
    document.getElementById('alertResponseCar').classList.remove('alert', 'alert-warning', 'alert-danger', 'alert-success')
    document.getElementById('txtResponseCar').innerHTML = '<div id="loading" class="mx-auto" style="width: 30px;height: 30px;border: 4px solid green;border-right: 4px solid transparent;border-radius: 20px;animation-name: loading;animation-duration: 1s;animation-iteration-count: infinite;animation-timing-function: linear;"></div>'

    $.ajax({
        url: "../../app/controllers/carrito/ajxCarrito.php", // URL donde se guardará el video
        method: "POST",
        data: {
            request: 1002,
        },
        success: function(data) {
            list = JSON.parse(data)
            products = ''
                //--------------------------------------------------------
            function pushProduct(element, index, list) {
                console.log("a[" + index + "] = " + element);
                product
                products += product
            }
            list.forEach(pushProduct);
            //--------------------------------------------------------
            console.log(list)
            console.log("DATOS : ", list['request'])
            console.log("DATOS : ", list['response'])
            console.log("DATOS : ", list['id_precio'])
                // Agregar los productos al PopUp Carrito
            if (!emtpy(list)) {
                if (list[0] == 200) {
                    //Se agrego al carrito
                } else {
                    //No se agrego al carrito
                }
            }
        }
    });

    //Click en PopUp de Carrito para mostrar productos
    document.getElementById()
}