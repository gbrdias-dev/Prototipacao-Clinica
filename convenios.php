<?php

require_once('conn.php');

?>

<html>
<body>

<link rel="stylesheet" href="style4.css">  

<?php
include "menu_superior.php";
?>


<div class="principal">
    Convênios
</div>


<div class="equipe">
    
    <?php
    $sql = "SELECT nome,site_plano from plano_saude";
    $resultado_busca = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado_busca) > 0){
        while($row = mysqli_fetch_assoc($resultado_busca)){
        $nome_plano = $row["nome"];
        $link = $row["site_plano"];

        echo "<div>";
        echo $nome_plano;
        echo "</div>";
        }
    }

    ?>

</div>



</body>    
</html>