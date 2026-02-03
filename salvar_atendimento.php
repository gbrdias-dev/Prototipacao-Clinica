<?php
session_start();
require_once('conn.php');

$medico = $_POST['medico'];
$unidade = $_POST['unidade'];
$horario = $_POST['horario'];

$sql = "INSERT INTO atendimento VALUES (NULL,$horario, $medico, NULL, CURDATE())";
mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) == 1){
    echo "<html><script>window.location.href='marcar_consulta.php?resultado=1'</script></html>";
}else{
    echo "<html><script>window.location.href='marcar_consulta.php?resultado=-1'</script></html>";
}


?>