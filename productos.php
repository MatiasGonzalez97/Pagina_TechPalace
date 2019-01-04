<?php include('inc/cabecera.php');?>

<?php 
include('inc/conexion.php');  
if(isset($_POST["add_to_cart"]))
{   
    if(isset($username)){
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"],'item_id');
            if(!in_array($_GET["id"], $item_array_id))
            {
                $arrayprod=array(
                    'item_id' => $_GET['id'],
                    'nombre_producto' => $_POST['nombre'],
                    'precio_producto' => $_POST['precio'],
                    'cantidad_producto' => $_POST['cantidad']
                );
                array_push($_SESSION['shopping_cart'], $arrayprod);  
            }
            else  
            {  
                echo '<script>alert("No puede agregar mas del mismo item")</script>';  
                // echo '<script>window.location="index.php"</script>'; 
            }  
        }  
        else  
        {  
                $arrayprod=array(
                    'item_id' => $_GET['id'],
                    'nombre_producto' => $_POST['nombre'],
                    'precio_producto' => $_POST['precio'],
                    'cantidad_producto' => $_POST['cantidad']
                );
            $_SESSION["shopping_cart"][0] = $arrayprod;  
        }
    }
    else{
        echo "<script>alert('Debe inciar sesión para agregar al carrito')</script>";
    }
}  
if(isset($_GET["action"]))  
{  
     if($_GET["action"] == "delete")  
     {  
          foreach($_SESSION["shopping_cart"] as $keys => $values)  
          {  
               if($values["item_id"] == $_GET["id"])  
               {  
                    unset($_SESSION["shopping_cart"][$keys]);  
                     
                   //  echo '<script>window.location="index.php"</script>';  
               }  
          }
          echo '<script>alert("Ha sacado del carrito el item")</script>'; 
     }  
}  
    include('inc/conexion.php');
    $conexion->query("SET NAMES 'utf8'");
    $sqlcelulares="SELECT * FROM productos WHERE nombre LIKE 'celular%' OR nombre LIKE 'tablet%'";
    $resultadocelulares=mysqli_query($conexion,$sqlcelulares);
    $sqlmonitortv="SELECT * FROM productos WHERE nombre LIKE 'monitor%' OR nombre LIKE 'televisor%'";
    $resultadoMonitortv=mysqli_query($conexion,$sqlmonitortv);
    $sqlGaming="SELECT * FROM productos WHERE nombre LIKE 'gaming%'";
    $resultadoGaming=mysqli_query($conexion,$sqlGaming);
