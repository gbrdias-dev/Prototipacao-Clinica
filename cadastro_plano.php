<?php

require_once('conn.php');

?>




<?php
if (isset($_GET['resultado'])){
  $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Plano cadastrado com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao cadastrar plano.')</script>";
}
?>

<html>
<head>

</head>
<body>


<link rel="stylesheet" href="style3.css">  

<?php
include "menu_lateral.php";

?>

<div class="corpo">
<form action="salvar_plano.php" method="post">
   <h1>CADASTRO PLANO</h1>
    <div class="container">


    <input type="text" placeholder="Nome" name="nome_plano" required>
    <input type="text" placeholder="Site" name="site_plano" required>


    <button>Enviar</button>
    <br>

    </div>


</form>
</div>


</body>
</html>