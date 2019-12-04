<?php
  require 'header.php';
 ?>
<div class="container vh-100">
  <!-- Button trigger modal -->
  <button type="button" class="btn bg-amarelo" data-toggle="modal" data-target="#btn-login">
    Login
  </button>

  <!-- Modal -->
  <div class="modal fade font-weight-bold" id="btn-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header bg-amarelo ">
          <h5 class="modal-title " id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form class="" action="includes/login.inc.php" method="POST">
            <div class="form-row">
              <div class="col mb-3">
                <label for="usuario">Ra</label>
                <input type="text" class="form-control" name="ra" id="usuario" value="" required>
              </div>
            </div>

            <div class="form-row">
              <div class="col mb-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" value="" required>
              </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button class="btn bg-amarelo" type="submit" method="POST" name="login-submit">Entrar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</div>

<?php
require 'footer.php'; ?>
