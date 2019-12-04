<?php 
require 'includes/dbh.inc.php';

        $alu_ra = 1640615;

        //Criação de template para busca de nome
        $search = "SELECT * FROM aluno WHERE alu_ra=?;";
        //Criação de uma declaração preparada
        $stmt = mysqli_stmt_init($conn);
        //Preparar a declaração
        if(!mysqli_stmt_prepare($stmt, $search)){
            echo "Declaração SQL falhou";
        } else {
            //Fixar parâmetro ao placeholder
            mysqli_stmt_bind_param($stmt, "i", $alu_ra);
            //Rodar parâmetros dentro do BD
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)){
                echo $row['alu_ra']."<br>";
                echo $row['alu_nome']."<br>";
                echo $row['alu_email']."<br>";
                echo $row['alu_curso']."<br>";
            }
        }
