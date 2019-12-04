<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Registrar",$buffer);
            echo $buffer;
?>

<main>

  <?PHP /*
         <div class="wrapper-main">
                <section class="section-default">
                        <h1>Criar conta<h1>
                                <form class="form-signup" action="includes/signup.inc.php" method="POST">
                                <input type="text" name="ra" placeholder="Insira seu R.A."><br>
                                <input type="text" name="nome" placeholder="Insira seu Nome"><br>
                                <input type="password" name="senha" placeholder="Insira sua senha"><br>
                                <input type="password" name="senha-confirma" placeholder="Insira sua senha novamente"><br>
                                <button type="submit" name="signup-submit">Inscrever-se</button>
                            </form>
                        </section>
                    </div>
                    */
    ?>

  <div class="container bg-light vh-100">
    <div class="py-5">
      <div class="row justify-content-center">

        <div class="col-10">
          <div class="">
            <h3>Cadastrar</h3>
          </div>

          <div class="">
            <form class="p-3 border" action="includes/signup.inc.php" method="POST">

              <div class="form-row">
                <div class="form-group col">
                  <label for="input-nome">Nome</label>
                  <input type="text" class="form-control" id="input-nome" name="nome" placeholder="Ronaldo Silva" required>
                </div>

                <div class="form-group col">
                  <label for="input-curso">Curso</label>
                  <select id="input-curso" name="alu_curso" class="form-control">
                    <option value="não informado" selected>Escolher...</option>
                    <option value="engenharia de software">Engenharia de Software</option>
                    <option value="engenharia de computação">Engenharia da Computação</option>
                    <option value="engenharia elétrica">Engenharia Elétrica</option>
                    <option value="engenharia de controle e automação">Engenharia de Controle e Automação</option>
                    <option value="engenharia mecânica">Engenharia Mecânica</option>
                  </select>
                </div>
              </div>


              <div class="form-row">

                <div class="form-group col">
                  <label for="input-ra">RA</label>
                  <input type="text" name="ra" class="form-control" id="input-ra" placeholder="123456" required>
                </div>
                <div class="form-group col">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col">
                  <label for="input-senha">Senha</label>
                  <input type="password" name="senha" class="form-control" id="input-senha" placeholder="senha123" required>
                </div>

                <div class="form-group col">
                  <label for="input-senha">Confirmar senha</label>
                  <input type="password" name="senha-confirma" class="form-control" id="input-senha" placeholder="senha123" required>
                </div>
              </div>


              <button type="submit" name="signup-submit" class="btn btn-primary">Criar conta</button>
            </form>
          </div>
        </div>


      </div>
    </div>


  </div>
</main>

<?php
    require "footer.php";
?>
