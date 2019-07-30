<?php
	
		include("conexion.php");
		

	if (isset($_SESSION["usuario"])) {
			setcookie("ultimaVisita", "index.php");
			$pagina = 1;
		if (isset( $_GET["rta"]) ) {
			echo MostrarMensaje( $_GET["rta"] );
		}
		if ( isset($_GET["p"]) ) {
			$pagina = $_GET["p"];
		} else {
			$pagina = 1;
		}
?>
<h1>Listado de Productos</h1><h3><i>Usuario: </i><?= $_SESSION["usuario"]["Email"] ?></h3>
<?php 
	if($_SESSION["usuario"]["Producto"]["Agregar"] == "1") {
 ?>
<a href="admin/?page=producto&amp;action=add" class="now-get">Nuevo producto</a>
<?php }; ?>
<!-- <b><a href="admin/logout.php">Cerrar Sesion</a></b> -->
<?php 
	ListarProductos($pagina, 5); 
}else {
	header("Location: index.php?page=ingreso");
}	

?>