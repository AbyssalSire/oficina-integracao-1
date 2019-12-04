<?php
   session_start();
?>

<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Import  CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap  CSS -->
  <link rel="stylesheet" href="css/style.css"> <!-- Aluno Tutor  CSS -->
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css"> <!-- datepicker  CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

  <link rel="icon" href="img/loh.png">
  <!-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->

  <title>>%TITLE%</title>
</head>

<body>
  <header class="container-fluid bg-azul-logo ">
    <div class="row align-items-center">
      <!-- div imagem -->
      <div class="col-auto">
        <div class="h-25">
          <a class="h-1" href="index.php">
            <img src="img/loh1.png" style="width:150px"> </a>
        </div>
      </div>
      <!-- fim div imagem -->

      <!-- div menu e pesquisa -->
      <div class="col ">
        <div class="row ">
          <!-- div menu de opções -->
          <div class="col-auto mr-auto">
            <div class="navbar-light show">
              <button class="btn  navbar-toggler" type="button" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="dropdown-menu" id="dropdown-menu">
                <button class="dropdown-item" type="button" onClick="location.href='index.php'">Inicio</button>
                <button class="dropdown-item" type="button" onClick="location.href='materia.php'">Pedidos</button>
                <button class="dropdown-item" type="button" onClick="location.href='tutores.php'">Tutores</button>
                <button class="dropdown-item" type="button" onClick="location.href='grupos.php'">Grupos</button>
                <!-- <a class="dropdown-item" href="#">texto de apoio</a> pode ser com link -->
              </div>
            </div>
            <!-- fim div menu de opções -->
          </div>

          <!-- div barra de pesquisa -->
          <div class="col-6">
            <div class="">
              <form class="input-group m-0" action="search.php" method="POST">
                <div class="input-group w-25 ">
                  <select name = "tipo" class="custom-select" id="inputGroupSelect_Pesquisar">
                    <option value = "geral" selected>Escolher</option>
                    <option value="pedido">Pedidos</option>
                    <option value="tutor">Tutor</option>
                    <option value="grupo">Grupo</option>
                    <option value="aula">Aula</option>
                  </select>
                </div>
                <input type="text" class="form-control" placeholder="O que procura?" name="data">                
                <button type="submit" name="signup-submit" class="input-group-append bg-amarelo p-1 rounded"><input type="image" src="img/icons/_ionicons_svg_ios-search.svg" width="25" height="25" ></button>

              </form>
            </div>

          </div>

        </div>
        <!-- fim div barra pesquisa -->
      </div>

      <div class="col-auto ml-auto">
        <div class="dropdown ">
          <?php
              if(isset($_SESSION["userRA"])) {echo '
                <button class="btn bg-amarelo dropdown-toggle" type="button" id="dropdown-login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Conta
                </button>
                <div class="bg-azul-logo  dropdown-menu aria-labelledby="dropdown-login>
                  <form class="px-4 py-3" action="profile.php" method="POST">
                    <button type="submit" method="POST" name="account-view" class="btn btn-primary">Conta</button>
                  </form>

                  <form class="px-4 py-3" action="includes/logout.inc.php" method="POST">
                    <button type="submit" method="POST" name="logout-submit" class="btn btn-primary">Sair</button>
                  </form>';
              }
              else {echo '
                <button class="btn bg-amarelo dropdown-toggle" type="button" id="dropdown-login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </button>
                <div class="bg-azul-logo  dropdown-menu aria-labelledby="dropdown-login>
                  <form class="px-4 py-3" action="includes/login.inc.php" method="POST">
                    <div class="form-group">
                      <label for="dropdown-RA">RA</label>
                      <input type="text" class="form-control" name ="ra" id="dropdown-ra" placeholder="1234567">
                    </div>
                    <div class="form-group">
                      <label for="drop-senha">Senha</label>
                      <input type="password" class="form-control" name="senha" id="dropdown-senha" placeholder="Senha">
                    </div>

                      <button type="submit" method="POST" name="login-submit" class="btn btn-primary">Entrar</button>
                  </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="signup.php">Registrar</a>';
              }
            ?>

            </div>
          </div>

        </div>
      </div>
    </div>

  </header>
  <!-- restante da pagina -->
