
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5"><?php echo " ".$resultado['nombre']; ?></h1><br>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
          <div class="col-sm">
            <?php $c = 0; ?>
            <?php if (!isset($c_rm)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=rm" class="list-group-item list-group-item-action list-group-item-primary">Encuesta Raz. Matematico</a> <?php $c++; ?>
            <?php endif ?>

            <?php if (!isset($c_rv)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=rv" class="list-group-item list-group-item-action list-group-item-secondary">Encuesta Raz. Verbal</a><?php $c++; ?>
          <?php endif ?>

          <?php if (!isset($c_aritmetica)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=aritmetica" class="list-group-item list-group-item-action list-group-item-success">Encuesta Aritmetica</a><?php $c++; ?>
          <?php endif ?>
          <?php if (!isset($c_geometria)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=geometria" class="list-group-item list-group-item-action list-group-item-danger">Encuesta Geometria</a><?php $c++; ?>
          <?php endif ?>
          <?php if (!isset($c_algebra)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=algebra" class="list-group-item list-group-item-action list-group-item-warning">Encuesta Algebra</a><?php $c++; ?>
          <?php endif ?>
          <?php if (!isset($c_trigonometria)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=trigonometria" class="list-group-item list-group-item-action list-group-item-info">Encuesta Trigonometria</a><?php $c++; ?>
          <?php endif ?>
          <?php if (!isset($c_biologia)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=biologia" class="list-group-item list-group-item-action list-group-item-light">Encuesta Biologia</a><?php $c++; ?>
          <?php endif ?>
          <?php if (!isset($c_quimica)): ?>
          <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=quimica" class="list-group-item list-group-item-action list-group-item-dark">Encuesta Química</a><?php $c++; ?>
          <?php endif ?>
        </div>
         <div class="col-sm">
          <ul class="list-group">
              <?php if (!isset($c_fisica)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=fisica" class="list-group-item list-group-item-action list-group-item-primary">Encuesta Física</a><?php $c++; ?>
              <?php endif ?>
              <?php if (!isset($c_lenguaje)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=lenguaje" class="list-group-item list-group-item-action list-group-item-secondary">Encuesta Lenguaje</a><?php $c++; ?>
              <?php endif ?>
              <?php if (!isset($c_literatura)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=literatura" class="list-group-item list-group-item-action list-group-item-success">Encuesta Literatura</a><?php $c++; ?>
              <?php endif ?>
              <?php if (!isset($c_geografia)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=geografia" class="list-group-item list-group-item-action list-group-item-danger">Encuesta Geografia</a><?php $c++; ?>
              <?php endif ?>
              <?php if (!isset($c_psicologia)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=psicologia" class="list-group-item list-group-item-action list-group-item-warning">Encuesta Psicología</a><?php $c++; ?>
              <?php endif ?>
              <?php if (!isset($c_hp)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=hp" class="list-group-item list-group-item-action list-group-item-info">Encuesta Historia del Peru</a><?php $c++; ?>
              <?php endif ?>
              <?php if (!isset($c_hu)): ?>
              <a href="<?php echo RUTA;?>encuestas/encuesta.php?parametro=hu" class="list-group-item list-group-item-action list-group-item-light">Encuesta Historia Universal</a><?php $c++; ?>
              <?php endif ?>
         </ul>
        </div>

      </div>
      <div class="container">
      <?php if ($c==0): ?>
          <br><br><br><center><h1>Se llenaron todas las encuestas.</h1></center>
          <center><img src="images/ok.png">
            <br><br><a href="<?php echo RUTA;?>cerrar.php" class="btn btn-primary btn-lg  btn-danger">Cerrar Sesion</a><br><br>
          </center> 

        <?php endif ?></div>

    </div>
  <main role="main">
    <div class="container">
      <div class="row mt-3">
      <div class="col-md-9 mx-auto">
        <div>

        </div>
      </div>
      </div>
    </div>
    </main>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>
