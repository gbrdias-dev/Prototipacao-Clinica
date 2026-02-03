<?php
session_start();
require_once('conn.php');

$nome = $_POST['nome_unidade'];
$endereco = $_POST['endereco'];

$sql = "INSERT INTO unidade VALUES (NULL,'".$nome."','".$endereco."')";
mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)){
    echo "<html><script>window.location.href='cadastro_unidade.php?resultado=1'</script></html>";
}else{
    echo "<html><script>window.location.href='cadastro_unidade.php?resultado=-1'</script></html>";
}


?>