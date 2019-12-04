<?php     


    if(isset($_POST['create-offer'])){
        require 'dbh.inc.php'; 
        session_start();
        $tutor_ra =  $_SESSION["userRA"];
        $ofertaul_id = mysqli_real_escape_string($conn, $_POST['ofertaul_id']);

        $sql1 = "INSERT INTO aula (alu_ra, ofertaul_id)
                VALUES (?, ?);";
                $stmt1 = mysqli_stmt_init($conn);
                
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql1)){
                    echo "SQL falhou";
                } else { 
                    mysqli_stmt_bind_param($stmt1, "ii", $alu_ra, $ofertaul_id);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);
                    $row1 = mysqli_fetch_assoc($result1);

                    header("Location: ../profile.php?createclasssuccess");
                }







    } else {
        header("Location: ../profile.php?createfail");
        exit();
    }