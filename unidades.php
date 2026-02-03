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
    Unidades
</div>


<div class="unidade">
    
    <?php
    $sql = "SELECT nome,endereco from unidade";
    $resultado_busca = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado_busca) > 0){
        while($row = mysqli_fetch_assoc($resultado_busca)){
        $nome_unidade = $row["nome"];
        $endereco_unidade = $row["endereco"];

        echo "<div>";
        echo "<br>";
        echo "<img src='clinica.jpg' border='1px' width='480'>";
        echo $nome_unidade;
        echo "<p> $endereco_unidade; </p>";
        echo "<p> Funcionamento </p>";
        echo "<p>Segunda à Sexta: 08:00 às 17:00</p>";
        echo "</div>";
        }
    }

    ?>

</div>



</body>    
</html>