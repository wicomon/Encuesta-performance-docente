

<?php if (!isset($post)): ?>
		<div class="container">
			<br><h2>Listado de Alumnos</h2><a href="agregar_alumno.php" class="btn btn-success">Agregar Alumno</a><br><br>
			<form class="" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="form-group">
					<label for="exampleInputEmail1">Ingresar Aula:</label>
					<input type="text" name="nro_aula">	
				</div>
				<input type="submit" class="btn btn-primary" value="Consultar">
			</form>
		</div>

<?php endif ?>


	<?php if (isset($posts)): ?>
	

	<div class="container">
		<br><br><h2>Encuestas </h2> 
		
	<br><table class="table table-bordered"> 
	<thead class="table-secondary">
		<tr>
			<td>Codigo </td><td>Nombre</td><td>Aula</td><td>Acciones</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post ): ?>
		<tr>
			<td><?php echo $post['codigo']?> </td><td><?php echo $post['nombre']?></td><td><?php echo $post['aula']?></td>
			<td><a href="editar_alumno.php?codigo=<?php echo $post['codigo']; ?>" class="btn btn-secondary btn-sm" title="">Editar</a></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table> 

	</div>

<?php endif ?>

<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>