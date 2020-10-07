
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Encuesta de <?php echo $n_curso; ?></h1>
      </div>
    </div>
  </div>

<main role="main">
  <div class="container">
    <div class="row mt-3">
    <div class="col-md-9 mx-auto">
      <div>
        <form action="" method="post">
            
          <table class="table">
              <th><tr>
                <form role="form">
                  <div class="form-group">
                      <input type="hidden" name="cod_al" readonly class="form-control" value="<?php echo $resultado['codigo']; ?>" >
                  </div>
                  <div class="form-group">
                      <input type="hidden" name="curso" readonly class="form-control" value="<?php echo $parametro; ?>" >
                  </div>
                  <div class="form-group">
                    <label>Alumno :</label>
                      <input type="text" readonly class="form-control" value="<?php echo $resultado['nombre']; ?>" >
                  </div>
                  <div class="form-group">
                      <input type="hidden" readonly name="cod_aula" class="form-control" value="<?php echo $resultado['aula']; ?>" >
                  </div>
                  <div class="form-group">
                    <label><h2>Docente : <?php echo $aula_resultado['nombre']; ?></h2></label>
                      <input type="hidden" name="cod_prof" value="<?php echo $aula_resultado['cod_prof']; ?>" class="form-control">
                  </div>
                </form>
              </tr></th>

            <?php $i=1; ?>
            <?php foreach ($pregunta as $pregunta): ?>
            <tr><th><label for="id_p1"><p class="h6"><em> <?php echo $i.' - '.$pregunta['texto']; ?>  : <br/></p></em></br></label></th><td>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-primary" required>
            <input type="radio" class="form-check-input" name="p<?php echo $i; ?>" value=1 id="id_p<?php echo $i; ?>" autocomplete="off" required> Malo<br>
            </label>
            <label class="btn btn-outline-primary ">
            <input type="radio" class="form-check-input" name="p<?php echo $i; ?>" value=2 id="id_p<?php echo $i; ?>" autocomplete="off" required> Regular<br>
            </label>
            <label class="btn btn-outline-primary ">
            <input type="radio" class="form-check-input" name="p<?php echo $i; ?>" value=3 id="id_p<?php echo $i; ?>" autocomplete="off" required> Bueno<br>
            </label>
            <label class="btn btn-outline-primary ">
            <input type="radio" class="form-check-input" name="p<?php echo $i; ?>" value=4 id="id_p<?php echo $i; ?>" autocomplete="off" required> Muy Bueno<br>
            </label>
            </div>
            </td></tr>
            <?php $i=$i+1; ?>
            <?php endforeach ?> 
          </table>
          <br>
          <center><input class="btn btn-success btn-lg" type="submit" value="Enviar Respuestas" /><br><br><br><br><br></center>
        </form>
      </div>
    </div>
    </div>
  </div>
  </main>
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo RUTA;?>vendor/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo RUTA;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
