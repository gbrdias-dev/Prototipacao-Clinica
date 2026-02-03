<?php

require_once('conn.php');

?>

<?php


$nome_usuario = $_POST['nome_atendente'];
$email_usuario = $_POST['email'];
$unidade = $_POST['unidades'];
$caracteres = "ABCDEFGabcdefg123456789@#$";

for ($i = 1; $i <= 6; $i++) {
    $senha = $senha.substr($caracteres,rand(1, strlen($caracteres)),1);
}


if($conn){

    $busca_email = "SELECT email_usuario FROM atendente WHERE email_usuario = '$email_usuario'";
    $resultado_busca = mysqli_query($conn, $busca_email);
    $total_clientes = mysqli_num_rows($resultado_busca);

    if ($total_clientes > 0){
        echo "<html><script>window.location.href='login.php?resultado=-1'</script></html>";
    }
    else{
        $cadastro = "INSERT INTO atendente(codigo_unidade,nome,email_usuario,senha_usuario,data_admissao) VALUES ($unidade,'".$nome_usuario."', '".$email_usuario."','".$senha."',CURRENT_DATE())";
        $registro = mysqli_query($conn, $cadastro);
        echo $cadastro;
        if(!$registro){
            echo"<html><script>window.location.href='login.php?resultado=-2'</script></html>";
        }
        else{
            require('envia_mail.php'); 
            $msg = "Bem vindo, ".$nome_usuario.", sua senha de acesso: ".$senha; 
            if(enviarEmail($msg, $email_usuario)){
             echo"<html><script>window.location.href='login.php?resultado=1'</script></html>";
            }else{
             echo"<html><script>window.location.href='login.php?resultado=-1'</script></html>";
            }     
        
        }
    
    }
}
else{
    echo "Erro de conexão com o banco";
}


?>