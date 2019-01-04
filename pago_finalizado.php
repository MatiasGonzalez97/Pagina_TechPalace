<?php 
include('inc/cabecera.php'); ?>
            <div class="final">
           <h2>Pago realizado con paypal</h2>
           </div>
           <?php
           $resultado =$_GET['exito'];
           $paymentId=$_GET['paymentId'];
           $random=$_GET['rand'];
           if($resultado=="true"){ ?>
                <div class="final">
                    <h3 class="especial2">El pago se realizó correctamente</h3>
                    <p>El id de compra es <?php echo $paymentId ?></p>
                    <p>Toque <a href="index.php">aquí</a> para volver al index</p>
                </div>
           <?php
               include('inc/conexion.php');
               $sql="UPDATE compra SET recibo_paypal='$paymentId' WHERE random=$random";
               $conexion->query($sql);
           }else{
               echo "El pago no se ralizo";
           }


include('inc/pie.php');
?>
        