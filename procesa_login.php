<?php
    session_start();
    include('inc/conexion.php');
    if(empty($_SESSION)and isset($_POST['nombre']))
    {
        $user=$_POST['nombre'];
        $pass=$_POST['contra'];
        $sql="SELECT * FROM usuarios WHERE usuario='$user'";
        if($resultado=$conexion->query($sql))
        {
            $passguardada=$resultado->fetch_assoc();
            $verificapass=password_verify($pass,$passguardada['clave']);
            if($verificapass){
                // session_start();
                $_SESSION['id_usuario']=$passguardada['id_usuarios'];
                $_SESSION['nombre_user']=$user;
                header('location:productos.php'); 
            }
            else{
                echo "Datos incorrectos. Intentelo nuevamente <a href=\"login.php\">aqui</a>";
            }
        }
    }
    else{
        ?>
        <pre>
        <?php var_dump($_SESSION); ?>
        </pre>
    <?php }
?>
