<div class="register">
<?php
	if (isset( $_GET["rta"]) ) {
		echo MostrarMensaje( $_GET["rta"] );
	}
?>
		<div class="register-top-grid">
			<h3>NUEVO USUARIO</h3>
			<form action="<?php echo BACK_END_URL . "/usuario.php?action=addUser"; ?>" method="post">
				<div class="mation">
					<span>Nombre: <label>*</label></span>
					<input type="text" name="nombre"> 
					<span>Apellido: <label>*</label></span>
					<input type="text" name="apellido"> 
					<span>E-Mail: <label>*</label></span>
					<input type="text" name="email">
					<span>Contraseña: <label>*</label></span>
					<input type="password" name="pass">
					<div class="register-but">
						<input type="submit" value="Registrarme">
					</div>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>