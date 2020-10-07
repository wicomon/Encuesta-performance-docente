

<?php if (!isset($post)): ?>
		<div class="container">
			<br><h2>Consulta de Encuestas Por Aula</h2><br>
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
		<a class="btn btn-success" href="createExcel.php?parametro=<?php echo $_POST['nro_aula']; ?>">Generar Reporte</a> <br>
		
	<br><table class="table table-bordered"> 
	<thead class="table-secondary">
		<tr>
			<td>ID encuesta</td><td>codigo</td><td>Curso</td><td>Docente</td><td>aula</td><td>P 1</td><td>P 2</td><td>P 3</td><td>P 4</td><td>P 5</td><td>P 6</td>
			<td>P 7</td><td>P 8</td><td>P 9</td><td>P 10</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post ): ?>
		<tr>
			<td><?php echo $post['id']?> </td><td><?php echo $post['cod_al']?></td><td><?php echo nombreCurso($post['curso'])?></td><td><?php echo $post['cod_prof']?></td>
			<td><?php echo $post['cod_aula']?></td><td><?php echo $post['p1']?></td><td><?php echo $post['p2']?></td><td><?php echo $post['p3']?></td>
			<td><?php echo $post['p4']?></td><td><?php echo $post['p5']?></td><td><?php echo $post['p6']?></td><td><?php echo $post['p7']?></td><td><?php echo $post['p8']?></td><td><?php echo $post['p9']?></td><td><?php echo $post['p10']?></td>
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