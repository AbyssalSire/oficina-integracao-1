<?php 
session_start();
if(isset($_POST['update-submit'])){
        require 'dbh.inc.php';
        
        $alu_ra = $_SESSION["userRA"];
        $alu_nome = mysqli_real_escape_string($conn,$_POST['nome']);
        $alu_senha = mysqli_real_escape_string($conn,$_POST['senha']);
        $alu_celular = mysqli_real_escape_string($conn,$_POST['celular']);
        $alu_email = mysqli_real_escape_string($conn,$_POST['email']);
        $alu_curso = mysqli_real_escape_string($conn,$_POST['curso']);


        //Criação de template para busca de nome    
        $sql = "SELECT * FROM aluno WHERE alu_ra=?;";
        //Criação de uma declaração preparada
        $stmt = mysqli_stmt_init($conn);
        //Preparar a declaração
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Declaração SQL falhou";
        } else {
            //Fixar parâmetro ao placeholder
            mysqli_stmt_bind_param($stmt, "i", $alu_ra);
            //Rodar parâmetros dentro do BD
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                    
                    if($row == NULL){
                        header("Location: ../update.php?error=nouser");
                        exit();
                    } else {

                
                
                if($alu_nome==""){
                    $alu_nome=$row['alu_nome'];
                }                   
                if(!$alu_senha==''){
                    $alu_senha=md5($alu_senha);
                }else {
                    $alu_senha=$row['alu_senha'];
                }
                if(empty($alu_celular)){
                    $alu_celular=$row['alu_celular'];            
                }
                if(empty($alu_email)){
                    $alu_email=$row['alu_email'];    
                } 
                if(empty($alu_curso)){
                    $alu_curso=$row['alu_curso']; 
                } 
                var_dump($alu_curso); 
                        
                        
                $sql = "UPDATE aluno
                SET alu_nome=?, alu_senha=?, alu_celular=?, alu_email=?, alu_curso=?
                WHERE alu_ra=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL falhou";
        } else {
            mysqli_stmt_bind_param($stmt, "ssissi", $alu_nome, $alu_senha, $alu_celular, $alu_email, $alu_curso, $alu_ra);
            mysqli_stmt_execute($stmt);
            header("Location: ../profile.php?update=success");
        }
        
    }
}


} else {
    header("Location: ../index.php?update=error");
}