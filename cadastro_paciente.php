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
<form action="salvar_paciente.php" method="post">
   <h1>CADASTRO PACIENTE</h1>
    <div class="container">

    
    

   <input type="text" placeholder="Nome" name="nome_paciente" required>
   <input type="email" placeholder="Email" name="email_paciente" required>

    <select name="plano_saude" id="plano" Size="2">
    <?php
    $busca_plano = "SELECT codigo,nome FROM plano_saude";
    $resultado_busca = mysqli_query($conn, $busca_plano);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $codigo = $row["codigo"];
        $plano = $row["nome"];
        echo "<option value= '$codigo' >".$plano."</option>";
      }
 }

    
    ?>
    </select>

    

    <button>Salvar</button>
    <br>

    </div>


</form>
</div>


</body>
</html>