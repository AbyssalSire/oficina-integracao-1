<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Criar Aula",$buffer);
            echo $buffer;
?>

<main>
  <div class="container bg-light vh-100 ">
    <div class="py-5">
      <div class="row justify-content-center">
        <div class="col-10">

          <div class="">
            <h3>Criar pedido de aula</h3>
          </div>

          <div class="">
            <form class="p-3 border" action="includes/create-request.inc.php" method="POST">

              <div class="form-row ">
                <div class="form-group col">
                  <label for="input-materia" name="">Matéria</label>
                  <select id="input-materia" name="mate_id" class="form-control">
                    <!-- adicionar as matérias existente do banco -->
                    <option value="NULL" selected>Escolher...</option>
                    <option value="1"> Inglês </option>
                    <option value="2"> Física 1 </option>
                    <option value="3"> Física 2 </option>
                    <option value="4"> Física 3 </option>
                    <option value="5">Física 4 </option>
                    <option value="6"> Matemática Discreta </option>
                    <option value="7"> Algoritmo de Programação </option>
                    <option value="8"> Fundamentos de Transporte </option>
                    <option value="9"> Banco de Dados 1 </option>
                    <option value="10"> Banco de Dados 2 </option>
                    <option value="11"> Programação Orientada a objetos </option>
                    <option value="12"> Cálculo 1 </option>
                    <option value="13"> Cálculo 2 </option>
                    <option value="14"> Cálculo 3 </option>
                    <option value="15"> Cálculo 4 </option>
                    <option value="16"> Geometria Analítica </option>
                    <option value="17"> Álgebra Linear </option>
                    <option value="18"> Cálculo Numérico </option>
                    <option value="18"> Sistemas Operacionais </option>
                    <option value="20"> Circuitos Elétricos </option>
                    <option value="21"> Probabilidade e Estatística </option>
                    <option value="22"> Mecânica dos Fluidos </option>
                    <option value="23"> Outros </option>
                  </select>
                </div>
              </div>

              <!-- dia da Semana -->
              <div class="border">
                <div class="form-row">

                  <div class="col-3 mx-3">
                    Dia da Semana
                  </div>

                  <div class="col-4">
                    Horário de Início
                  </div>

                  <div class="col p-0">
                    Horário de Término
                  </div>

                </div>

                <!-- div adicionar dia da semana  -->
                <div class="form-row  m-1  p-1 border">

                  <div class="form-group mt-2 col-3">
                    <select id="input-dia_semana" name="dia_semana" class="form-control">
                      <!-- adicionar dias da Semana -->
                      <option value="NULL" selected>Escolher...</option>
                      <option value="Segunda-feira">Segunda-feira</option>
                      <option value="Terça-feira">Terça-feira</option>
                      <option value="Quarta-feira">Quarta-feira</option>
                      <option value="Quinta-feira">Quinta-feira</option>
                      <option value="Sexta-feira">Sexta-feira</option>
                      <option value="Sabado">Sábado</option>
                      <option value="Domingo">Domingo</option>
                    </select>
                  </div>

                  <div class="form-group col ml-4">
                    <!-- coluna dos horarios o dia -->


                    <!-- div caso o usuario queria adicionar mais Horário ao dia -->
                    <div class="form-row align-items-center justify-content-between mt-2">
                      <!-- horario inicio -->
                      <div class="col-auto p-0">

                        <div class="input-group  ">
                          <input type="text" class="form-control" name="hrped_inicio" placeholder="14:45">
                        </div>

                      </div>
                      <div class="col-auto p-0">

                        <div class="input-group  ">
                          <input type="text" class="form-control" name="hrped_fim" placeholder="14:45">
                        </div>

                      </div>
                      <?PHP
/*
                          <!-- horario termino -->
                          <div class="col-auto">

                            <div class="input-group  " >
                              <input  type="text" class="form-control timepicker" >
                            </div>

                          </div>
*/ ?>
                      <!-- botão inserir mais horario -->
                      <div class="col-auto">
                        <a href="#">
                          <img src="img/icons/_ionicons_svg_ios-trash.svg" width="30" height="30" alt="">
                        </a>
                      </div>

                    </div>

                  </div>
                </div>
              </div>



              <div class="form-row mt-3">

                <div class="form-group col">
                  <label for="input-txt-nome">Nome da aula</label>
                  <input type="text" class="form-control" name="pedidaul_nome" placeholder="Insira o nome da aula">
                </div>

                <div class="form-group col">
                  <label for="input-local">Local</label>
                  <input type="text" class="form-control" name="hrped_local" placeholder="A140">
                </div>

              </div>

              <div class="form-row">

                <div class="form-group col">
                  <label for="input-txt-descricao">Descrição da Aulas</label>
                  <textarea class="form-control" name="pediaul_descricao" rows="3" placeholder="Insira o conteúdo de estudo da aula"></textarea>
                </div>

              </div>


              <button type="submit" name="create-offer" class="btn btn-primary">Criar</button>
              <button type="submit" name="cancel-creation" class="btn btn-primary">Cancelar</button> <!-- limpar os daodos -->

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
