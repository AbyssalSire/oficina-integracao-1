<?php     


    if(isset($_POST['create-group'])){
        require 'dbh.inc.php'; 
        session_start();
        $alu_ra =  $_SESSION["userRA"];
        $gp_id = mysqli_real_escape_string($conn, $_POST['gp_id']);
        $gp_nome =  mysqli_real_escape_string($conn, $_POST['gp_nome']);
        $gp_descricao = mysqli_real_escape_string($conn, $_POST['gp_descricao']);
        $mate_id = mysqli_real_escape_string($conn, $_POST['mate_id']);


        if(empty($alu_ra)||empty($gp_nome)||empty($mate_id)||empty($gp_descricao)){
            header("Location: ../signup.php?error=emptyfields");
            exit();
    } else {
            $sql1 = "INSERT INTO grupo (gp_id, gp_nome, gp_descricao, mate_id) VALUES 
            (NULL, ?, ?, ?);";
            $stmt1 = mysqli_stmt_init($conn);
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql1)){
                echo "SQL 1 falhou";
            }else { 
                mysqli_stmt_bind_param($stmt1, "ssi", $gp_nome, $gp_descricao, $mate_id);
                mysqli_stmt_execute($stmt1);
            }


            $queryBusca = "SELECT 
            gp_id, 
            MAX(gp_id) AS most_recent_signin
            FROM grupo;";
            $gp_id = mysqli_query($conn, $queryBusca);
            

                $sql2 = "INSERT INTO grupo_de_estudos (gp_id, alu_ra)
                SELECT gp_id, alu_ra
                FROM pedido_de_aula, aluno
                WHERE gp_id = ? and alu_ra=?;";
                $stmt2 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt2, $sql2)){
                    echo "SQL 2 falhou";
                } else { 
                    mysqli_stmt_bind_param($stmt2, "ii", $gp_id, $alu_ra);
                    mysqli_stmt_execute($stmt2);
                }

                /*

                $sql3 = "INSERT INTO horario_grupo_de_estudos (hr_gp_estudos_inicio, hr_gp_estudos_fim, hr_gp_estudos_local, dia_da_semana_dia_semana, grupo_gp_id) 
                VALUES (?, ?, ?, ?, ?);";
                $stmt3 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt3, $sql3)){
                    echo "SQL 3 falhou";
                } else { 
                    mysqli_stmt_bind_param($stmt3, "iissi", $hr_gp_estudos_inicio, $hr_gp_estudos_fim, $hr_gp_estudos_local, $dia_da_semana_dia_semana, $grupo_gp_id);
                    mysqli_stmt_execute($stmt3);
                }
                */

                header("Location: ../profile.php?createrequestsuccess");


        }} else {


        header("Location: ../profile.php?createfail");
        exit();
    }