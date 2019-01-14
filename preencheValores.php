<?php

    include_once("conexao.php");

    if($_POST['vmesfim']==12)
    {
        $mesfimplus = $_POST['vmesfim'];
        $anofimplus = $_POST['vanofim']+1;
    }
    else
    {
        $mesfimplus = $_POST['vmesfim']+1;
        $mesfimplus = str_pad($mesfimplus, 2, "0", STR_PAD_LEFT);
        $anofimplus = $_POST['vanofim'];
    }

    //fragmento do select correspondente a data
    //verificase datas são iguais
    if(($_POST['vmesini']==$_POST['vmesfim'])&&($_POST['vanoini']==$_POST['vanofim']))
    {
        //são iguais
        $data = "WHERE DATE_FORMAT(str_to_date(data_emissao, '%d/%m/%Y'), '%Y/%m/%d') like '".$_POST['vanoini']."/".$_POST['vmesini']."/%%'";
    }
    else{
        //são diferentes
        $data = "WHERE DATE_FORMAT(str_to_date(data_emissao, '%d/%m/%Y'), '%Y/%m/%d') >= '".$_POST['vanoini']."/".$_POST['vmesini']."' and DATE_FORMAT(str_to_date(data_emissao, '%d/%m/%Y'), '%Y/%m/%d') <='".$anofimplus."/".$mesfimplus."'";
    }   

    //fragmento do select correspondente ao cliente
    //verifica se cliente== "0" 
    if($_POST['vcli']=="0")
    {
        $cliente="";
    }
    else
    {
        $cliente = " and cliente_fat = '".$_POST['vcli']."'";
    }

    //fragmento do select correspondente a operação

    if($_POST['vop']=="0")
    {
        $operacao="";
    }
    else
    {
        $operacao = " and TP_OPERACAO  = '".$_POST['vop']."'";
    }

    // ------------------------------------------------------------Valor 01-------------------------------------------------------------

    $query01 = "SELECT sum(total_prest) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado01 = mysqli_query($conn, $query01);
    $linhaResultado01 = mysqli_fetch_assoc($resultado01);

    $valor1 = 'R$' . number_format($linhaResultado01['soma'], 2, ',', '.');
    
    // ------------------------------------------------------------Valor 02-------------------------------------------------------------

    $query02 = "SELECT sum(VALOR_NF) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado02 = mysqli_query($conn, $query02);
    $linhaResultado02 = mysqli_fetch_assoc($resultado02);

    $valor2 = 'R$' . number_format($linhaResultado02['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 03-------------------------------------------------------------

    $query03 = "SELECT sum(FRETE_PESO) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado03 = mysqli_query($conn, $query03);
    $linhaResultado03 = mysqli_fetch_assoc($resultado03);

    $valor3 = 'R$' . number_format($linhaResultado03['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 04-------------------------------------------------------------

    $query04 = "SELECT sum(ICMS) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado04 = mysqli_query($conn, $query04);
    $linhaResultado04 = mysqli_fetch_assoc($resultado04);

    $valor4 = 'R$' . number_format($linhaResultado04['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 05-------------------------------------------------------------

    $query05 = "SELECT sum(FRETE_VALOR) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado05 = mysqli_query($conn, $query05);
    $linhaResultado05 = mysqli_fetch_assoc($resultado05);

    $valor5 = 'R$' . number_format($linhaResultado05['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 06-------------------------------------------------------------

    $query06 = "SELECT sum(PEDAGIO) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado06 = mysqli_query($conn, $query06);
    $linhaResultado06 = mysqli_fetch_assoc($resultado06);

    $valor6 = 'R$' . number_format($linhaResultado06['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 07-------------------------------------------------------------

    $query07 = "SELECT sum(OUTROS) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado07 = mysqli_query($conn, $query07);
    $linhaResultado07 = mysqli_fetch_assoc($resultado07);

    $valor7 = 'R$' . number_format($linhaResultado07['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 08-------------------------------------------------------------

    $query08 = "SELECT sum(Gris) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado08 = mysqli_query($conn, $query08);
    $linhaResultado08 = mysqli_fetch_assoc($resultado08);

    $valor8 = 'R$' . number_format($linhaResultado08['soma'], 2, ',', '.');

    // ------------------------------------------------------------Valor 09-------------------------------------------------------------

    if(($linhaResultado02['soma']==0)||($linhaResultado01['soma']==0))
    {
      $valor9="0";
    }
    else
    {
      $valor9=(($linhaResultado01['soma'])/($linhaResultado02['soma'])*100);
    }

    $valor9= number_format($valor9, 2, ',', '.').' %';

    // ------------------------------------------------------------Valor 10-------------------------------------------------------------
    
    if(($linhaResultado06['soma']==0)||($linhaResultado01['soma']==0))
    {
      $valor10="0";
    }
    else
    {
      $valor10=(($linhaResultado06['soma'])/($linhaResultado01['soma'])*100);
    }

    $valor10= number_format($valor10, 2, ',', '.').' %';

    // ------------------------------------------------------------Valor 12-------------------------------------------------------------
    
    $query12 = "SELECT sum(qtde_docto) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado12 = mysqli_query($conn, $query12);
    $linhaResultado12 = mysqli_fetch_assoc($resultado12);

    $valor12 = $linhaResultado12['soma'];

    if(($valor12==0)||($valor12==""))
    {
        $valor12="0";
    }

    // ------------------------------------------------------------Valor 14-------------------------------------------------------------
    
    $query14 = "SELECT sum(PESO) as soma FROM painelajofer ".$data.$cliente.$operacao." ORDER BY DATA_EMISSAO";
    $resultado14 = mysqli_query($conn, $query14);
    $linhaResultado14 = mysqli_fetch_assoc($resultado14);

    $valor14 = $linhaResultado14['soma'];

    $valor14 = $valor14/1000;

    $valor14 = number_format($valor14, 2, ',', '.').' T';

    // ------------------------------------------------------------Valor 11-------------------------------------------------------------
    
    if(($linhaResultado14['soma']==0)||($linhaResultado02['soma']==0))
    {
      $valor11="0";
    }
    else
    {
        $valor11=(($linhaResultado14['soma']/1000)/$linhaResultado12['soma']);
    }

    $valor11 = number_format($valor11, 2, ',', '.').' T';


    // ------------------------------------------------------------Valor 13-------------------------------------------------------------
    
    if(($linhaResultado01['soma']==0)||($linhaResultado12['soma']==0))
    {
      $valor13="0";
    }
    else
    {
        $valor13=(($linhaResultado01['soma'])/$linhaResultado12['soma']);
    }

    $valor13 = 'R$' . number_format($valor13, 2, ',', '.');

    // ------------------------------------------------------------Valor 15-------------------------------------------------------------

    if(($linhaResultado01['soma']==0)||($linhaResultado14['soma']==0))
    {
      $valor15="0";
    }
    else
    {   
        $frete= $linhaResultado01['soma'];
        $peso= $linhaResultado14['soma']/1000;
        $valor15=($frete/$peso);
    }

    $valor15 = 'R$' . number_format($valor15, 2, ',', '.'); 


    echo $valor1."#".$valor2."#".$valor3."#".$valor4."#".$valor5."#".$valor6."#".$valor7."#".$valor8."#".$valor9."#"."$valor10"."#".$valor11."#".$valor12."#".$valor13."#".$valor14."#".$valor15;

    
?>

