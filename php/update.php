<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Alterar Dados",$buffer);
            echo $buffer;
?>


<main>
  <div class="container bg-light vh-100">
    <div class="py-5">
      <div class="row justify-content-center">
        <div class="col-10">

          <div class="">
              <h3>Editar Dados do Aluno</h3>
          </div>

          <form class="p-3 border" action="includes/update.inc.php" method="POST">

            <div class="form-row">
              <div class="form-group col">
                <label for="input-nome">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Ronaldo Silva" >
              </div>

              <div class="form-group col">
                <label for="input-curso">Curso</label>
                <select name="curso" class="form-control">
                  <option selected>Escolher...</option>
                  <option>Engenharia de Software</option>
                  <option>Engenharia da Computação</option>
                  <option>Engenharia Elétrica</option>
                  <option>Engenharia de Automação</option>
                  <option>Engenharia Mecânica</option>
                </select>
              </div>
            </div>


            <div class="form-row">

              <div class="form-group col">
                <label for="input-ra">RA</label>
                <input type="text" class="form-control" name="input-ra" placeholder="123456">
              </div>

              <div class="form-group col">
                <label for="input-senha">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="a123456">
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col ">
                <label for="input-email4">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div>
              <div class="form-group col">
                <label for="input-celular">Celular</label>
                <input type="text" class="form-control" name="celular" placeholder="(00) 9999-9999" name="input-celular">
              </div>
            </div>


            <button type="submit" class="btn btn-primary" name="update-submit">Alterar dados</button>
          </form>

        </div>
      </div>

    </div>

  </div>

</main>
<?php
    require "footer.php";
?>
