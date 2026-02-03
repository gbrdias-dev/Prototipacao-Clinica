<?php
session_start();
require_once('conn.php');

$nome = $_POST['nome_medico'];
$especialidade = $_POST['especialidade'];
$unidade = $_POST['unidade'];

$sql = "INSERT INTO medico VALUES (NULL,'".$nome."') ";
mysqli_query($conn, $sql);
$id_medico = mysqli_insert_id($conn);

$sql = "INSERT INTO espec_medico VALUES ($especialidade, $id_medico)";
mysqli_query($conn, $sql);

$sql = "INSERT INTO medico_unidade VALUES ($id_medico, $unidade)";
mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) == 1){
    echo "<html><script>window.location.href='cadastro_medico.php?resultado=1'</script></html>";
}else{
    echo "<html><script>window.location.href='cadastro_medico.php?resultado=-1'</script></html>";
}


?>