?>

    <div class="contenedor clearfix">
    <button class="boton" id="check">Mostrar Total</button>
        <div class="Total-carrito"> 
                <br />  
                <h3>Detalles de la compra</h3>  
                <div class=""> 
                        <table class="">  
                            <tr>  
                                <th width="50%">Porducto</th>
                                <th width="10%">Cantidad</th>  
                                <th width="20%">Precio</th>  
                                <th width="15%">Total</th>  
                                <th width="5%">Eliminar del carrito</th>  
                            </tr>  
                            <?php   
                            if(!empty($_SESSION["shopping_cart"]))  
                            {
                                $total = 0;  
                                foreach($_SESSION["shopping_cart"] as $keys => $values):        
                                        if($values["cantidad_producto"]!='' || $values["cantidad_producto"]!=0):
                            ?>  <form action="test.php" method="post"> 
                            <tr> 
                                <td><?php echo $values["nombre_producto"]; ?></td>
                                <input type="hidden" value="<?php echo $values["nombre_producto"]; ?>" name="nombre_producto[]">
                                <td><?php echo $values["cantidad_producto"]; ?></td>
                                <input type="hidden" value="<?php echo $values["cantidad_producto"]; ?>" name="cantidad_producto[]">
                                <td>$ <?php echo $values["precio_producto"]; ?></td>
                                <input type="hidden" value="<?php echo $values["precio_producto"]; ?>" name="precio_producto[]">
                                <td>$ <?php echo $values["cantidad_producto"] * $values["precio_producto"]; ?></td> 
                                <td><a href="productos.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Eliminar</span></a></td>
                            </tr>
                            <?php
                                        $total = $total + ($values["cantidad_producto"] * $values["precio_producto"]);
?>
<?php 
                                        endif;
                                    endforeach;
                            ?>  
                            <tr>  
                                <td colspan="3" style="text-align=right">Total</td>
                                <td style="text-align=right">$ <?php echo number_format($total, 2); ?></td>  
                                <input type="hidden" value="<?php echo $values['precio_producto'];?>" name="test">
                                <input type="hidden" value="<?php echo $total; ?>" name="total">
                            </tr>  
                            <?php  
                            }  
                            ?>
                        </table>
                </div>
                <input type="hidden" value="<?php echo $id ?>" name="id_usuario">
               <input class="boton" type="submit" id="pagar" value="pagar"> 
            </form>       
        </div>
        <?php if(!isset($username)){?> 
        <div class="iniciarses">
            <h2>Para poder continuar con la compra debe iniciar sesión</h2>
            <a href="login.php">Iniciar sesión</a>
            <h5>Si no posee una cuenta puede crear una <a href="signup.php">aquí</a></h5>
        </div>
        <?php } ?>
        <div class="barra-celular">
            <h1>Celulares y tablets</h1>
            <section class="phonesflex">
            <?php while($prod=$resultadocelulares->fetch_assoc()){ ?>

                    <div class="cel" name="<?php echo $prod['id_nombre'] ?>">
                    <form action="productos.php?action=add&id=<?php echo $prod['id_producto']?>" method="post">
                        <h3><?php echo $prod['nombre']; ?></h3>
                        <div class="imagen_efecto">
                            <img src="img/fotosbd/<?php echo $prod['foto'];?>" class="image">
                            <h2>$<?php echo $prod['precio'];?></h2>
                            <div class="overlay">
                                    <div class="text">
                                            El LG G6 ofrece un diseño minimalista con un cuerpo estilizado y una pantalla FullVision QuadHD+ con esquinas redondeadas que cabe en la palma de tu palma. Además, incorpora una doble cámara gran angular y selfie gran angular con disparo automático.
                                    </div>
                            </div><!--Fin overlay -->
                        </div><!--Fin imagen-efecto -->
                    <div id="hijos">
                        <input type="submit" value="Añadir al carrito" name="add_to_cart" style="margin-top:5px;" id="sumar"/>  
                        <input type="hidden" name="nombre" value="<?php echo $prod['nombre']; ?>" />  
                        <input type="hidden" name="precio" value="<?php echo $prod['precio']; ?>" />
                        <input type="number" min="1" max="9" name="cantidad" class="boton agregar" placeholder="Elija la cantidad" id="<?php echo $prod['id_nombre'];?>" />
                    </div>
                        </form>       <!-- fin formulario -->
                    </div><!-- Fin div.cel -->

                    <?php } ?>
            </section>
        </div>
        <div class="barra-celular">
            <h1>Monitor y TV</h1>
            <section class="phonesflex">
            <?php while($prod=$resultadoMonitortv->fetch_assoc()){ ?>
                    <div class="cel">
                    <form action="productos.php?action=add&id=<?php echo $prod['id_producto']?>" method="post">
                        <h3><?php echo $prod['nombre']; ?></h3>
                        <div class="imagen_efecto">
                            <img src="img/fotosbd/<?php echo $prod['foto'];?>" class="image">
                            <h2>$<?php echo $prod['precio'];?></h2>
                            <div class="overlay">
                                    <div class="text">
                                            El LG G6 ofrece un diseño minimalista con un cuerpo estilizado y una pantalla FullVision QuadHD+ con esquinas redondeadas que cabe en la palma de tu palma. Además, incorpora una doble cámara gran angular y selfie gran angular con disparo automático.
                                    </div>
                            </div><!--Fin overlay -->
                        </div><!--Fin imagen-efecto -->

                        <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />  
                        <input type="hidden" name="nombre" value="<?php echo $prod["nombre"]; ?>" />  
                        <input type="hidden" name="precio" value="<?php echo $prod["precio"]; ?>" /> 
                        <input type="number" min="1" max="9" name="cantidad" class="boton agregar" placeholder="Elija la cantidad" id="<?php echo $prod['id_nombre'];?>" />
                        </form>       <!-- fin formulario -->
                    </div><!-- Fin div.cel -->

                    <?php } ?>
            </section>
        </div>
        <div class="barra-celular">
            <h1>Gaming</h1>
            <section class="phonesflex">
            <?php while($prod=$resultadoGaming->fetch_assoc()){ ?>

                    <div class="cel">
                    <form action="productos.php?action=add&id=<?php echo $prod['id_producto']?>" method="post">
                        <h3><?php echo $prod['nombre']; ?></h3>
                        <div class="imagen_efecto">
                            <img src="img/fotosbd/<?php echo $prod['foto'];?>" class="image">
                            <h2>$<?php echo $prod['precio'];?></h2>
                            <div class="overlay">
                                    <div class="text">
                                            El LG G6 ofrece un diseño minimalista con un cuerpo estilizado y una pantalla FullVision QuadHD+ con esquinas redondeadas que cabe en la palma de tu palma. Además, incorpora una doble cámara gran angular y selfie gran angular con disparo automático.
                                    </div>
                            </div><!--Fin overlay -->
                        </div><!--Fin imagen-efecto -->

                        <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" id="sumar"/>
                        <input type="hidden" name="nombre" value="<?php echo $prod["nombre"]; ?>" />
                        <input type="hidden" name="precio" value="<?php echo $prod["precio"]; ?>"
                         />
                         <input type="number" min="1" max="9" name="cantidad" class="boton agregar" placeholder="Elija la cantidad" id="<?php echo $prod['id_nombre'];?>"/>
                         </form>       <!-- fin formulario -->
                    </div><!-- Fin div.cel -->

                    <?php } ?>
            </section>
        </div>
    </div><!-- Fin contenedor clearfix -->
        <?php include('inc/pie.php') ?>