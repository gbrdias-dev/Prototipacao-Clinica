<?php
session_start();
require_once('conn.php');


$senha_atual = $_POST['senha_atual'];
$nova_senha = $_POST['senha_nova'];
$codigo = $_SESSION['codigo'];

$sql = "SELECT senha_usuario FROM atendente WHERE senha_usuario = '".$senha_atual."' AND codigo = $codigo";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);


if($total == 1){
    
    $sql = "UPDATE atendente SET senha_usuario='$nova_senha' WHERE codigo = $codigo";
    mysqli_query($conn, $sql);
    mysqli_affected_rows($conn);
    
        if (mysqli_affected_rows($conn) == 1){
            echo "<html><script>window.location.href='alterar_senha.php?resultado=1'</script></html>";
        }
        else{
            echo"<html><script>window.location.href='alterar_senha.php?resultado=-1'</script></html>";
        }
}


    

?>