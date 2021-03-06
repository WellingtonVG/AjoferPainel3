
<?php
  session_start();
  include_once("conexao.php");

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

  <link rel="stylesheet" href="css/padroes.css">
  <link rel="shortcut icon" href="imagens/favicon-ajofer.jpg">

  <title>AJOFER - Painel de Gestão</title>
</head>

<body>
  <div class="row cabecalho" >
    <div class="col-sm-12 col-md-5 col-lg-6 col-xl-6" id="logo-topo">
        <a href=""><img src="imagens/logo-u.png" alt="some text" width=245 height=50 id="logo"></a>
    </div>
    <div class="col-sm-12 col-md-7 col-lg-6 col-xl-6" id="titulo">
        Painel de Gestão
    </div>
  </div>
  <div class="container-fluid" id="area-sair">
    <div class="row">
      <div class="col" id="legenda01">

			  	<button class="botao" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"><span id="btfiltro">Filtrar</span></i></button>
				  <button class="botao" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"><span id="btfiltro">Sair</span></i></button>
          <div id="area-periodo">
            <span id="legendaselecao01" class="legendaselecao"> Período selecionado:</span>
            <span id="periodo" class="legendaselecao"></span>
          </div>
          <span id="cliente" class="legendaselecao"></span>
          <div class="collapse" id="collapseExample">

              <div class="row" id="area-data">
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
                  <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 combo"> 
                      <label>
                          <select class="combo2" id="cbcliente">
                              <option value="0">Todos os Clientes         </option>
                              <?php
                              $selectCliente = "SELECT distinct cliente_fat from painelajofer order by cliente_fat";
                              $resultado = mysqli_query($conn, $selectCliente);
                              while($linhaResultado = mysqli_fetch_assoc($resultado)){ ?>
                                <option value="<?php echo $linhaResultado['cliente_fat']; ?>"><?php echo $linhaResultado['cliente_fat']; ?></option> <?php
                              }
                            ?>
                          </select>
                      </label>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 combo"> 
                      <label>
                          <select class="combo2" id="cboperacao">
                              <option value="0">Todas as Operações         </option>
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


  <!-- Abas Responsivas -->


  <div class="pos-f-t" id="menu-resp">
    <nav class="navbar navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="custom-nav p-4">
        <ul class="nav nav-tabs">
          <li class="active">
            <a  href="#1" data-toggle="tab">Análise por cliente</a>
          </li>
          <li><a href="#2" data-toggle="tab">Evolução Mensal</a>
          </li>
          <li><a href="#3" data-toggle="tab">Comparações entre clientes</a>
          </li>
        </ul>
      </div>
    </div>
    
  </div>

  <!-- Abas Desktop -->


  <div id="exTab2" class="container-fluid">	
    <ul class="nav nav-tabs" id="abas-desk">
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
              <div class="valor" id="valorA1"></div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor das Mercadorias</div>
              <div class="valor" id="valorA2"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Frete Peso</div>
              <div class="valor" id="valorA3"></div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do ICMS</div>
              <div class="valor" id="valorA4"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Frete Valor</div>
              <div class="valor" id="valorA5"></div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Valor do Pedágio</div>
              <div class="valor" id="valorA6"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="bordertitle">
              <div class="title">Outros Valores</div>
              <div class="valor" id="valorA7"></div>
            </div>
          </div>
          <div class="col">
            <div class="bordertitle">
              <div class="title">Gris / Outras taxas</div>
              <div class="valor" id="valorA8"></div>
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
                    <div class="cardV" id="valorB1">

                    </div>
                  </div>
                </div>
                <div class="clear"></div>
                <div class="col">
                  <div class="cardB">
                    <div class="cardT">
                      PEDÁGIO SOBRE<br>O FRETE
                    </div>
                    <div class="cardV" id="valorB2">

                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="cardB">
                    <div class="cardT2">
                      PESO MÉDIO POR<br>ENTREGA (TON)
                    </div>
                    <div class="cardV" id="valorB3">

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
                    <div class="cardV" id="valorB4">
                    
                    </div>
                  </div>
                </div>
                <div class="col card2">
                  <div class="cardC">
                    <div class="cardT">
                      VALOR DO FRETE POR<br>ENTREGA
                    </div>
                    <div class="cardV" id="valorB5">
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
                    <div class="cardV" id="valorB6">
                    </div>
                  </div>
                </div>
                <div class="col card2">
                  <div class="cardB">
                    <div class="cardT">
                      VALOR DO FRETE POR<br>TONELADA
                    </div>
                    <div class="cardV" id="valorB7">
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
          ...
        </div>
<!-- aba 03 -->
        <div class="tab-pane" id="3">
          ...
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
