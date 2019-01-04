<?php 
    $nombre_producto=$_POST['nombre_producto'];
    $cantidad_producto=$_POST['cantidad_producto'];
    $precio_producto=$_POST['precio_producto'];
    $total_compra=(float)$_POST['total'];
?>
<pre>
<?php 
    $prod=array_combine($nombre_producto,$cantidad_producto);

    use PayPal\Api\Payer;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Details;
    use PayPal\Api\Amount;
    use PayPal\Api\Transaction;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Payment;

    //Para poder guardar en la base de datos el ticket
    require_once('inc/func/json.php');
    $bdprod=productos_json($prod);


    require 'inc/func/config.php';
    $compra=new Payer();
    $compra->setPaymentMethod('paypal');
    $i=0;
    $arreglo_pedido=array();

    
    //creamos el articulo y le damos sus propiedades
    foreach ($prod as $key => $value) {
        ${"articulo$i"}=new Item();
        $arreglo_pedido[]=${"articulo$i"};
        ${"articulo$i"}->setName($key)
                 ->setCurrency('USD')
                 ->setQuantity((int)$value)
                 ->setPrice((float)$precio_producto[$i]);
        $i++;
    }

    $listaArticulos =new ItemList();
    $listaArticulos->setItems($arreglo_pedido);

    $cantidad=new Amount();
    $cantidad->setCurrency('USD')
             ->setTotal((float)$total_compra);

    $transaccion=new Transaction();
    $transaccion->setAmount($cantidad)
                ->setItemList($listaArticulos)
                ->setDescription('Pago de TechPalace')
                ->setInvoiceNumber(uniqid());
    
    // echo $cantidad->getTotal();
    
    $randomid=rand();

    $redireccionar= new RedirectUrls();
    $redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true&rand=$randomid")
                  ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");


    $pago= new Payment();
    $pago->setIntent("sale")
         ->setPayer($compra)
         ->setRedirectUrls($redireccionar)
         ->setTransactions(array($transaccion));

    $id_usuario=$_POST['id_usuario'];
    try{
        // Incluimos la conexion a la base de datos
        require_once('inc/conexion.php');
        //Se coloca esto para poder mostrar tiles y ñ
        if($stmt = $conexion ->prepare("INSERT INTO compra VALUES (null, ?, ?, ?, null,?)")){
            $stmt->bind_param("idsi", $id_usuario, $total_compra,$bdprod,$randomid);
            $stmt->execute();
            $stmt->close();
            $conexion->close();   
            echo "<script>alert('se guardo')</script>";
        } 
        else{
                $error = $conexion->error . ' ' . $conexion->error;
                echo $error;  
            }
        $pago->create($apiContext);
    
    }catch(PayPal\Exception\PayPalConnectionException $pce){
        echo "<pre>";

        print_r(json_decode($pce->getData()));
        exit;
        
        echo "</pre>";
    }

    $aprobado=$pago->getApprovalLink();
    header("Location:{$aprobado}");
    
    //LO QUE HACE QUE SE GUARDE EN AL ABSE DE DATOS
    
?>
