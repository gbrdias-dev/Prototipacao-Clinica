<?php

require_once('conn.php');

?>

<html>
<head>

<?php
if (isset($_GET['resultado'])){
  $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Médico cadastrado com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao cadastrar médico.')</script>";
}
?>

</head>
<body>


<link rel="stylesheet" href="style3.css">  

<?php
include "menu_lateral.php";

?>

<div class="corpo">
<form action="salvar_medico.php" method="post">
  <h1>CADASTRO MÉDICO</h1>
    <div class="container">

   <input type="text" placeholder="Nome" name="nome_medico" required>
   <select name="especialidade" id="especialidades" Size="2">
    <?php
    $busca_espec = "SELECT codigo,descricao FROM especialidade";
    $resultado_busca = mysqli_query($conn, $busca_espec);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $codigo = $row["codigo"];
        $especialidade = $row["descricao"];
        echo "<option value= '$codigo' >".$especialidade."</option>";
      }
 }

    
    ?>
    </select>

    <select name="unidade" id="unidades" Size="2">
    <?php
    $busca_uni = "SELECT codigo,nome FROM unidade";
    $resultado_busca = mysqli_query($conn, $busca_uni);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $codigo = $row["codigo"];
        $unidade = $row["nome"];
        echo "<option value= '$codigo' >".$unidade."</option>";
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