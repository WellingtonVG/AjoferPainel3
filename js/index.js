$(function () {

  $("#datepicker").datepicker({
    autoclose: true,
    todayHighlight: true,
    format: "mm-yyyy",
    viewMode: "months",
    minViewMode: "months",
    language: 'pt-BR',
    startDate: '01/2018',
    endDate: '0m',
  });
  $("#datepicker2").datepicker({
    autoclose: true,
    todayHighlight: true,
    format: "mm-yyyy",
    viewMode: "months",
    minViewMode: "months",
    language: 'pt-BR',
    startDate: '01/2018',
    endDate: '0m',
  });

  //seleciona mês atual nos datepicker
  let dataAtual = new Date()
  let mesAtual = dataAtual.getMonth() + 1
  let anoAtual = dataAtual.getFullYear()
  let mesAno = `${mesAtual}/${anoAtual}`

  

  $("#datepicker").datepicker("setDate", mesAno);
  $("#datepicker2").datepicker("setDate", mesAno);

});

//datepicker 01 evento
$(function () {
  $("#datepicker").datepicker({ dateFormat: "mm-yyyy" })
  $("#datepicker").on("change", function () {

    geraperiodo()

  });
});
//datepicker 02 evento
$(function () {
  $("#datepicker2").datepicker({ dateFormat: "mm-yyyy" })
  $("#datepicker2").on("change", function () {

    geraperiodo()

  });
});

function geraperiodo() {
  let data01 = $("#datepicker").find("input").val()
  let data02 = $("#datepicker2").find("input").val()

  let dataAtual = new Date()
  let mesAtual = dataAtual.getMonth() + 1
  let anoAtual = dataAtual.getFullYear()
  let mesAno = `${mesAtual}/${anoAtual}`

  let memoria = mesAno

  let meses = [
    "nenhum",
    "Jan",
    "Fev",
    "Mar",
    "Abr",
    "Mai",
    "Jun",
    "Jul",
    "Ago",
    "Set",
    "Out",
    "Nov",
    "Dez"
  ];

  let data01b = data01.split("-")
  let data02b = data02.split("-")

  let mes01 = parseInt(data01b[0])
  let mes02 = parseInt(data02b[0])


  //se as datas selecionadas forem iguais
  if (data01 == data02) {
    $("#periodo").html(`${meses[mes01]}-${data01b[1]}`)
    var mdata1 = data01b
    var mdata2 = data02b
  }
  else {
    if(data01b[1]>data02b[1])
    {
      alert("A data inicial não pode ser posterior a data final")
      $("#datepicker2").datepicker("setDate", mesAno);
      $("#datepicker").datepicker("setDate", mesAno);
    }
    else{
      if((data01b[1] == data02b[1])&&(data01b[0] > data02b[0]))
      {
        alert("A data inicial não pode ser posterior a data final")

        $("#datepicker2").datepicker("setDate", mesAno);
        $("#datepicker").datepicker("setDate", mesAno);
      }else//data válida
      {
        $("#periodo").html(`${meses[mes01]}-${data01b[1]} a ${meses[mes02]}-${data02b[1]}`)

      }

    }
  }
}//fim geraperiodo()


//funçoes qu rodam qndo carregar a página
$(document).ready(function() {
  function preencheValores() {
    var idCli = $("#cliente").val();

    $.ajax({
      url:'preencheValores.php',
      type: 'POST',
      data:{vCli:idCli},
      success:function(data)
      {
        alert(data)
        var retorno = data.split("#");
        $("#valorA1").html(retorno[0]);
      }
    })
  }

  $("#cliente").on("change",function(){
    preencheValores()
  });

geraperiodo()
preencheValores()

});

