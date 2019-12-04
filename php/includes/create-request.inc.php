<?php     

if(isset($_POST['cancel-creation'])){
    header("Location: ../index.php?creation-canceled");
    exit();}
    if(isset($_POST['create-offer'])){
        require 'dbh.inc.php'; 
        session_start();
        $alu_ra =  $_SESSION["userRA"];
        $pedidaul_nome = mysqli_real_escape_string($conn, $_POST['pedidaul_nome']);
        $pediaul_descricao = mysqli_real_escape_string($conn, $_POST['pediaul_descricao']);
        $mate_id =  mysqli_real_escape_string($conn, $_POST['mate_id']);
        $dia_semana = mysqli_real_escape_string($conn, $_POST['dia_semana']);
        $hrped_inicio = mysqli_real_escape_string($conn, $_POST['hrped_inicio']);
        $hrped_fim = mysqli_real_escape_string($conn, $_POST['hrped_fim']);
        $hrped_local = mysqli_real_escape_string($conn, $_POST['hrped_local']);


        if(empty($alu_ra)||empty($pediaul_descricao)||empty($mate_id)){
            header("Location: ../signup.php?error=emptyfields");
            exit();
    } else {
            $sql = "INSERT INTO `pedido_de_aula` (`pediaul_id`, `pedidaul_nome`, `pediaul_descricao`, `alu_ra`, `mate_id`) 
            VALUES (NULL, ?,?,?,?);;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "SQL 1 falhou";
            }else { 
                mysqli_stmt_bind_param($stmt, "ssii", $pedidaul_nome, $pediaul_descricao, $alu_ra, $mate_id);
                mysqli_stmt_execute($stmt);
            }


            $queryBusca = "SELECT MAX(pediaul_id) as pediaul_id
            FROM pedido_de_aula;";

            $result = mysqli_query($conn, $queryBusca);

            while ($row = mysqli_fetch_assoc($result)) {
                $pediaul_id = $row["pediaul_id"];
                echo $pediaul_id;
            }
            


                $sql2 = "INSERT INTO `horario_pedido` (`hrped_inicio`, `hrped_fim`, `hrped_local`, `dia_da_semana_dia_semana`, `pedido_de_aula_pediaul_id`)
                 VALUES (?,?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql2)){
                    echo "SQL 2 falhou";
                } else { 
                    mysqli_stmt_bind_param($stmt, "ssssi", $hrped_inicio, $hrped_fim, $hrped_local, $dia_semana, $pediaul_id);
                    mysqli_stmt_execute($stmt);
                }

                header("Location: ../index.php?createsuccess");


        }} else {


        header("Location: ../profile.php?createfail");
        exit();
    }