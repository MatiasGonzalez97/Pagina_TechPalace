<?php include('inc/cabecera.php') ?>
    <section class="fondo_sign">
        <div class="login contenedor">
            <form action="procesa_formulario.php" method="POST">              
                    <div class="container">
                      <label for="username"><b><span class="especial2">Usuario</span></b></label>
                      <input type="text" placeholder="Enter nombre de usuario" name="username" required>
                  
                      <label for="password"><b><span class="especial2">Contraseña</span></b></label>
                      <input type="password" placeholder="Ingrese contraseña" name="password" required>
                      
                      <label for="nombre"><b><span class="especial2">Nombre</span></b></label>
                      <input type="text" placeholder="Ingresa nombre" name="nombre" >

                      <label for="apellido"><b><span class="especial2">Apellido</span></b></label>
                      <input type="text" placeholder="Ingrese su apellido" name="apellido">

                      <label for="direccion"><b><span class="especial2">Dirección</span></b></label>
                      <input type="text" placeholder="Ingrese su dirección" name="dire" >

                      <label for="telefono"><b><span class="especial2">Telefono</span></b></label>
                      <input type="number" placeholder="Ingrese su telefono" name="telefono">

                      <label for="email"><b><span class="especial2">E-mail</span></b></label>
                      <input type="text" placeholder="Ingrese su email" name="email" required>

                      <button type="submit">Crear cuenta</button>
                    </div>
            </form>
        </div>
    </section>
    <?php include('inc/pie.php') ?>