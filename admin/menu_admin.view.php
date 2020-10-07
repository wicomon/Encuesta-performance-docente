<!DOCTYPE html>
<html>
<head>
	
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/estilos1.css">
</head>

<body>
<!--  <header>
    <div class="contenedor">
      <h1 class="titulo"> Panel de Control</h1>
    </div>
  </header>-->

  <br><br><br><br><section class="fotos">
    <div class="contenedor">
      <?php 
          echo '<div class="thumb"><a href="alumnos.php">A L U M N O S<img src="../images/alumnos.jpg"  height="220px"></a></div>';    
          echo '<div class="thumb"><a href="lista_encuestas.php">ENCUESTAS TOTALES<img src="../images/encuesta.jpg" alt="" height="220px"></a></div>';
          echo '<div class="thumb"><a href="lista_encuestas_aula.php"> ENCUESTAS POR AULAS<img src="../images/encuesta_aula.jpg" alt="" height="220px"></a></div>';
          echo '<div class="thumb"><a href="preguntas.php">ADMINISTRAR PREGUNTAS<img src="../images/preguntas.jpg" alt="" height="220px"></a></div>';
          echo '<div class="thumb"><a href="docentes.php">D O C E N T E S<img src="../images/profesor.jpg" alt="" height="220px"></a></div>';
       ?>
    </div>
  </section>

  <footer>
    <br><br>
    <p  class="copyright">Web Creada por Williams Cordova Villalva - 2K19</p>
  </footer>
</body>

<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>