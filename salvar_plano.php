<?php

session_start();
require_once('conn.php');

$nome_plano = $_POST['nome_plano'];
$link = $_POST['site_plano'];

$sql = "INSERT INTO plano_saude VALUES ('".$nome_plano."','".$link."') ";
mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) == 1){
    echo "<html><script>window.location.href='cadastro_plano.php?resultado=1'</script></html>";
}else{
    echo "<html><script>window.location.href='cadastro_plano.php?resultado=-1'</script></html>";
}




?>