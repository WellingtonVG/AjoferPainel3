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
    if (data01b[1] > data02b[1]) {
      alert("A data inicial não pode ser posterior a data final")
      $("#datepicker2").datepicker("setDate", mesAno);
      $("#datepicker").datepicker("setDate", mesAno);
    }
    else {
      if ((data01b[1] == data02b[1]) && (data01b[0] > data02b[0])) {
        alert("A data inicial não pode ser posterior a data final")

        $("#datepicker2").datepicker("setDate", mesAno);
        $("#datepicker").datepicker("setDate", mesAno);
      } else//data válida
      {
        $("#periodo").html(`${meses[mes01]}-${data01b[1]} a ${meses[mes02]}-${data02b[1]}`)

      }

    }
  }
}//fim geraperiodo()


//funçoes qu rodam qndo carregar a página
$(document).ready(function () {


  function preencheValores() {

    var idcli = $("#cbcliente").val();
    var idop = $("#cboperacao").val();
    var dataini = $("#datepicker").find("input").val();
    var datafim = $("#datepicker2").find("input").val();

    var datainib = dataini.split("-")
    var datafimb = datafim.split("-")


    $.ajax({
      url: 'preencheValores.php',
      type: 'POST',
      data: {vop:idop, vcli: idcli, vmesini: datainib[0], vanoini: datainib[1], vmesfim: datafimb[0], vanofim: datafimb[1] },
      success: function (data) {
        //lado A
        var retorno = data.split("#");
        $("#valorA1").html(retorno[0]);
        $("#valorA2").html(retorno[1]);
        $("#valorA3").html(retorno[2]);
        $("#valorA4").html(retorno[3]);
        $("#valorA5").html(retorno[4]);
        $("#valorA6").html(retorno[5]);
        $("#valorA7").html(retorno[6]);
        $("#valorA8").html(retorno[7]);
        //lado B
        $("#valorB1").html(retorno[8]);
        $("#valorB2").html(retorno[9]);
        $("#valorB3").html(retorno[10]);
        $("#valorB4").html(retorno[11]);
        $("#valorB5").html(retorno[12]);
        $("#valorB6").html(retorno[13]);
        $("#valorB7").html(retorno[14]);
      }
    })
  }

  function populaComboOP() {

    var idcli = $("#cbcliente").val();

    $.ajax({
      url: 'populaComboOP.php',
      type: 'POST',
      data: { vcli: idcli},
      success: function (data) {
        $("#cboperacao").html(data);
      }
    })
  }

  $("#cbcliente").on("change", function () {
    preencheValores()
    populaComboOP()
  });

  $("#cboperacao").on("change", function () {
    preencheValores()
  });

  $("#datepicker").on("change", function () {
    preencheValores()
  });
  $("#datepicker2").on("change", function () {
    preencheValores()
  });

  geraperiodo()
  preencheValores()

});

