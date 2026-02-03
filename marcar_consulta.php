<?php

require_once('conn.php');

?>
<html>
  
<head>
<meta http-equiv="Cache-Control" content="no-store" />
<link rel="stylesheet" href="style3.css">



<?php
if (isset($_GET['resultado'])){
  $resultado = $_GET['resultado'];
}
else{
   $resultado=0;
}   

if($resultado == 1){
   echo"<script>window.alert('Consulta agendada com sucesso!')</script>";
}
elseif($resultado == -1){
   echo"<script>window.alert('Erro ao agendar consulta.')</script>";
}
?>


<script>

  function carrega_unidade(value){
     window.location.href='marcar_consulta.php?medico=' + value + '&datac=' + document.getElementById("data").value;
  }

</script>  

<script>
  //var datac = <?php echo "'". $_GET['datac'] . "'"; ?>;
  //document.getElementById("data").value=datac;
  function carrega_horario(value){
    <?php if(isset($_GET['medico'])){ ?>
      var medico = <?php echo $_GET['medico'] ?>;
      //var datac = <?php //echo "'". date_format(date_create($_GET['datac']),'d/m/Y')."'"; ?>;
      var datac = <?php echo "'". $_GET['datac'] . "'"; ?>;
      document.getElementById("data").value=datac;
      
    <?php }?>   
    window.location.href='marcar_consulta.php?medico=' + medico +'&unidade=' +value+ "&datac= " + datac;
    
  }

</script>  

</head>
<body>
  

<?php
include "menu_lateral.php";
?>

<div class="corpo">
<form action="salvar_atendimento.php" method="post">
    <h1>MARCAR CONSULTA</h1>
    <div class="container">
  
    SELECIONE A DATA
    <input type="date" class="data" id="data" name="data" value=<?php ?>>

   SELECIONE O MÉDICO
   <select required name="medico" id="medico" onchange="carrega_unidade(this.value)">
   <option value="">Selecione um médico</option>
    <?php
    $busca_espec = "SELECT codigo,nome FROM medico";
    $resultado_busca = mysqli_query($conn, $busca_espec);
  
    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $codigo = $row["codigo"];
        $nome_medico = $row["nome"];
        if(isset($_GET['medico']) && intval($_GET['medico']) == $codigo){
        echo "<option value= '$codigo' selected >".$nome_medico."</option>";
      }else{
        echo "<option value= '$codigo' >".$nome_medico."</option>";
      }
    }
    }

    
    ?>
    </select>

    <?php if(isset($_GET['medico'])){ ?>
    SELECIONE A UNIDADE
    <select required name="unidade" id="unidade" onchange="carrega_horario(this.value)">
    <option value="">Selecione uma unidade</option>
    <?php
    $medico_selecionado = $_GET['medico'];
    $busca_uni = "SELECT unidade.nome,codigo_unidade from medico_unidade INNER JOIN unidade ON (unidade.codigo = medico_unidade.codigo_unidade) WHERE codigo_medico = $medico_selecionado";
    $resultado_busca = mysqli_query($conn, $busca_uni);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $codigo_unidade = $row["codigo_unidade"];
        $unidade = $row["nome"];
        if(isset($_GET['unidade']) && intval($_GET['unidade']) == $codigo_unidade){
          echo "<option value= '$codigo_unidade' selected >".$unidade."</option>";
        }else{
          echo "<option value= '$codigo_unidade' >".$unidade."</option>";
        }
      }
    }

    
    ?>
    </select> 
    <?php } ?>


    <?php if(isset($_GET['unidade'])){ ?>
    SELECIONE O HORÁRIO
    <select required name="horario" id="horario" size="3"> 
    <?php
    $unidade_selecionada = $_GET['unidade'];
    $busca_hora = "SELECT horario_unidade.codigo,horario_unidade.hora,data,paciente FROM horario_unidade LEFT JOIN `atendimento` ON (horario_unidade.codigo = atendimento.hora) WHERE codigo_unidade =  $unidade_selecionada AND codigo_dia = DAYOFWEEK('2024-09-19');";
    $resultado_busca = mysqli_query($conn, $busca_hora);

    if(mysqli_num_rows($resultado_busca) > 0){

      while($row = mysqli_fetch_assoc($resultado_busca)){

        $codigo = $row["codigo"];
        $hora = $row["hora"];
        echo "<option value= '$codigo' >".$hora."</option>";
      }
    }

    
    ?>
    </select>
    <?php } ?>

    

    <button>Enviar</button>
    <br>

    </div>


</form>
</div>







</body>
</html>