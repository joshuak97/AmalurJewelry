<?php include "paypal.php";
session_start();
$id_direccion=$_POST['id_direccion'];
if($_SESSION['sumaTotal']<=999){
$costo_envio=150;
}else{
$costo_envio=0;
}
$total_final=$_SESSION['sumaTotal']+$costo_envio;
?>

<div id="paypal-button-container"></div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
  env: '<?php echo PayPalENV; ?>',
  client: {
    <?php if(ProPayPal) { ?>  
    production: '<?php echo PayPalClientId; ?>'
    <?php } else { ?>
    sandbox: '<?php echo PayPalClientId; ?>'
    <?php } ?>  
  },
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
           
          total: '<?php echo $total_final; ?>',
          currency: '<?php echo 'MXN'; ?>'
        }
      }]
    });
  },
  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
        window.location = "https://amalurjewelry.com.mx/carrito/paypal/orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&direccion=<?php echo $id_direccion;?>&pid=<?php $productId=1;echo $productId; ?>";
      });
  }
}, '#paypal-button');
</script>