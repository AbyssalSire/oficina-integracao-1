<?php     


    if(isset($_POST['become-tutor'])){
        require 'dbh.inc.php'; 
        session_start();
        $alu_ra =  $_SESSION["userRA"];

        $sql = "INSERT INTO tutor (tutor_ra)
        VALUES (?);";

        $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../index.php?sql=failed");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "i", $alu_ra);
                    mysqli_stmt_execute($stmt);
                }
                header("Location: ../profile.php?becometutorsuccess");
                exit();


    } else {
        header("Location: ../index.php?update=error");
        exit();
    }