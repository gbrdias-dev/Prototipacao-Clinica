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
    Equipe
</div>


<div class="equipe">
    
    <?php
    $sql = "SELECT especialidade.descricao,nome from espec_medico INNER JOIN medico ON (espec_medico.codigo_medico = medico.codigo) INNER JOIN especialidade ON (especialidade.codigo = espec_medico.codigo_espec)";
    $resultado_busca = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultado_busca) > 0){
        $nomes_medicos = [];
        while($row = mysqli_fetch_assoc($resultado_busca)){
        $nomes_medicos = $row["nome"];
        $especialidade = $row["descricao"];


        echo "<div>";
        echo $nomes_medicos;
        echo "<p> $especialidade </p>";
        
        echo "</div>";
        }
    }

    ?>

</div>



</body>    
</html>