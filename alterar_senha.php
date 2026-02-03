<html>


<?php
if (isset($_GET['resultado'])){
  $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Senha alterada com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao alterar senha.')</script>";
}
?>


<body>
    
<link rel="stylesheet" href="style3.css">  


<?php
include "menu_lateral.php"
?>


<form action="salvar_senha.php" method="post">

    <div class="container">

    <h1>ALTERAR SENHA</h1>
    <br>

    <input type="text" placeholder="Digite sua senha atual" name="senha_atual" required>
    <input type="text" placeholder="Digite sua nova senha" name="senha_nova" required>
    <input type="text" placeholder="Confirme sua senha nova" name="confirmar_senha" required>


    <button>Enviar</button>
    <br>

    </div>


</form>


</body>
</html>