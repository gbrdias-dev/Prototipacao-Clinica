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
   echo"<script>window.alert('Unidade cadastrada com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao cadastrar unidade.')</script>";
}
?>

</head>
<body>


<link rel="stylesheet" href="style3.css">  

<?php
include "menu_lateral.php";

?>

<div class="corpo">
<form action="salvar_unidade.php" method="post">
  <h1>CADASTRO UNIDADE</h1>
    <div class="container">

    <input type="text" placeholder="Nome" name="nome_unidade" required>
    <input type="text" placeholder="Endereço" name="endereco" required>


    <button>Enviar</button>
    <br>

    </div>


</form>
</div>


</body>
</html>