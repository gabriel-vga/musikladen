<?php
require "valida-sessao.php";
require "conexao.php"; 
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>ADMIN | Musikladen</title>
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
                <h3>ÁREA DO ADMNISTRADOR</h3>
                  <?php
                  require 'conexao.php';

                  $generoErro = "";
                  $genero = "";

                  /** EXCLUSÃO **/
                  if (isset($_POST['excluir'])) {//Botão excluir pressionado
                    if (!empty($_POST['cat'])) {//Verifica se existem categorias
                      foreach ($_POST['cat'] as $cat => $id) {
                        echo $id . "<br>";
                        $sql = "DELETE FROM tbgenero WHERE idGenero = '$id'";
                        if (mysqli_query($conexao,$sql) ) {
                          echo "<script>alert('Gênero(s) apagado(s) com sucesso!')</script>";
                          echo "<script>window.location.href = 'cadastrogenero.php'</script>";//Limpando URL
                        } else {
                          echo "Erro: " .$sql . " " . mysqli_error($conexao);
                        }
                      }
                    }
                  }

                  /** EDIÇÃO **/
                  if (isset($_GET['acao'])){
                    echo $_GET['cat'];//Está vindo via URL
                    $idgenero = $_GET['cat'];//Guarda o id do genero
                    
                    if (isset($_POST['editar'])) {
                      $genero = $_POST['genero'];//Recebe o novo nome que vem do form
                      $sql = "UPDATE tbgenero SET NomeGenero = '$genero' WHERE idGenero = '$idgenero'";
                    if (mysqli_query($conexao,$sql) ) {
                      echo "<script>alert('Gênero alterado com sucesso!')</script>";
                      echo "<script>window.location.href = 'cadastrogenero.php'</script>";
                    }
                    //header("Location:cadastrogenero.php");
                    } 
                    ?>
                    <!-- FORMULÁRIO DE EDIÇÃO DE GÊNEROS -->
                    <fieldset><legend>.::Editar Gênero::.</legend>
                    <form action="" method="post">
                      <p>* obrigatório </p>
                      <p>
                      <label for="genero">Gênero: </label>
                      <input type="text" name="genero"> * <?php echo $generoErro ?>
                      </p>
                      <input type="submit" name="editar" value="Editar">
                    </form>
                    </fieldset>
                    <hr>
                    <br>
                    <?php
                  }

                  if (!isset($_GET['acao'])) {//pressionou o botão
                    
                    if (empty($_POST['genero'])) { //não preencheu o nome do genero
                      $generoErro = "obrigatório";
                    } else { // preencheu corretamente
                      $genero = $_POST['genero'];
                      //inciar o cadastro
                        
                      $sql = "INSERT INTO tbgenero (NomeGenero) VALUES ('$genero')";
                      //inserção do dado
                      if (mysqli_query($conexao, $sql)) {
                        echo "<script>alert('Gênero cadastrado com sucesso')</script>";
                      } else {
                        echo "<script>alert('Erro ao cadastrar')</script>";
                      }
                    }
                  ?>

                  <!-- FORMULÁRIO DE CADASTRO DE GÊNEROS -->
                  <fieldset><legend>.::Cadastro de Gêneros::.</legend>
                  <form action="" method="post">
                    <p>* obrigatório </p>
                    <p>
                    <label for="genero">Gênero: </label>
                    <input type="text" name="genero"> * <?php echo $generoErro ?>
                    </p>
                    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar">
                  </form>
                  </fieldset>
                  <hr>
                  <p>
                  <?php
                  }
                  //Listar os gêneros cadastradas
                  require 'conexao.php';

                  $sql = "SELECT * FROM tbGenero";

                  $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta

                  if (mysqli_num_rows($result) > 0) {
                    ?>
                    <form action="" method="post">
                      <table class="table table-striped">
                        <tr>
                          <th>Código</th>
                          <th>Gênero</th>
                          <th>EDITAR</th>
                          <th>EXCLUIR</th>
                        </tr>
                      <?php
                    while ($genero = mysqli_fetch_assoc($result)) {
                      ?>
                          <tr>
                        <td><?php echo $genero['idGenero'] ?></td>
                        <td><a href="generospg.php?pg=generospgx&id=<?php echo $genero['idGenero'] ?>"><?php echo $genero['NomeGenero'] ?></a></td>
                        <td><a href="?acao=edit&cat=<?php echo $genero['idGenero'] ?>">editar</a></td>
                        <td><input type="checkbox" name="cat[]" value="<?php echo $genero['idGenero'] ?>"></td>
                        </tr>
                      <?php
                    }
                      ?>
                      </table>
                      <div align="left"><input type="submit" name="excluir" class="btn btn-primary" value="Excluir"></div>
                      </form>
                      <?php
                  }

                  ?>
                  </p>
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
