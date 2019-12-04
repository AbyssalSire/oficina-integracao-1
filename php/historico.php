<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Históricos",$buffer);
            echo $buffer;
?>

<main>
  <div class="container bg-light vh-auto py-2">

    <div class="m-4">
      <h3 class="text-center font-weight-bold">Histórico</h3>
    </div>

    <!-- chama a opção de pesquisa -->
    <?php
        require 'pqs.php';
      ?>

    <!-- inicio da div de aula do aluno -->
    <div class="h-auto m-2 py-5">
      <h3></h3>
      <div class="card-deck">

        <div class="card">
          <div class="">
            <button type="button" class="close bg-danger " data-dismiss="modal">&times;</button>
          </div>
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
    <!-- fim da div das aulas do aluno -->

    <!-- precisa fazer uma função na qual busca quais as aulas do aluno e retorna em cada card desse os dados basico das Aulas
      -->
    <!-- paginação grupos de estudos -->
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

  </div>
</main>

<?php
    require "footer.php";
?>
