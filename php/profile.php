<?php
    ob_start();
    include("header.php");

    $buffer=ob_get_contents();
    ob_end_clean();

    $buffer=str_replace("%TITLE%","Conta",$buffer);
    echo $buffer;
    require 'includes/dbh.inc.php';
    $alu_ra =  $_SESSION["userRA"];
    if(isset($_POST['createoffersuccess']))
    {
      echo "<p>Aula Criada com sucesso</p>";
    }
    if(isset($_GET['creation-canceled']))
    {
    echo "<p>Criação cancelada com sucesso</p>";
    }


    $sql = "SELECT * FROM aluno WHERE alu_ra=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "i", $alu_ra);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_assoc($result);

      if($row == NULL){
        header("Location: ../index.php?error=wrongpassword");
        exit();
      }
      else {
        $alu_nome = $row["alu_nome"];
        $alu_curso = $row["alu_curso"];
        $alu_curso = $row['alu_curso'];

        $alu_email = $row["alu_email"];
        $alu_celular = intval($row['alu_celular']);
      }
      $sql2 = "SELECT * FROM tutor WHERE tutor_ra=?";
      $stmt2 = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt2, $sql2)){
        header("Location: ../index.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt2, "i", $alu_ra);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $row2 = mysqli_fetch_assoc($result2);

        if(!$row2 == NULL){
          $tutor = true;
        }
        else {
          $tutor = false;
        }}}


?>


