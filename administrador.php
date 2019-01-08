<?php
	session_start();

	if((isset($_SESSION['usuarioNome']))==false)
	{
		header("Location: index.php");
	}	
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css'>

  <link rel="stylesheet" href="css/style.css">

  <title>AJOFER</title>
</head>

<body>
  <div class="row cabecalho">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <img src="imagens/logo-u.png" alt="some text" width=245 height=50 id="logo">
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" id="titulo">
        Painel de Gestão
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col" id="legenda01">

			  	<button class="botao" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"><span id="btfiltro">Filtrar</span></i></button>
				  <button class="botao" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"><span id="btfiltro">Sair</span></i></button>
          <span id="legendaselecao01" class="legendaselecao"> Período selecionado:</span>
          <span id="periodo" class="legendaselecao"></span>
          <div class="collapse" id="collapseExample">

              <div class="row">
                  <div class="col-sm-2 col-md-2 col-lg-1 col-xl-1 filtro">
                      Data Inicial:
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2 filtro2"> 
                      <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                          <input class="form-control" type="text" readonly />
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                  </div>
                  <div class="col-sm-2 col-md-2 col-lg-1 col-xl-1 filtro">
                      Data Final:
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2 filtro2"> 
                      <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy">
                          <input class="form-control" type="text" readonly />
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      </div>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2 combo"> 
                      <label>
                          <select class="combo2">
                              <option selected> Select Box </option>
                              <option>Short Option</option>
                              <option>This Is A Longer Option</option>
                          </select>
                      </label>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2 combo"> 
                      <label>
                          <select class="combo2">
                              <option selected> Select Box </option>
                              <option>Short Option</option>
                              <option>This Is A Longer Option</option>
                          </select>
                      </label>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2 combo"> 
                      <label>
                          <select class="combo2">
                              <option selected> Select Box </option>
                              <option>Short Option</option>
                              <option>This Is A Longer Option</option>
                          </select>
                      </label>
                  </div>
              </div>


          </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja realmente sair do Painel de Gestão ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-danger" onclick="window.location.href='sair.php'">Sair</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fim do container-fluid -->

<!-- sitema de Abas -->
<div id="exTab2" class="container-fluid">	
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Análise por cliente</a>
			</li>
			<li><a href="#2" data-toggle="tab">Evolução Mensal</a>
			</li>
			<li><a href="#3" data-toggle="tab">Comparações entre clientes</a>
			</li>
		</ul>
<!-- aba 01 -->
			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          
              <!-- início do grid -->
    <div class="row fullgrid">
      <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" id="LadoA">
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete</div>
              <div class="valor">R$25.356,00</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" id="LadoB">
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Análise de Impacto</div>
              <div class="row cellb">
                <div class="col">
                  <div class="cardB">
                    <div class="cardT">
                      FRETE SOBRE AS<br>MERCADORIAS
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="cardB">
                    <div class="cardT">
                      PEDÁGIO SOBRE<br>O FRETE
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="cardB">
                    <div class="cardT2">
                      PESO MÉDIO POR<br>ENTREGA (TON)
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Análise do frete em relação a quantidade de entrega</div>
              <div class="row cellb">
                <div class="col card2">
                  <div class="cardC">
                    <div class="cardT2">
                      QUANTIDADE DE DOCUMENTOS<br>EMITIDOS
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
                <div class="col card2">
                  <div class="cardC">
                    <div class="cardT">
                      VALOR DO FRETE POR<br>ENTREGA
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Análise do frete em relação a tonelagem transportada</div>
              <div class="row cellb">
                <div class="col card2">
                  <div class="cardB">
                    <div class="cardT">
                      TONELADAS<br>TRANSPORTADAS
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
                <div class="col card2">
                  <div class="cardB">
                    <div class="cardT">
                      VALOR DO FRETE POR<br>TONELADA
                    </div>
                    <div class="cardV">
                      1,23 %
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fim do grid -->

        </div>
<!-- aba 02 -->
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
        </div>
<!-- aba 03 -->
        <div class="tab-pane" id="3">
          <h3>add clearfix to tab-content (see the css)</h3>
				</div>
			</div>
  </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js'></script>
 
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js'></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
  <script src="/js/bootstrap-datepicker.pt-BR.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js"></script>





  <script src="js/index.js"></script>
  

</body>

</html>
