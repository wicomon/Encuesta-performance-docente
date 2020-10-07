<?php require 'header_admin.php'; ?>
	<div class="container">
		<br><br><center><h2>Listado de Preguntas</center></h2>
		<br>
<table class="table table-bordered">
	<thead class="table-secondary">
		<tr>
			<th scope="col"><b>Nro</b></th>
			<th scope="col"><b>Texto</b></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post ): ?>
		<tr>
			<td><?php echo $post['id']?> </td><td><?php echo $post['texto']?></td>

			<td><a href="editar_pregunta.php?id=<?php echo $post['id']; ?>" class="btn btn-success btn-sm" title="">Editar</a></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table> 

</div><br><br>

<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>