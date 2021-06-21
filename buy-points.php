<?php
session_start();
include('conexion.php');
?>

<br><br><br>
PRECIO: 100 USD
<br><br>
DETALLE: COMPRA DE 100 PUNTOS
<br><br>

<div id="paypal-payment-button" style="width:100%; padding:0px; border:solid 1px #fff;" align="center">
</div>


<!-- Incluyendo Culqi Checkout -->
<script src="https://checkout.culqi.com/js/v3"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AZN3ocl82AGZ40KzIty0DMSsA-G44ueBKNTsuHsDzy5oW59r7rY863MgVwoB1UsXSpSTc6PXBl6FFvoI"></script>
<script>
  paypal.Buttons({
    style : {
        shape: 'rect',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',
    },

    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    currency_code: 'USD',
                    value: '100'
                },
                description: 'Compra de 100 puntos.',
            }]
        })
    },

    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {

            console.log(details);
            alert('COMPRA EN ESTADO '+details.status);
            //AQUI ESTABA PONIENDO MI CONSULTA INSERT PERO CUANDO EJECUTABA PAGAR CON PAYPAL ME INSERTABA LOS DATOS AUN QUE CANCELE LA COMPRA
            // window.location.replace("/points-history?status="+details.status);

        })
    },


    onCancel: function (data) {
        alert('USTED CANCELO LA COMPRA');
        // window.location.replace("ruta/buy-points-3");
    }
  }).render('#paypal-payment-button');
</script>



