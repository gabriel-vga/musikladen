<?php
require "valida-sessao.php";
require "conexao.php"; 
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Musik | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="shortcut icon" href="images/favicon.png"/>
  <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-primary nav-xs">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="index.php" class="navbar-brand text-lt">
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
      <form method="POST" action="index.php?pg=pesquisa" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-black btn-icon rounded"><i class="fa fa-search"></i></button>
              </span>
              <input type="text" class="form-control input-sm no-border rounded" name="pesquisa" placeholder="Pesquise aqui">
            </div>
          </div>
        </form>
      <div class="navbar-right ">
          <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <section class="dropdown-menu aside-xl animated fadeInUp">
                <section class="panel bg-white">
                  
                </section>
              </section>
            </li>
            <?php
                    if (!isset($_SESSION['login'])){  
                    echo "<li>
                    <a href='signin.html' class='btn btn-lg btn-info btn-block '>LOGAR</a>
                    </li>";
                    }else{
                    require('user.php');
                    }
                    
            ?>
         </ul>
        </div>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark dk nav-xs aside hidden-print" id="nav">          
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
                      <a href="index.php?pg=musicaspg">
                        <i class="icon-fire  "></i>
                        <span class="font-bold">Músicas</span>
                      </a>
                    </li>
                    <li>
                      <a href="generospg.php">
                        <i class="icon-music-tone-alt icon text-success-lter"></i>
                        <span class="font-bold">Gêneros</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?pg=cantorespg">
                        <i class="icon-diamond "></i>
                        <b class="badge bg-primary pull-right"></b>
                        <span class="font-bold">Artistas</span>
                      </a>
                    </li>
                    <li>
                      <a href="index.php?albunspg" data-target="#content" data-el="#bjax-el" data-replace="true">
                        <i class="icon-disc   "></i>
                        <span class="font-bold">Álbuns</span>
                      </a>
                    </li>
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="w-f-md" id="bjax-target">
              <section class="hbox stretch">
                <!-- side content -->
                <aside class="aside bg-light dk" id="sidebar">
                  <section class="vbox animated fadeInUp">
                    <section class="scrollable hover">
                      <div class="list-group no-radius no-border no-bg m-t-n-xxs m-b-none auto">
                      <a align="center" href="?pg=generosall" class="list-group-item active"><b>Todos os Gêneros</b></a>
                        <?php
                        $sql = "SELECT * FROM tbgenero ORDER BY NomeGenero";

                        $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));//guarda o resultado da consulta

                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <?php
                        while ($musica = mysqli_fetch_assoc($result)) {
                        ?>
                        <a align="center" href="?pg=generospgx&id=<?php echo $musica['idGenero'] ?>" class="list-group-item">
                        <b><?php echo $musica['NomeGenero'] ?></b>
                        </a>
                        <?php
                        }
                      }
                        ?>
                      </div>
                    </section>
                  </section>
                </aside>
                <!-- / side content -->
                <section>
                  <section class="vbox">
                    <section class="scrollable padder-lg">
                      <?php
                      if (empty($_GET['pg'])){
                        require('generosall.php');
                      }
                      elseif(file_exists($_GET['pg'] . ".php"))
                      {
                        require($_GET['pg'] . ".php");
                      }
                      else
                      {
                        echo "<h1>Página inexistente</h1>";
                      }
                      
                      ?>
                    </section>                    
                  </section>
                </section>
              </section>
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
    <script src="js/masonry/tiles.min.js"></script>
  <script src="js/masonry/demo.js"></script>
  <script src="js/app.plugin.js"></script>
  <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>