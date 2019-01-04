<?php include('inc/cabecera.php'); ?>
<div class="contenedor login">
    <form action="procesa_login.php" method="post">
        <label for="username"><b><span class="especial2">Usuario</span></b></label>
        <input type="text" placeholder="Enter nombre de usuario" name="nombre" required>
        <label for="password"><b><span class="especial2">Contraseña</span></b></label>
        <input type="password" placeholder="Ingrese contraseña" name="contra" required>
        <input type="submit" value="enviar">
    </form>
</div>
<?php include('inc/pie.php') ?>