<main>

  <div class="container bg-light h-auto">
    <div class="row justify-content-center">
      <?PHP if (!$tutor){
        echo '<div class="col-auto" ><!-- Virar tutor -->
        <form class="px-4 py-3" action="includes/become-tutor.inc.php" method="POST">
        <button type="submit" method="POST" name="become-tutor" class="btn btn-primary">Virar Tutor</button>
      </form>
      </div>';} else {
        echo '<div class="col-auto"><!-- remover status de Tutor -->
          <form class="px-4 py-3" action="includes/remove-tutor.inc.php" method="POST">
              <button type="submit" method="POST" name="remove-tutor" class="btn btn-primary">Remover Status Tutor</button>
          </form>
        </div>
        <div class="col-auto"><!-- Criar Aula -->
          <form class="px-4 py-3" action="criaraula.php" method="POST">
              <button type="submit" method="POST" name="create-offer" class="btn btn-primary">Criar Aula</button>
          </form>
        </div>';

      }
      ?>

      <div class="col-auto">
        <!-- alterar dados -->
        <!-- caso essa opção seja acionada o campo de Dados do Aluno deve ser habilitado saindo do inativo -->
        <form class="px-4 py-3" action="update.php" method="POST">
          <button type="submit" method="POST" name="create-offer" class="btn btn-primary">Alterar Dados</button>
        </form>
      </div>
    </div>
    <!-- inicio da div do formulario -->
    <div class="row" id="form-dados-do-aluno">
      <div class="col">
        <form class="my-3" action="" method="POST">
          <fieldset>
            <!-- no final de cada input vai conter disabled caso a opção alterar dadosfor acionada deve permitir que o usuario
            altere as informações desejadas  -->
            <label><b>Dados do Aluno</b></label>
            <div class="form-row">
              <div class="form-group col">
                <label for="input-nome">Nome</label>
                <?PHP
                      echo "<input type='text' class='form-control' id='input-nome' name='nome' placeholder=".$alu_nome." disabled>"
                      ?>
              </div>

              <div class="form-group col">
                <label for="input-curso">Curso</label>
                <?PHP
                      echo "<input type='text' class='form-control' id='input-curso' name='curso' value='".$alu_curso."' disabled>";
                      ?>

              </div>
            </div>

            <div class="form-row">

              <div class="form-group col">
                <label for="input-ra">RA</label>
                <?PHP
                      echo "<input type='int' class='form-control' id='input-ra' name='ra' placeholder=".$alu_ra." disabled>"
                      ?>
              </div>
              <div class="form-group col">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="input-celular">Celular</label>
                <?PHP
                      if(empty($alu_celular)){
                        echo "<input type='text' class='form-control' id='input-email' name='email' placeholder='Celular não informado' disabled>";
                      } else
                      echo "<input type='int' class='form-control' id='input-celular' name='celular' placeholder=".$alu_celular." disabled>";
                      ?>
              </div>

              <div class="form-group col">
                <label for="input-email">E-mail</label>
                <?PHP
                      if(empty($alu_email)){
                        echo "<input type='text' class='form-control' id='input-email' name='email' placeholder='E-mail não informado' disabled>";
                      } else {
                        echo "<input type='text' class='form-control' id='input-email' name='email' placeholder=".$alu_email." disabled>";
                      }
                      ?>
              </div>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
    <!-- fim da div do formulario -->

    
    <!-- inicio da div de aula do aluno -->
    <?PHP 
    $sql = "SELECT aluno.alu_nome, oferta_de_aula.ofertaul_nome, horario_oferta.hroferta_inicio, horario_oferta.hroferta_fim, horario_oferta.hroferta_local, horario_oferta.dia_da_semana_dia_semana, materia.mate_nome
    FROM aluno, tutor, oferta_de_aula, horario_oferta, aula, materia
    WHERE aula.alu_ra=aluno.alu_ra AND horario_oferta.oferta_de_aula_ofertaul_id=oferta_de_aula.ofertaul_id AND oferta_de_aula.ofertaul_id=aula.ofertaul_id AND tutor.tutor_ra=oferta_de_aula.tutor_ra 
    AND materia.mate_id=oferta_de_aula.mate_id AND aluno.alu_ra=?";
                    //Criação de uma declaração preparada
                    $stmt = mysqli_stmt_init($conn);
                    echo '<div class="h-auto py-3">
                    <h3>Minhas Aulas</h3>
                    <div class="card-deck">';
                    //Preparar a declaração
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                      echo "Declaração SQL falhou";
                    }
                    else {
                      
                      //Fixar parâmetro ao placeholder
                      mysqli_stmt_bind_param($stmt,"i", $alu_ra);
                      //Rodar parâmetros dentro do BD
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);
                      
                        if(mysqli_fetch_assoc($result)==NULL){
                          echo '
                          <!--
                          inicio de cada Card
                          adicionar apenas 3 Card por linha
                          -->
                          <div class="card">
                          
                          <div class="card-body">
                          <div class="card-title">
                          <h5 class="">'; echo "Sem aulas"; echo '</h5>
                          </div>
                          </div>
                          </div>'; 
                        } else {
                          while ($row = mysqli_fetch_assoc($result)){
                          $ofertaul_nome = $row['ofertaul_nome'];
                          $hroferta_inicio = $row['hroferta_inicio'];
                          $hroferta_fim = $row['hroferta_fim'];
                          $hroferta_local = $row['hroferta_local'];
                          $dia_da_semana_dia_semana = $row['dia_da_semana_dia_semana'];
                          $mate_nome = $row['mate_nome'];

                          echo '
                          <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">'; echo $mate_nome; echo'</h5>
                            <p class="card-text">Nome aula: '; echo $ofertaul_nome ;echo '</p>
                            <p class="card-text">Sala: '; echo $hroferta_local ;echo '</p>
                            <p class="card-text">Dia da semana: '; echo $dia_da_semana_dia_semana ;echo '</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">Tutor: </small>
                            <small class="text-muted">Roberto </small>
                          </div>
                        </div>';
                        }}
                      }
                        ?>
                            

      </div>

      <div class="card-deck my-3">
        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

      </div>
    </div>
    <!-- paginação aulas do aluno -->
    <nav >
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Anterior</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Próximo</a>
        </li>
      </ul>
    </nav>
    <!-- fim da div das aulas do aluno -->
<?PHP /*
    <!-- inicio das div do grupos do aluno -->
    <!-- precisa fazer uma função na qual busca quais as aulas do aluno e retorna em cada card desse os dados basico das Aulas
      -->
    <div class="h-auto py-3">
      <h3>Meus Grupos</h3>
      <div class="card-deck">

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger " data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Programação Desktop</h5>
            <p class="card-text">Arquivo de Texto</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>

      <div class="card-deck my-3">
        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

      </div>
    </div>

    <!-- paginação grupos de estudos -->
    <div class="">
      <nav >
        <ul class="pagination justify-content-center mb-0 p-2">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Anterior</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Próximo</a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- fim da div dos grupos do aluno -->
  </div>
    */?>
  </div>
</main>

<?php
require "footer.php";
?>
