<?php
include('inc/conexion.php');
$mostrador="";
$query="SELECT * FROM productos ORDER BY id_productos";

if(isset($_POST['productos']))
{
	$q=$conexion->real_escape_string($_POST['productos']);
	$query="SELECT * FROM productos WHERE 
		id_producto LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%'";

$buscarProducto=$conexion->query($query);

if ($buscarProducto->num_rows > 0)
{
	ob_start(); 
	while($filaProducto= $buscarProducto->fetch_assoc())
	{ 

?>
		<div class="resultados">
			<a href="productos.php#<?php echo $filaProducto['id_nombre'] ?>">
			<div class="minimo"><img src="img/fotosbd/<?php echo $filaProducto['foto'];?>" alt="<?php echo $filaProducto['nombre'] ?>"></div>
			<div class="medio"><?php echo $filaProducto['nombre'] ?>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, cumque officia voluptates omnis voluptatibus temporibus quos possimus ut provident numquam suscipit neque libero deserunt quam unde minus quibusdam rem! Sit!</p>
			</div>
			<div class="max">
				<p>Precio</p>
				$<?php echo $filaProducto['precio'] ?>
			</div>
			</a>
		</div>
<?php  
	 }
	 $mostrador= ob_get_clean(); 
	}
} else
	{
		$mostrador="No se encontraron coincidencias con sus criterios de búsqueda.";
	}
echo $mostrador;
?>
