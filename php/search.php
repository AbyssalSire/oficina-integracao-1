<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Pesquisa",$buffer);
            echo $buffer;
            require 'includes/dbh.inc.php';
            $alu_ra =  $_SESSION["userRA"];
            var_dump($alu_ra);
?>


<main>
  <div class="container bg-light h-100 py-2">
  <div class="m-4">

  <h2 class=" font-weight-bold">Resultados</h2>
<!-- inicio de cada linha dos Card -->
  <div class="card-deck my-3">

    <!-- chama a opção de pesquisa -->
    <?php
        $data= mysqli_real_escape_string($conn, $_POST['data']);
        if(empty($data)){
          $data="%";
        } else {
          $data=$data."%";
        }
        
        $tipo= mysqli_real_escape_string($conn, $_POST['tipo']);

    switch ($tipo)
    {
        case "geral":
        $sql = "SELECT * FROM materia WHERE mate_nome like ?;";
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
            $mate_nome = $row['mate_nome'];

            
        }
        $sql = "SELECT aluno.alu_nome, aluno.alu_ra, aluno.alu_celular, aluno.alu_email FROM tutor, aluno WHERE tutor.tutor_ra=aluno.alu_ra AND (alu_nome like ? OR tutor.tutor_ra=?);";
        //Criação de uma declaração preparada
        $stmt = mysqli_stmt_init($conn);

            //Preparar a declaração
            if(!mysqli_stmt_prepare($stmt, $sql)){
              echo "Declaração SQL falhou";
          }
              else {
                //Fixar parâmetro ao placeholder
                mysqli_stmt_bind_param($stmt, "si", $data, $data);
                //Rodar parâmetros dentro do BD
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)){
                $tutor_nome = $row['alu_nome'];
                $tutor_ra = $row['alu_ra'];
                $tutor_celular = $row['alu_celular'];
                $tutor_email = $row['alu_email'];
                echo '
                        
                <div class="card">
                
                <div class="card-body">
                <div class="card-title">
                <h5 class="">';echo $tutor_nome; echo '</h5>
                </div>
                </div>
                <div class="">
                            <small class="text-muted">R.A.: </small>
                            <small class="text-muted">'; echo $tutor_ra; echo'</small>
                          </div>
                <div class="">
                            <small class="text-muted">Celular: </small>
                            <small class="text-muted">'; echo $tutor_celular; echo'</small>
                          </div>
                <div class="">
                            <small class="text-muted">Email: </small>
                            <small class="text-muted">'; echo $tutor_email; echo'</small>
                          </div>
                      
                      
                      </div>';
                }
            
                $sql = "SELECT materia.mate_nome, oferta_de_aula.ofertaul_id, aluno.alu_nome, oferta_de_aula.ofertaul_descricao, horario_oferta.hroferta_inicio, horario_oferta.hroferta_fim, 
                horario_oferta.hroferta_local, horario_oferta.dia_da_semana_dia_semana, oferta_de_aula.ofertaul_nome,tutor.tutor_ra 
                FROM aluno, tutor, horario_oferta, oferta_de_aula, materia, aula 
                where oferta_de_aula.ofertaul_id=horario_oferta.oferta_de_aula_ofertaul_id and not oferta_de_aula.ofertaul_id = any(select aula.ofertaul_id from aula) 
                and not tutor.tutor_ra = ? and tutor.tutor_ra=oferta_de_aula.tutor_ra and oferta_de_aula.mate_id=materia.mate_id and tutor.tutor_ra=aluno.alu_ra and materia.mate_nome like ?";
            //Criação de uma declaração preparada
            $stmt = mysqli_stmt_init($conn);

            //Preparar a declaração
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "Declaração SQL falhou";
            }
            else {
              
                //Fixar parâmetro ao placeholder
                mysqli_stmt_bind_param($stmt, "is", $alu_ra, $data);
                        //Rodar parâmetros dentro do BD
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(empty(mysqli_fetch_assoc($result))){
                          echo '
                          <!--
                          inicio de cada Card
                          adicionar apenas 3 Card por linha
                          -->
                          <div class="card">
                          
                          <div class="card-body">
                          <div class="card-title">
                          <h5 class="">'; echo "Sem ofertas"; echo '</h5>
                          </div>
                          </div>
                          </div>'; 
                        }else{
                          while ($row = mysqli_fetch_assoc($result)){
                        $ofertaul_nome = $row['ofertaul_nome'];
                        $mate_nome = $row['mate_nome'];
                        $tutor_nome = $row['alu_nome'];
                        $ofertaul_id = $row['ofertaul_id'];
                        $ofertaul_descricao = $row['ofertaul_descricao'];
                        $hroferta_inicio = $row['hroferta_inicio'];
                        $hroferta_fim = $row['hroferta_fim'];
                        $hroferta_local = $row['hroferta_local'];
                        $dia_da_semana_dia_semana = $row['dia_da_semana_dia_semana'];                        
                        echo '                        
                        <div class="card">                        
                        <div class="card-body">
                        <div class="card-title">
                        <h5 class="">'; echo $mate_nome; echo '</h5>
                        </div>
                                <div class="card-text">
                                <p class="">'; echo $ofertaul_descricao; echo '</p>
                                </div>
                                <div class="card-text">
                                <p class="">'; echo $ofertaul_descricao; echo '</p>
                                </div>
                              </div>
                              <div class="card-footer">
                              
                              <div class="">
                              <small class="text-muted">Tutor: </small>
                                  <small class="text-muted">'; echo $tutor_nome; echo'</small>
                                  </div>
                                  
                                  <div class="">
                                  <div class="">
                                  <small class="text-muted">Data: </small>
                                    <small class="text-muted">'; echo $dia_da_semana_dia_semana; echo'</small>
                                  </div>
                                  
                                  <div class="">
                                    <small class="text-muted">Hora: </small>
                                    <small class="text-muted">';echo $hroferta_inicio; echo '</small>
                                    <small class="text-muted"> até </small>
                                    <small class="text-muted">'; echo $hroferta_fim; echo '</small>
                                  </div>
                                  
                                  </div>
                              </div>
                              
                              <div class="row m-2 justify-content-end">
                                <form action="includes/join-class.inc.php" method="POST">
                                <input type="hidden" name=ofertaul_id value="';echo $ofertaul_id;echo'">
                                <button type="submit" class="btn bg-amarelo" name="join-class">Entrar</button>
                                </form>
                                </div>
                                
                                </div>';
                                
                        }
                            }}}
                          }
            break;
            case "materia":
          //Criação de template para busca de pedido
          $sql = "SELECT * FROM materia WHERE mate_nome like ?;";
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
            $mate_nome = $row['mate_nome'];
            }
        }
       break;
    case "tutor":
          //Criação de template para busca de nome
          $sql = "SELECT aluno.alu_nome, aluno.alu_ra, aluno.alu_celular, aluno.alu_email FROM tutor, aluno WHERE tutor.tutor_ra=aluno.alu_ra AND (alu_nome like ? OR tutor.tutor_ra=?);";
          //Criação de uma declaração preparada
          $stmt = mysqli_stmt_init($conn);
  
              //Preparar a declaração
              if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "Declaração SQL falhou";
            }
                else {
                  //Fixar parâmetro ao placeholder
                  mysqli_stmt_bind_param($stmt, "si", $data, $data);
                //Rodar parâmetros dentro do BD
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)){
                $tutor_nome = $row['alu_nome'];
                $tutor_ra = $row['alu_ra'];
                $tutor_celular = $row['alu_celular'];
                $tutor_email = $row['alu_email'];
                echo '
                        
                <div class="card">
                
                <div class="card-body">
                <div class="card-title">
                <h5 class="">'; echo $tutor_nome; echo '</h5>
                </div>
                </div>
                <div class="">
                            <small class="text-muted">R.A.: </small>
                            <small class="text-muted">'; echo $tutor_ra; echo'</small>
                          </div>
                <div class="">
                            <small class="text-muted">Celular: </small>
                            <small class="text-muted">'; echo $tutor_celular; echo'</small>
                          </div>
                <div class="">
                            <small class="text-muted">Email: </small>
                            <small class="text-muted">'; echo $tutor_email; echo'</small>
                          </div>
                      
                      
                      </div>';
                }
            }
        break;
    case "grupo":
                //Criação de template para busca de nome
                $sql = "SELECT * FROM grupo, materia WHERE grupo.mate_id=materia.mate_id AND mate_nome like ?;";
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
                    $mate_nome = $row['mate_nome'];
                    }
                }
        break;
    case "aula":
                        $sql = "SELECT materia.mate_nome, oferta_de_aula.ofertaul_id, aluno.alu_nome, oferta_de_aula.ofertaul_descricao, horario_oferta.hroferta_inicio, horario_oferta.hroferta_fim, 
                        horario_oferta.hroferta_local, horario_oferta.dia_da_semana_dia_semana, oferta_de_aula.ofertaul_nome,tutor.tutor_ra 
                        FROM aluno, tutor, horario_oferta, oferta_de_aula, materia, aula 
                        where oferta_de_aula.ofertaul_id=horario_oferta.oferta_de_aula_ofertaul_id and not oferta_de_aula.ofertaul_id = any(select aula.ofertaul_id from aula) 
                        and not tutor.tutor_ra = ? and tutor.tutor_ra=oferta_de_aula.tutor_ra and oferta_de_aula.mate_id=materia.mate_id and tutor.tutor_ra=aluno.alu_ra and materia.mate_nome like ?";
                    //Criação de uma declaração preparada
                    $stmt = mysqli_stmt_init($conn);

                    //Preparar a declaração
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "Declaração SQL falhou";
                    }
                    else {
                      
                        //Fixar parâmetro ao placeholder
                        mysqli_stmt_bind_param($stmt, "is", $alu_ra, $data);
                        //Rodar parâmetros dentro do BD
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if(empty(mysqli_fetch_assoc($result))){
                          echo '
                          <!--
                          inicio de cada Card
                          adicionar apenas 3 Card por linha
                          -->
                          <div class="card">
                          
                          <div class="card-body">
                          <div class="card-title">
                          <h5 class="">'; echo "Sem ofertas"; echo '</h5>
                          </div>
                          </div>
                          </div>'; 
                        }else{
                          while ($row = mysqli_fetch_assoc($result)){
                        $ofertaul_nome = $row['ofertaul_nome'];
                        $mate_nome = $row['mate_nome'];
                        $tutor_nome = $row['alu_nome'];
                        $ofertaul_id = $row['ofertaul_id'];
                        $ofertaul_descricao = $row['ofertaul_descricao'];
                        $hroferta_inicio = $row['hroferta_inicio'];
                        $hroferta_fim = $row['hroferta_fim'];
                        $hroferta_local = $row['hroferta_local'];
                        $dia_da_semana_dia_semana = $row['dia_da_semana_dia_semana'];                        
                        echo '                        
                        <div class="card">                        
                        <div class="card-body">
                        <div class="card-title">
                        <h5 class="">'; echo $mate_nome; echo '</h5>
                        </div>
                                <div class="card-text">
                                <p class="">'; echo $ofertaul_descricao; echo '</p>
                                </div>
                                <div class="card-text">
                                <p class="">'; echo $ofertaul_descricao; echo '</p>
                                </div>
                              </div>
                              <div class="card-footer">
                              
                              <div class="">
                              <small class="text-muted">Tutor: </small>
                                  <small class="text-muted">'; echo $tutor_nome; echo'</small>
                                  </div>
                                  
                                  <div class="">
                                  <div class="">
                                  <small class="text-muted">Data: </small>
                                    <small class="text-muted">'; echo $dia_da_semana_dia_semana; echo'</small>
                                  </div>
                                  
                                  <div class="">
                                    <small class="text-muted">Hora: </small>
                                    <small class="text-muted">';echo $hroferta_inicio; echo '</small>
                                    <small class="text-muted"> até </small>
                                    <small class="text-muted">'; echo $hroferta_fim; echo '</small>
                                  </div>
                                  
                                  </div>
                              </div>
                              
                              <div class="row m-2 justify-content-end">
                                <form action="includes/join-class.inc.php" method="POST">
                                <input type="hidden" name=ofertaul_id value="';echo $ofertaul_id;echo'">
                                <button type="submit" class="btn bg-amarelo" name="join-class">Entrar</button>
                                </form>
                                </div>
                                
                                </div>';    
                        
                        }
                    }}

        break;
            }


        
      ?>


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
