<?php
session_start();
require_once('conn.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$busca_usuario = "SELECT codigo,email_usuario,senha_usuario,administrador FROM atendente WHERE email_usuario = '$email' AND senha_usuario = '$senha'";
$resultado_busca = mysqli_query($conn, $busca_usuario);
$total_usuarios = mysqli_num_rows($resultado_busca);

if($total_usuarios == 1){
    $row = mysqli_fetch_assoc($resultado_busca);
    $_SESSION['administrador'] = $row["administrador"];
    $_SESSION['codigo'] = $row["codigo"];
    echo "<meta http-equiv='refresh' content='0;url=inicial.php'>";
}
else{
    echo "<html><script>window.location.href='login.php?resultado=-1'</script></html>";
}




?>