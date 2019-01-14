<?php

    include_once("conexao.php");

    if($_POST['vcli']=="0")
    {
         $clioperacao = "";
    }
    else {
         $clioperacao = " where cliente_fat = '".$_POST['vcli']."'";
    }   

    $sql="SELECT DISTINCT TP_OPERACAO FROM painelajofer ".$clioperacao;

    $result = mysqli_query($conn, $sql);

    echo $sql;

    echo '<option value="0">Todas as Operações         </option>' ;

    if (($_POST['vcli']=="0")==false)
    {
      while($row_pain = mysqli_fetch_assoc($result))
      {
        echo '<option value="'.$row_pain['TP_OPERACAO'].'">'.$row_pain['TP_OPERACAO'].'</option>';
      }
    }
?>