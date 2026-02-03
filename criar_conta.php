<?php

require_once('conn.php');

?>

<html>


<link rel="stylesheet" href="style.css">



<body>
<form action="autenticar_conta.php" method="post">
   
  <div class="container">
  <h1>CRIAR CONTA</h1>
  <br>
    <input type="text" placeholder="Digite seu nome" name="nome" required>
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
    <input type="email" placeholder="Digite seu email" name="email" required>
    <input type="password" placeholder="Digite sua senha" name="senha" required>
    <input type="password" placeholder="Confirmar senha" name="confirma_senha" required>

    <button type="submit">Criar</button>
    
    <br>
  </div>

</form>
</body>
</html>