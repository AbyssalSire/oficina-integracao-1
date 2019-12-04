<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Registrar",$buffer);
            echo $buffer;
?>


<main>

  <div class="container bg-light vh-100">
    <div class="py-5">
      <div class="row justify-content-center">

        <div class="col-10">
          <div class="">
            <h3>Registrar Aluno</h3>
          </div>

          <form class="p-3 border">

            <div class="form-row">
              <div class="form-group col ">
                <label for="input-email4">Email</label>
                <input type="email" class="form-control" id="input-email" placeholder="Email" required>
              </div>
              <div class="form-group col">
                <label for="input-celular">Celular</label>
                <input type="text" class="form-control" id="input-celular" placeholder="(00) 9999-9999" name="input-celular" required>
              </div>
            </div>

            <div class="form-row ">

              <div class="form-group col">
                <label for="input-nome">Nome</label>
                <input type="text" class="form-control" id="input-nome" placeholder="Ronaldo Silva" required>
              </div>

              <div class="form-group col">
                <label for="input-curso">Curso</label>

                <select id="input-curso" class="form-control">
                  <option selected>Escolher...</option>
                  <option>Engenhaira de Software</option>
                  <option>Engenhaira da Computação</option>
                  <option>Engenhaira Elétrica</option>
                  <option>Engenhaira de Automação</option>
                  <option>Engenhaira Mecânica</option>
                </select>

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col">
                <label for="input-ra">RA</label>
                <input type="text" class="form-control" id="input-ra" placeholder="Informe uma enha" required>
              </div>

              <div class="form-group col">
                <label for="input-senha">Senha</label>
                <input type="password" class="form-control" id="input-senha" placeholder="Repetir Senha" required>
              </div>

            </div>


            <button type="submit" class="btn btn-primary">Entrar</button>
          </form>

        </div>

      </div>
    </div>
  </div>

</main>
<?php
    require "footer.php";
?>
