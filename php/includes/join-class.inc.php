<?php     


    if(isset($_POST['join-class'])){
        require 'dbh.inc.php'; 
        session_start();
        $alu_ra =  $_SESSION["userRA"];
        $ofertaul_id = $_POST['ofertaul_id'];
        var_dump($ofertaul_id);

        $sql = "INSERT INTO `aula` (`ofertaul_id`, `alu_ra`) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?sql=failed");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ii", $ofertaul_id, $alu_ra);
            mysqli_stmt_execute($stmt);
        }
        header("Location: ../profile.php?joinsuccess");
        exit();






    } else {
        echo "erro";
    }