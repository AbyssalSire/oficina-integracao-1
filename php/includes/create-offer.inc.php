<?php     

if(isset($_POST['cancel-creation'])){
    header("Location: ../profile.php?creation-canceled");
    exit();
} else if(isset($_POST['create-offer'])){
        require 'dbh.inc.php'; 
        session_start();
        $tutor_ra =  $_SESSION["userRA"];
        $ofertaul_nome = mysqli_real_escape_string($conn, $_POST['ofertaul_nome']);
        $ofertaul_descricao =  mysqli_real_escape_string($conn, $_POST['ofertaul_descricao']);
        $mate_id = mysqli_real_escape_string($conn, $_POST['mate_id']);
        $dia_semana = mysqli_real_escape_string($conn, $_POST['dia_semana']);
        $hroferta_inicio = mysqli_real_escape_string($conn, $_POST['hroferta_inicio']);
        $hroferta_fim = mysqli_real_escape_string($conn, $_POST['hroferta_fim']);
        $hroferta_local = mysqli_real_escape_string($conn, $_POST['hroferta_local']);


        if(empty($tutor_ra)||empty($ofertaul_nome)||empty($mate_id)){
                header("Location: ../signup.php?error=emptyfields");
                exit();
        } else {
                $sql1 = "INSERT INTO oferta_de_aula (tutor_ra, ofertaul_nome, ofertaul_descricao, mate_id)
                VALUES (?, ?, ?, ?);";
                $stmt1 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt1, $sql1)){
                    echo "SQL 1 falhou";
                } else { 
                    mysqli_stmt_bind_param($stmt1, "issi", $tutor_ra, $ofertaul_nome, $ofertaul_descricao, $mate_id);
                    mysqli_stmt_execute($stmt1);
                }

                
                $queryBusca = "SELECT MAX(ofertaul_id) as ofertaul_id
                FROM oferta_de_aula;";

                $result = mysqli_query($conn, $queryBusca);

                while ($row = mysqli_fetch_assoc($result)) {
                    $ofertaul_id = $row["ofertaul_id"];
                    echo $ofertaul_id;
                }
                
                
                
                
                $sql2 = "INSERT INTO `horario_oferta` (`hroferta_inicio`, `hroferta_fim`, `hroferta_local`, `dia_da_semana_dia_semana`, `oferta_de_aula_ofertaul_id`) 
                VALUES (?, ?, ?, ?, ?);";
                
                $stmt2 = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt2, $sql2)){
                    print "FALHA ";
                    echo "SQL 2 falhou";
                } else { 
                    mysqli_stmt_bind_param($stmt2, "sssss", $hroferta_inicio, $hroferta_fim, $hroferta_local, $dia_semana, $ofertaul_id);
                    mysqli_stmt_execute($stmt2);

                }


        }
                header("Location: ../index.php?createoffersuccess");
                

                } else {
                        header("Location: ../profile.php?createfail");
                        exit();
                    }