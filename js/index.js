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

  let meses = [
    "nenhum",
    "Janeiro",
    "Fevereiro",
    "Março",
    "Abril",
    "Maio",
    "Junho",
    "Julho",
    "Agosto",
    "Setembro",
    "Outubro",
    "Novembro",
    "Dezembro"
  ];

  let data01b = data01.split("-")
  let data02b = data02.split("-")
  
  if (data01 == data02) {
    $("#periodo").html(data01)
  }
  else {




    if(data01b[1]>data02b[1])
    {
      alert("A data inicial não pode ser posterior a data final")
    }
    else{
      if((data01b[1] == data02b[1])&&(data01b[0] > data02b[0]))
      {
        alert("A data inicial não pode ser posterior a data final")
      }else//data válida
      {

        $("#periodo").html(`${data01} a ${data02}`)
      }

    }
  }
}
