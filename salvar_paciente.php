<?php
session_start();
require_once('conn.php');

$nome_paciente = $_POST['nome_paciente'];
$email_paciente = $_POST['email_paciente'];
$plano_saude = $_POST['plano_saude'];

$sql = "INSERT INTO paciente VALUES (NULL,'".$nome_paciente."','".$email_paciente."',$plano_saude) ";
mysqli_query($conn, $sql);


if(mysqli_affected_rows($conn) == 1){
    echo "<html><script>window.location.href='cadastro_paciente.php?resultado=1'</script></html>";
}else{
    echo "<html><script>window.location.href='cadastro_paciente.php?resultado=-1'</script></html>";
}


?>