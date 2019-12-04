<?php 

    if(isset($_POST['signup-submit'])){

        require 'dbh.inc.php'; 
    
        $alu_ra = mysqli_real_escape_string($conn, $_POST['ra']);
        $alu_nome = mysqli_real_escape_string($conn,$_POST['nome']);
        $alu_senha = mysqli_real_escape_string($conn,$_POST['senha']);
        $alu_senhaConfirma = mysqli_real_escape_string($conn, $_POST['senha-confirma']);
        $alu_curso = mysqli_real_escape_string($conn,$_POST['alu_curso']);
        

    
        $sql_u = "SELECT * FROM aluno WHERE alu_ra='$alu_ra'";
        $res_u = mysqli_query($conn, $sql_u);
  
        if (mysqli_num_rows($res_u) > 0) {
            header("Location: ../signup.php?error=RAalreadyExists&nome=".$alu_nome);
            exit();
        }
        
        if(empty($alu_ra)||empty($alu_nome)||empty($alu_senha)||empty($alu_senhaConfirma)){
            header("Location: ../signup.php?error=emptyfields&ra=".$alu_ra."&nome=".$alu_nome);
            exit();
        } else if($alu_senha!=$alu_senhaConfirma){
            header("Location: ../signup.php?error=passwordcheck&ra=".$alu_ra."&nome=".$alu_nome);
            exit();
        }else if(strlen((string)$alu_ra)!=7){
            header("Location: ../signup.php?error=invalidRA&ra=".$alu_ra."&nome=".$alu_nome);
            exit();
        }else if(!preg_match("/^[a-zA-Z0-9]*$/", $alu_nome)){
            header("Location: ../signup.php?error=invalidname=".$alu_ra);
            exit();
        } else{

                
                $sql = "insert into aluno (alu_ra, alu_nome, alu_senha, alu_curso)
                values (?, ?, ?, ?);";
                
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "SQL falhou";
                } else {
                    mysqli_stmt_bind_param($stmt, "isss", $alu_ra, $alu_nome, md5($alu_senha), $alu_curso);
                    mysqli_stmt_execute($stmt);
                }
                
                header("Location: ../index.php?signupsuccess");
                
            }
    
    

        
    }else{
        header("Location: ../index.php?signup=success");
        exit();
    }
