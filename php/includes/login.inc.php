<?php 

    if(isset($_POST['login-submit'])){

        require 'dbh.inc.php'; 

        $alu_ra =  mysqli_real_escape_string($conn, $_POST['ra']);
        $alu_senha =  mysqli_real_escape_string($conn, $_POST['senha']);
        
        if(empty($alu_ra)||empty($alu_senha)){
            header("Location: ../index.php?emptyfields");
            exit();
        }
        else {
            $sql="SELECT * FROM aluno WHERE alu_ra=? AND alu_senha=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?sqlerror");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "is", $alu_ra, md5($alu_senha));
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                    
                    if($row == NULL){
                        header("Location: ../index.php?wrongpassword");
                        exit();
                    } else {
                        session_start();
                        $_SESSION["userRA"] = intval($_POST['ra']);
                        $_SESSION["userName"] = $row["alu_nome"];
                        header("Location: ../index.php?loginsuccess");
                        exit();
                    }
                    
                
            }
        }

    } else {
        header("Location: ../index.php?nouser");
        exit();
    }