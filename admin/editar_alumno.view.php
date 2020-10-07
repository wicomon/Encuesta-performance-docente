<?php require 'header_admin.php'; ?>
<div class="container">
	<article>
		<br><h2 class="titulo">Editar Alumno :  <?php echo $post['codigo']; ?></h2><br>
		
		<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			
			<div class="form-group row">
				<div class="col">
					<label for="codigo" >Codigo:</label>
					<input class="form-control" type="text" name="codigo" id="codigo" value="<?php echo $post['codigo']; ?>">

					<label for="aula">Aula:</label>
					<input class="form-control" type="text" name="aula" id="aula" value="<?php echo $post['aula']; ?>">
				</div>

				<div class="col">
					<label for="nombre">nombre:</label>
					<input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $post['nombre']; ?>">
					
					<label for="pass" >Password:</label>
					<input class="form-control" type="text" name="pass" id="pass" value="<?php echo $post['pass']; ?>"><br>
				</div>
				<div class="col">
				</div>
			</div>
			
			<input type="submit" class="btn btn-primary" value="Modificar Datos">
	
		</form>

	</article>
</div>



<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>