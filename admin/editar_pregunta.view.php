<?php require 'header_admin.php'; ?>
<div class="container">
	<article>
		<br><h2 class="titulo">Editar Pregunta Número <?php echo $post['id']; ?></h2><br>
		
		<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
				
				<label for="exampleInputEmail1">Pregunta:</label>
				<textarea name="texto" class="form-control" id="texto"><?php echo $post['texto']; ?></textarea>
			</div>
			<input type="submit" class="btn btn-primary" value="Modificar pregunta">
		</form>

	</article>
</div>



<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>