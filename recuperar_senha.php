<?php

require_once('conn.php');

$email = $_POST['email'];
$busca = "SELECT senha_usuario FROM atendente WHERE email_usuario = '$email'";
$resultado_busca = mysqli_query($conn, $busca);
if(mysqli_num_rows($resultado_busca) == 1){
    $row = mysqli_fetch_assoc($resultado_busca);
    $senha = $row["senha_usuario"];
}

require('envia_mail.php'); 
$msg = 'Sua senha é : '.$senha;
if(enviarEmail($msg, $email)){

    echo"<html><script>window.location.href='login.php?resultado=1'</script></html>";
   }else{
    echo"<html><script>window.location.href='login.php?resultado=-1'</script></html>";
   }


?>