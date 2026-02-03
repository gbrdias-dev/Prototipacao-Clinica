<?php

require_once('conn.php');

?>

<html>
<head>  
</head>
<body>


<link rel="stylesheet" href="style3.css">  

<?php
include "menu_lateral.php";

?>


<div class= "corpo">
<form action="salvar_atendente.php" method="post">
  <h1>CADASTRO ATENDENTE</h1>
    <div class="container">

    

    <input type="text" placeholder="Nome" name="nome_atendente" required>
    <input type="email" placeholder="Email" name="email" required>
    <select name="unidades" id="unidades" Size="2">
    <?php
    $busca_unidade = "SELECT codigo,nome FROM unidade";
    $resultado_busca = mysqli_query($conn, $busca_unidade);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $unidade = $row["codigo"];
        $nome_unidade = $row["nome"];
        echo "<option value= '$unidade' >".$nome_unidade."</option>";
      }
 }

    
    ?>
    </select>

    <button>Enviar</button>
    <br>

    </div>


</form>
</div>



</body>
</html>