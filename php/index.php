<?php
    ob_start();
    include("header.php");

            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Aluno Tutor",$buffer);
            echo $buffer;
?>

<main>

  

  <div class="container bg-light h-100 ">
    <div class="py-5 vh-100">

      <div class="row justify-content-center">
        <div class="col-10">


        <?PHP


        if(isset($_GET['signupsuccess']))
        {
        $Message = "Conta criada com sucesso!";
        echo $Message;
        }
        if(isset($_GET['join']))
        {
        $Message = "Está participando da aula!";
        echo $Message;
        }
        if(isset($_GET['createsuccess']))
        {
        $Message = "Pedido de aula Criado com Sucesso!";
        echo $Message;
        }
        if(isset($_GET['createoffersuccess']))
        {
        $Message = "Oferta de aula criada com Sucesso!";
        echo $Message;
        }
        if(isset($_GET['loginsuccess']))
        {
        $Message = "Logado com sucesso!";
        echo $Message;
        }
        if(isset($_GET['becometutorsuccess']))
        {
        $Message = "Tornou-se tutor";
        echo $Message;
        }
        if(isset($_GET['removetutorsuccess']))
        {
        $Message = "Deixou de ser tutor";
        echo $Message;
        }

        if(isset($_GET['emptyfields']))
        {
        $Message = "Campo vazio";
        echo $Message;
        }

        if(isset($_GET['sqlerror']))
        {
        $Message = "Erro de SQL!";
        echo $Message;
        }

        if(isset($_GET['wrongpassword']))
        {
        $Message = "Senha incorreta, Tente novamente";
        echo $Message;
        }

        if(isset($_GET['nouser']))
        {
        $Message = "Sem usuario";
        echo $Message;
        }

        if(!isset($_SESSION["userRA"])){
            echo "<p>Você não está logado</p>";
        } else {
            echo "<p>Você está logado</p>
            <div class='col-auto' ><!-- Criar pedido -->
                <form class='px-4 py-3' action='create-request.php' method='POST'>
                <button type='submit' method='POST' name='create-request' class='btn btn-primary'>Criar Pedido</button>
            </form>
            </div>
           ";
        }
        if(isset($_POST['criar']))
        {
        $Message = "Aula criada com sucesso!";
        echo $Message;
        }
        if(isset($_GET['cancelar']))
        {
        $Message = "Cancelou criação!";
        echo $Message;
        }

        ?>
        </div>
      </div>
    </div>
    <!-- paginação grupos de estudos -->
    <nav class="py-3">
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
</main>



<?php
    require "footer.php";
?>
