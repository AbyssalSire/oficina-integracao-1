<?php 
    ob_start();
    include("header.php");
            
            $buffer=ob_get_contents();
            ob_end_clean();

            $buffer=str_replace("%TITLE%","Criar aula",$buffer);
            echo $buffer;
?>
    
    <main>
        <?PHP
        
        ?>
</main>
        
    

<?php 
    require "footer.php";
?>