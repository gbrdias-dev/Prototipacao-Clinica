<html>

<?php
if (isset($_GET['resultado'])){
  $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Senha recuperada com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao enviar email de recuperação de senha.')</script>";
}
?>


<link rel="stylesheet" href="style.css">



<body>
<form action="autenticar_login.php" method="post">

<div class="pai">
  <div class="container">
  <h1>CLINICA</h1>
  <br>
    <input type="email" placeholder="Digite seu email" name="email" required>

    <input type="password" placeholder="Digite sua senha" name="senha" required>

    <button>Entrar</button>
    <input type="submit" value="Esqueci a senha" onclick="javascript:window.location.href='esqueci_senha.php'">
    <br>
  </div>
</div>
</form>
</body>
</html>