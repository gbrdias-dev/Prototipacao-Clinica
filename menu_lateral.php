<?php
session_start();
?>


<html>
<body>
<link rel="stylesheet" href="style3.css">  

<div class="sidenav">
  <a href="inicial.php">Inicial</a>
<?php
if($_SESSION['administrador'] == 1){
?> 
  <button class="animacao-menu">Cadastro
    <i class="fa fa-caret-down"></i>
  </button>

  <div class="submenu">
    <a href="cadastro_medico.php">Médico</a>
    <a href="cadastro_atendente.php">Atendente</a>
    <a href="cadastro_unidade.php">Unidade</a>
    <a href="cadastro_plano.php">Plano de saúde</a>
    <a href="cadastro_paciente.php">Paciente</a>
  </div>
<?php  
}
?>
  <a href="marcar_consulta.php">Marcar Consulta</a>
  <a href="alterar_senha.php">Alterar Senha</a>
  <a href="pesquisa.php">Pesquisa</a>
</div>

<script>
var animacao = document.getElementsByClassName("animacao-menu");
var i;

for (i = 0; i < animacao.length; i++) {
  animacao[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var animacaoContent = this.nextElementSibling;
    if (animacaoContent.style.display === "block") {
      animacaoContent.style.display = "none";
    } else {
      animacaoContent.style.display = "block";
    }
  });
}
</script>



</body>
</html>