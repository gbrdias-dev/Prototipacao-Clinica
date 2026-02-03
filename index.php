<?php

require_once('conn.php');

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style2.css">
</head>
<body>

<?php
include "menu_superior.php";
?>

<img src="flores.webp" width="1080" height="628" margin-left:20px;>

<div class="main">

<p>"Em cada paciente</p>
<p>vemos uma oportunidade de oferecer conforto</p>
<p>e cuidado além do tratamento."</p>

</div>

<div class='texto'>
<b>Horários de Funcionamento</b>
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
        echo"<br>";
        echo "<img src='clinica.jpg' border='1px' width='250'>";
        echo"<br>";
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