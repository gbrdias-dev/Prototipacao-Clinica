<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'consultas';
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);

if(!$conn){

    echo "erro";

} else{

    #echo " deu bom ";
}

?>