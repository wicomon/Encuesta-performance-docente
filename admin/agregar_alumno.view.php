<?php require 'header_admin.php' ?>

	<div class="container">
		<br><h2 class="titulo">Agregar Alumno : </h2><br>
		
		<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			
			<div class="form-group row">
				<div class="col">
					<label for="codigo" class="badge badge-info" >Codigo:</label>
					<input class="form-control" type="text" name="codigo" id="codigo">

					<label for="nombre" class="badge badge-info">Nombre:</label>
					<input class="form-control" type="text" name="nombre" id="nombre">		
				</div><br>

				<div class="col">
					<label for="aula" class="badge badge-info">Aula:</label>
					<input class="form-control" type="text" name="aula" id="aula">
					
					<label for="pass" class="badge badge-info" >Contraseña:</label>
					<input class="form-control" type="text" name="pass" id="pass">
				</div>
				<br><br>
			</div>
			<input type="submit" class="btn btn-primary" value="Agregar Alumno">
		</form>
	</div>
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>