<?php

require_once('conn.php');

?>

<?php


$nome_usuario = $_POST['nome'];
$email_usuario = $_POST['email'];
$senha_usuario = $_POST['senha'];
$codigo_usuario = $_POST['unidades'];


if($conn){

    $busca_email = "SELECT email_usuario FROM atendente WHERE email_usuario = '$email_usuario'";
    $resultado_busca = mysqli_query($conn, $busca_email);
    $total_clientes = mysqli_num_rows($resultado_busca);

    if ($total_clientes > 0){
        echo "<html><script>window.location.href='login.php?resultado=-1'</script></html>";
    }
    else{
        $cadastro = "INSERT INTO atendente(codigo_unidade,nome,email_usuario,senha_usuario,data_admissao) VALUES ($codigo_usuario,'".$nome_usuario."', '".$email_usuario."','".$senha_usuario."',CURRENT_DATE())";
        $registro = mysqli_query($conn, $cadastro);
        echo $cadastro;
        if(!$registro){
        echo"Deu erro";
        }
        else{   
        echo"<html><script>window.location.href='login.php?resultado=1'</script></html>";
        }
    
    }
}
else{
    echo "Erro de conexão com o banco";
}


?>