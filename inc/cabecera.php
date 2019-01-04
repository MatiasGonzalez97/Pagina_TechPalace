<?php
    session_start();
    if(isset($_SESSION['nombre_user'])){
        $username=$_SESSION['nombre_user'];
        $id=$_SESSION['id_usuario'];
    }
    //Esto sirve para poder ponerle un "activo" a la pagina en la que estoy
    $archivo=basename($_SERVER['PHP_SELF']);
    $pagina =str_replace('.php',"",$archivo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lora|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="estilos/style_common.css">
    <link rel="stylesheet" href="estilos/style1.css">
    <link rel="stylesheet" href="estilos/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="javascript/jquery-3.3.1.min.js"></script>
    <title>TechPalace</title>
</head>
<body class="<?php echo $pagina ?>">
    <header>
            <div class="contenido-header">
                <div class="hamburguer-menu">
                    <div class="barras">
                        <i class="fas fa-bars "></i>
                    </div>
                </div>
                <nav>
                    <div class="contenedor mostrar">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="nosotros.php">Nosotros</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                            <li><a href="productos.php">Productos</a></li>
                            <?php if(isset($_SESSION['nombre_user'])){ ?>
                            <li id="username"><a href="#"><?php echo $username; ?></a></li>
                                <ul id="cerrar_sesion " class="oculto">
                                    <li><a  href="cerrar_sesion.php">cerrar sesion</a></li>
                                </ul>
                            <?php 
                            }else{ 
                            ?>
                            <li><a href="signup.php">Crear Cuenta</a></li>
                            <li><a href="login.php">Iniciar sesión</a></li>
                            <?php } ?>         
                        </ul>
                    </div>
                </nav>
<?php
                if( $pagina == 'index'){ ?>
                    <div class="contenedor">
                        <section class="centerelement">
                            <input class="busqueda" type="text" name="busqueda" id="busqueda" placeholder="Buscar producto...">
                        </section>
                        <section id="tabla_resultado">
                        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
                        </section>
                    </div>
                    <div class="cycle-slideshow mini" data-cycle-fx=scrollHorz data-cycle-timeout=2000>
                        <!-- empty element for overlay -->
                        <div class="cycle-overlay"></div>
                        <img src="img/cel.png" 
                            data-cycle-title="Celulares" 
                            data-cycle-desc="Mac">
                        <img src="img/LG_Banner.png" 
                            data-cycle-title="Monitores" 
                            data-cycle-desc="Muir Woods National Monument">
                        <img src="img/razer.jpg" 
                            data-cycle-title="Accesorios gamer" 
                            data-cycle-desc="San Franscisco Bay">
                    </div>

                <?php } 
                else{ ?>
                    <div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=2000>
                        <!-- empty element for overlay -->
                        <div class="cycle-overlay"></div>
                        <img src="img/img1.jpg" 
                            data-cycle-title="Computadora" 
                            data-cycle-desc="Mac">
                        <img src="img/img2.jpg" 
                            data-cycle-title="Telefono" 
                            data-cycle-desc="Muir Woods National Monument">
                        <img src="img/img3.jpg" 
                            data-cycle-title="Joysticks" 
                            data-cycle-desc="San Franscisco Bay">
                        <img src="img/para.jpg" 
                            data-cycle-title="Paisaje" 
                            data-cycle-desc="Adirondack State Park">
                    </div>
                <?php } ?>
               
            </div>
    </header>
