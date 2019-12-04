<!-- todas as matérias  -->
<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Pesquisa",$buffer);
            echo $buffer;
?>


<main>
  <div class="jumbotron jumbotron-fluid bg-azul-logo text-warning mb-0">
    <div class="container text-center">
      <h1 class="display-3 font-weight-bold">MATÉRIA</h1>
      <p class="lead font-weight-bold font-italic">Para ensinarmos um aluno a inventar
precisamos mostrar-lhe que ele já possui
a capacidade de descobrir.</p>
    </div>
  </div>
  <div class="container bg-light h-100 py-2">

    <div class="m-4">
      <h3 class="text-center font-weight-bold">Pesquisa</h3>
    </div>

    <!-- chama a opção de pesquisa -->
    <?php
        require 'pqs.php';
        require 'includes/dbh.inc.php';
      ?>
    <!-- inicio da div Resultado da Pesquisa -->
    <div class="m-4">

      <h3 class=" font-weight-bold">Resultado </h3>
      <!-- inicio de cada linha dos Card -->
      <div class="card-deck my-3">

        <!--
          inicio de cada Card
          adicionar apenas 3 Card por linha
          -->
        <div class="card">
          <?PHP
          $sql = "SELECT * FROM aluno NATURAL JOIN horario_oferta NATURAL JOIN oferta_de_aula NATURAL JOIN materia WHERE oferta_de_aula.mate_id=materia.mate_id AND mate_nome like ?;";
                    //Criação de uma declaração preparada
                    $stmt = mysqli_stmt_init($conn);

                    //Preparar a declaração
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                      echo "Declaração SQL falhou";
                    }
                    else {
                      //Fixar parâmetro ao placeholder
                        mysqli_stmt_bind_param($stmt, "s", $data);
                        //Rodar parâmetros dentro do BD
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)){

                        echo $row['tutor_ra']."<br>";
                        echo $row['ofertaul_descricao']."<br>";
                        echo $row['hroferta_inicio']."<br>";
                        echo $row['hroferta_fim']."<br>";
                        echo $row['hroferta_local']."<br>";
                        echo $row['dia_da_semana_dia_semana']."<br><br>";

                        echo '
                        <div class="card-body">
                        <div class="card-title">
                        <h5 class="">';echo $row['ofertaul_nome'];'</h5>
                        </div>
                        <div class="card-text">
                        <p class="">';echo $row['ofertaul_descricao'];'</p>
                        </div>
                        </div>

                        <div class="card-footer">

                        <div class="">
                        <small class="text-muted">Tutor: </small>
                        <small class="text-muted">Roberto </small>
                        </div>

                        <div class="">
                        <div class="">
                        <small class="text-muted">Data: </small>
                        <small class="text-muted">10/02/2019 </small>
                        </div>

                        <div class="">
                        <small class="text-muted">Hora: </small>
                        <small class="text-muted">10:30 </small>
                        <small class="text-muted">ÁS </small>
                        <small class="text-muted">11:30 </small>
                        </div>

                        </div>
                        </div>
                        ';
                      }
                  };
                        ?>
          <div class="row m-2 justify-content-end">
            <button type="button" class="btn bg-amarelo" name="button">Entrar</button>
          </div>

        </div>
        <!-- fim de cada Card -->


        <div class="card">

          <div class="card-body">
            <div class="card-title">
              <h5 class="">Física</h5>
            </div>
            <div class="card-text">
              <p class="">física mecânica e física elétrica</p>
            </div>
          </div>

          <div class="card-footer">

            <div class="">
              <small class="text-muted">Tutor: </small>
              <small class="text-muted">Roberto </small>
            </div>

            <div class="">
              <div class="">
                <small class="text-muted">Data: </small>
                <small class="text-muted">10/02/2019 </small>
              </div>

              <div class="">
                <small class="text-muted">Hora: </small>
                <small class="text-muted">10:30 </small>
                <small class="text-muted">ÁS </small>
                <small class="text-muted">11:30 </small>
              </div>

            </div>
          </div>

          <div class="row m-2 justify-content-end">
            <button type="button" class="btn bg-amarelo" name="button">Entrar</button>
          </div>

        </div>


        <div class="card">

          <div class="card-body">
            <div class="card-title">
              <h5 class="">Física</h5>
            </div>
            <div class="card-text">
              <p class="">física mecânica e física elétrica</p>
            </div>
          </div>

          <div class="card-footer">

            <div class="">
              <small class="text-muted">Tutor: </small>
              <small class="text-muted">Roberto </small>
            </div>

            <div class="">
              <div class="">
                <small class="text-muted">Data: </small>
                <small class="text-muted">10/02/2019 </small>
              </div>

              <div class="">
                <small class="text-muted">Hora: </small>
                <small class="text-muted">10:30 </small>
                <small class="text-muted">ÁS </small>
                <small class="text-muted">11:30 </small>
              </div>

            </div>
          </div>

          <div class="row m-2 justify-content-end">
            <button type="button" class="btn bg-amarelo" name="button">Entrar</button>
          </div>

        </div>



      </div>
      <!-- fim de cada linha dos Card -->


      <div class="card-deck my-3">

        <!--
          inicio de cada Card
          adicionar apenas 3 Card por linha
          -->
        <div class="card">

          <div class="card-body">
            <div class="card-title">
              <h5 class="">Física</h5>
            </div>
            <div class="card-text">
              <p class="">física mecânica e física elétrica</p>
            </div>
          </div>

          <div class="card-footer">

            <div class="">
              <small class="text-muted">Tutor: </small>
              <small class="text-muted">Roberto </small>
            </div>

            <div class="">
              <div class="">
                <small class="text-muted">Data: </small>
                <small class="text-muted">10/02/2019 </small>
              </div>

              <div class="">
                <small class="text-muted">Hora: </small>
                <small class="text-muted">10:30 </small>
                <small class="text-muted">ÁS </small>
                <small class="text-muted">11:30 </small>
              </div>

            </div>
          </div>

          <div class="row m-2 justify-content-end">
            <button type="button" class="btn bg-amarelo" name="button">Entrar</button>
          </div>

        </div>
        <!-- fim de cada Card -->


        <div class="card">

          <div class="card-body">
            <div class="card-title">
              <h5 class="">Física</h5>
            </div>
            <div class="card-text">
              <p class="">física mecânica e física elétrica</p>
            </div>
          </div>

          <div class="card-footer">

            <div class="">
              <small class="text-muted">Tutor: </small>
              <small class="text-muted">Roberto </small>
            </div>

            <div class="">
              <div class="">
                <small class="text-muted">Data: </small>
                <small class="text-muted">10/02/2019 </small>
              </div>

              <div class="">
                <small class="text-muted">Hora: </small>
                <small class="text-muted">10:30 </small>
                <small class="text-muted">ÁS </small>
                <small class="text-muted">11:30 </small>
              </div>

            </div>
          </div>

          <div class="row m-2 justify-content-end">
            <button type="button" class="btn bg-amarelo" name="button">Entrar</button>
          </div>

        </div>


        <div class="card">

          <div class="card-body">
            <div class="card-title">
              <h5 class="">Física</h5>
            </div>
            <div class="card-text">
              <p class="">física mecânica e física elétrica</p>
            </div>
          </div>

          <div class="card-footer">

            <div class="">
              <small class="text-muted">Tutor: </small>
              <small class="text-muted">Roberto </small>
            </div>

            <div class="">
              <div class="">
                <small class="text-muted">Data: </small>
                <small class="text-muted">10/02/2019 </small>
              </div>

              <div class="">
                <small class="text-muted">Hora: </small>
                <small class="text-muted">10:30 </small>
                <small class="text-muted">ÁS </small>
                <small class="text-muted">11:30 </small>
              </div>

            </div>
          </div>

          <div class="row m-2 justify-content-end">
            <button type="button" class="btn bg-amarelo" name="button">Entrar</button>
          </div>

        </div>

      </div>
    </div>
    <!-- fim da div das aulas do aluno -->

  </div>

  <!-- paginação
    progamar para que apareça quando for feito a pesquisa e estoura o limite
    -->
  <div class="container  bg-light ">
    <div class="row justify-content-center ">
      <nav aria-label="">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Anterior</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(atual)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Próximo</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

</main>


<?php
    require "footer.php";
?>
