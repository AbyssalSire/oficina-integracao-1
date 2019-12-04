<?php 

if(isset($_POST['remove-tutor'])){

require 'dbh.inc.php'; 
session_start();
$tutor_ra=$_SESSION["userRA"];

$sql = "DELETE FROM tutor WHERE tutor_ra= ?;";

                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "SQL falhou";
                } else {
                    mysqli_stmt_bind_param($stmt, "i", $tutor_ra);
                    mysqli_stmt_execute($stmt);
                }
                
               header("Location: ../index.php?removetutorsuccess");
        }
        else {
                header("Location: ../index.php?update=error");
                exit();
            }