<?php
require "valida-sessao.php";
require "conexao.php"; 
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Admin | Musikladen</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
  <link rel="stylesheet" href="js/datatables/datatables.css" type="text/css"/>
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="indexadm.php" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="images/logo.png" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">MUSIKLADEN</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>
      
      <div class="navbar-right ">
          <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <section class="dropdown-menu aside-xl animated fadeInUp">
                <section class="panel bg-white">
                  
                </section>
              </section>
            </li>
            <li class='dropdown'>
              <a href='#'' class='dropdown-toggle bg clear' data-toggle='dropdown'>
                <span class='thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm'>
                  <img src='images/a0.png' alt='avatar'>
                </span>
                <?php $nome = explode(" ",$_SESSION['login']['Nome']); echo $nome[0] ?><b class='caret'></b>
              </a>
              <ul class='dropdown-menu animated fadeInRight'>            
                <li>
                  <a href='signin.html'>Logout</a>
                </li>
              </ul>
            </li>
         </ul>
      </div>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk aside hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav bg clearfix">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      Navegue
                    </li>
                    <li>
                      <a href="admin.php">
                        <i class="icon-disc icon text-success"></i>
                        <span class="font-bold">Home</span>
                      </a>
                    </li>
                    <li>
                      <a href="cadastromusica.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Cadastro de Música</span>
                      </a>
                    </li>
                    <li>
                      <a href="cadastrogenero.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Cadastro de Gêneros</span>
                      </a>
                    </li>
                    <li>
                      <a href="cadastroalbum.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Cadastro de Álbuns</span>
                      </a>
                    </li>
                    <li>
                      <a href="cadastrocantor.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Cadastro de Cantores</span>
                      </a>
                    </li>
                    <li>
                      <a href="cadastrocompositor.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Cadastro de Compositores</span>
                      </a>
                    </li>
                    <li>
                      <a href="cadastrofornecedor.php">
                        <i class="icon-music-tone-alt icon text-info"></i>
                        <span class="font-bold">Cadastro de Fornecedores</span>
                      </a>
                    </li>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="container">
                <h1><?php $nome = explode(" ",$_SESSION['login']['Nome']); echo "Bem vindo, " . $nome[0] . "!"?>
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>    
  </section>
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
  <!-- datatables -->
<script src="js/datatables/jquery.dataTables.min.js"></script>
<script src="js/datatables/jquery.csv-0.71.min.js"></script>
<script src="js/datatables/demo.js"></script>
  <script src="js/app.plugin.js"></script>
  <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>