<div class="container">
		<br><h2>Lista de Encuestas Totales</h2>
		<br>
		<a class="btn btn-success" href="excel_reporte.php">Generar Reporte </a>
	<table class="table table-bordered">

		<br><thead class="table-secondary">
			<br><tr>
				<td>ID encuesta</td><td>codigo</td><td>Curso</td><td>Docente</td><td>aula</td><td>P 1</td><td>P 2</td><td>P 3</td><td>P 4</td><td>P 5</td><td>P 6</td>
				<td>P 7</td><td>P 8</td><td>P 9</td><td>P 10</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($posts as $post ): ?>
			<tr>
				<td><?php echo $post['id']?> </td><td><?php echo $post['cod_al']?></td><td><?php echo $post['curso']?></td><td><?php echo $post['cod_prof']?></td>
				<td><?php echo $post['cod_aula']?></td><td><?php echo $post['p1']?></td><td><?php echo $post['p2']?></td><td><?php echo $post['p3']?></td>
				<td><?php echo $post['p4']?></td><td><?php echo $post['p5']?></td><td><?php echo $post['p6']?></td><td><?php echo $post['p7']?></td><td><?php echo $post['p8']?></td><td><?php echo $post['p9']?></td><td><?php echo $post['p10']?></td>

				<!--<td><a href="editar.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary btn-sm" title="">Editar</a></td>
				<td><a href="borrar.php?id=<?php echo $post['id']; ?>" class="btn btn-secondary btn-sm" title="">Borrar</a></td>	-->
			</tr>
			<?php endforeach ?>
		</tbody>
	</table> 
</div>

<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>