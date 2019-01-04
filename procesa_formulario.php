<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lora|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>TechPalace</title>
</head>
<body>
<?php 
    include('inc/conexion.php');
    //Variables
    $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
    $pass=password_hash(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
    $nombre=filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_STRING);
    $apellido=filter_input(INPUT_POST,'apellido',FILTER_SANITIZE_STRING);
    $direccion=filter_input(INPUT_POST,'dire',FILTER_SANITIZE_STRING);
    $telefono=filter_input(INPUT_POST,'telefono',FILTER_SANITIZE_STRING);
    $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
    //----------------------------------------

    // Funcion expresion regular
    function compruebaUsername($username){ 
        //Comprueba que el nombre de usuario no tenga caracteres especiales y sea mayor a 3 y 20
        if (preg_match('/^[a-zA-Z0-9\-_]{3,20}$/', $username)) { 
           return true; 
        } else {  
           return false; 
        } 
     }

    //  Obtenemos los valores de la base de datos

    $usernamebd=mysqli_query($conexion,"SELECT usuario FROM usuarios WHERE usuario='$username'");
    $filausername=mysqli_fetch_array($usernamebd);

    // Empiezan las comprobaciones y validaciones en la base de datos
    if(compruebaUsername($username)==false){
        echo "<script>alert('El nombre de usuario contiene caracteres especiales, es nulo o no es mayor a 3 caractes de largo');</script>";
    }
    else{
            if($filausername['usuario']==$username){
                    while($filausername['usuario']==$username){
                        $aleatorios=rand(0,100);
                        $username.=$aleatorios;
                        $usernamebd=mysqli_query($conexion,"SELECT usuario FROM usuarios WHERE usuario='$username'");
                        $filausername=mysqli_fetch_array($usernamebd);
                    }
                    echo "Ese username ya está siendo usado puede elegir entre estas opciones: ".$username;    
            }
            else{
                //Comprueba que los campos no se encuentren vacios
                if($username==''   || $pass=='' || $nombre=='' || $apellido=='' || $direccion=='' || $telefono=='' || $email==''){
        ?>      
                <section class="fondo_sign">
                    <div class="contenedor">
                        <h1>Vuelva a intentarlo tiene campos vacios</a></h1>
        <?php   
                }
                else{
                    //Comprueba si los datos son numericos
                    if(ctype_digit($telefono)==false){
        ?>
                        <h1>En el campo <b>Telefono</b> deben ir solo numeros</h1>
        <?php
                    }
                    else{
                        $arroba='@';
                        $com='.com';
                        //Comprueba si el email tiene ALMENOS un @ y un .com
                        if(strpos($email,$arroba)===false || strpos($email,$com)===false){
        ?>  
                        <h1>No ha ingresado un mail valido</h1>
        <?php        
                        }
                        else{
                            //Comprueba que no haya un email igual almacenado en la bd
                            $emailbd=mysqli_query($conexion,"SELECT email FROM usuarios WHERE email='$email'");
                            $filaemail=mysqli_fetch_array($emailbd);
                            if($filaemail['email']==$email){
        ?>                   
                        <h1>Ya Se ha registrado con este email</h1>
        <?php                
                        }
                            else{
                    //Si todo esta correcto, almacena los datos en la base de datos
                    $res=mysqli_query($conexion,"INSERT INTO usuarios VALUES (NULL,'$username','$pass','$nombre','$apellido','$direccion','$telefono','$email')");
        ?>
                        <p>Se registro correctamente, <a href="index.php">Volver al inicio</a></p>
                    </div>
                </section>
        <?php   
                        }
                    }
                }
            }
        }
    }
?>
    
</body>
</html>