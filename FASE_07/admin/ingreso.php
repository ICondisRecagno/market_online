<?php 

if (isset($_POST["formulario"])) {
		
		global $conexion;

		$consulta = $conexion->query("SELECT * FROM usuarios;");
		while($fila = $consulta->fetch()) {
			if ($_POST["email"] == $fila["Email"] && $_POST["pass"] == $fila["Pass"]){
				// LOGIN CORRECTO
				$rol = $conexion->query("SELECT * FROM rol WHERE ID =".$fila["Rol"])->fetch();
				
				// crear la variable de session
				$_SESSION["usuario"] = array(
					"Email" => $fila["Email"],
					"Rol" => "",
					"Producto" => array(
						"Editar" => $rol["EditarProducto"],
						"Borrar" => $rol["BorrarProducto"],
						"Agregar" => $rol["AgregarProducto"],
						"Ver" => $rol["VerProducto"]
					)
				);
				// Redirigir el admin
				if ($_POST["restaurar"] == "on")  {
					$pagina = $_COOKIE ["ultimaVisita"];
					header("Location ".$pagina);
				} else{

				header ("Location: index.php");
				}
			}
		}

}
 ?>
<div class="account_grid">
<?php
	if (isset( $_GET["rta"]) ) {
		echo MostrarMensaje( $_GET["rta"] );
	}
?>
	<div class="login-right">
		<h3>INGRESO DE USUARIO</h3>
		<form action="<?= $_SERVER['PHP_SELF'] ?>?page=ingreso" method="post">
			<input type="hidden" name="formulario" value="ok">
		<div>
			<span>E-Mail:</span>
			<input type="text" name="email"> 
		</div>
		<div>
			<span>Contraseña:</span>
			<input type="password" name="pass"> 
		</div>
		<div>
			<span>
			
			</span>
		</div>
			<input type="submit" value="Ingresar">
			<br>
			<a class="forgot" href="#">¿Olvidaste tu contraseña?</a>
		</form>
	</div>	
	<div class=" login-left">
		<h3>¿NUEVO USUARIO?</h3>
		<a class="acount-btn" href="registro.php">Crear una cuenta</a>
	</div>
	<div class="clearfix"></div>
</div>