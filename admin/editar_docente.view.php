<?php require 'header_admin.php'; ?>
<div class="container">
	<article>
		<br><h2 class="titulo">Editar Alumno :  <?php echo $post['nombre']; ?></h2><br>
		
		<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			
			<div class="form-group row">
				<div class="col">
					<label for="codigo" >Codigo:</label>
					<input class="form-control" type="text" name="codigo" id="codigo" value="<?php echo $post['codigo']; ?>">
					
					<br><label for="curso" >Curso:</label>
					<select name="curso" id="curso" class="form-control" required>
						<option value="selected" selected disabled>Seleccionar el curso</option>
						<?php foreach ($posts1 as $posts1 ): ?>
							<option value="<?php echo $posts1['curso']; ?>" ><?php echo $posts1['curso']; ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="col">
					<label for="nombre">nombre:</label>
					<input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $post['nombre']; ?>">
					
					
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