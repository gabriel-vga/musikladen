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

                  $cantorErro = "";
                  $cantor = "";

                  /** EXCLUSÃO **/
                  if (isset($_POST['excluir'])) {//Botão excluir pressionado
                    if (!empty($_POST['cat'])) {//Verifica se existem categorias
                      foreach ($_POST['cat'] as $cat => $id) {
                        echo $id . "<br>";
                        $sql = "DELETE FROM tbcantor WHERE idCantor = '$id'";
                        if (mysqli_query($conexao,$sql) ) {
                          echo "<script>alert('Cantor(es) apagado(s) com sucesso!')</script>";
                          echo "<script>window.location.href = 'cadastrocantor.php'</script>";//Limpando URL
                        } else {
                          echo "Erro: " .$sql . " " . mysqli_error($conexao);
                        }
                      }
                    }
                  }

                  /** EDIÇÃO **/
                  if (isset($_GET['acao'])){
                    echo $_GET['cat'];//Está vindo via URL
                    $idcantor = $_GET['cat'];//Guarda o id do cantor
                    
                    if (isset($_POST['editar'])) {
                      $cantor = $_POST['cantor'];//Recebe o novo nome que vem do form
                      $sql = "UPDATE tbcantor SET NomeCantor = '$cantor' WHERE idCantor = '$idcantor'";
                    if (mysqli_query($conexao,$sql) ) {
                      echo "<script>alert('Cantor alterado com sucesso!')</script>";
                      echo "<script>window.location.href = 'cadastrocantor.php'</script>";
                    }
                    //header("Location:cadastrocantor.php");
                    } 
                    ?>
                    <!-- FORMULÁRIO DE EDIÇÃO DE CANTORES -->
                    <fieldset><legend>.::Editar Cantor::.</legend>
                    <form action="" method="post">
                      <p>* obrigatório </p>
                      <p>
                      <label for="cantor">Cantor: </label>
                      <input type="text" name="cantor"> * <?php echo $cantorErro ?>
                      </p>
                      <input type="submit" name="editar" value="Editar">
                    </form>
                    </fieldset>
                    <hr>
                    <br>
                    <?php
                  }

                  if (!isset($_GET['acao'])) {//pressionou o botão
                    
                    if (empty($_POST['cantor'])) { //não preencheu o nome do cantor
                      $cantorErro = "obrigatório";
                    } else { // preencheu corretamente
                      $cantor = $_POST['cantor'];
                      //inciar o cadastro
                        
                      $sql = "INSERT INTO tbcantor (NomeCantor) VALUES ('$cantor')";
                      //inserção do dado
                      if (mysqli_query($conexao, $sql)) {
                      /** aqui começa o cadastro da imagem **/
                      $id_cantor = mysqli_insert_id($conexao);//pega o último registro inserido
                      //Informações da imagem
                      $file = $_FILES['img'];//Contém as imagens selecionadas
                      $numFile = count(array_filter($file['name']));//Nº de arquivos
                      //PASTA
                      $folder = "uploads";
                      //REQUISITOS
                      $permite = array("image/jpeg","image/png");//Tipos permitidos
                      $maxSize = 1024 * 1024 * 10;//Tam. máx. or arquivo
                      //MENSAGENS
                      $msg = array();//Armazena os erros de $errorMsg e mostra
                      $errorMsg = array(
                        1 => "O arquivo no upload é maior do que o permitido no php.ini",
                        2 => "O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE",
                        3 => "O upload do arquivo foi feito parcialmente",
                        4 => "Não foi feito o upload do aqruivo"
                      );
                      
                      if ($numFile <= 0) {
                        echo "<script>alert('Selecione uma imagem!')</script>";
                      } else {
                        for ($i = 0;$i < $numFile;$i++){//Inicia a identificação das imagens
                          $name = $file['name'][$i];
                          $type = $file['type'][$i];
                          $size = $file['size'][$i];
                          $error = $file['error'][$i];
                          $tmp = $file['tmp_name'][$i];
                          
                          $extensao = @end(explode('.',$name));
                          $novoNome = rand().".$extensao";//Gera um novo nome para a imagem
                          //Agora vamos inserir na tabela imagens
                          $sql = "UPDATE tbcantor SET NomeFotoCantor = '$novoNome' WHERE idCantor = '$id_cantor'";
                          mysqli_query($conexao,$sql);
                          
                          if ($error != 0) {
                            $msg[] = "<b>$name: </b>" . $errorMsg[$error];
                          } elseif ( ! in_array($type,$permite) ) {
                            $msg[] = "<b>$name: </b> Extensão não permitida." ;
                          } elseif ($size > $maxSize) {
                            $msg[] = "<b>$name: </b> Tamanho máx. excedido." ;
                          } else {
                            if ( move_uploaded_file($tmp,$folder.'/'.$novoNome) ) {
                              echo "<script>alert('Cantor cadastrado com sucesso!')</script>";
                              echo "<script>window.location.href = 'cadastrocantor.php'</script>";
                            } else {
                              $msg[] = "<b>$name: </b> não foi carregado..." ;
                            }
                          }
                          
                          foreach ($msg as $texto) {
                            echo $texto . "<br>";
                          }
                        }
                      }
                      /****/
                      } else {
                        echo "<script>alert('Erro ao cadastrar')</script>";
                        echo "<script>window.location.href = 'cadastrocantor.php'</script>";
                      }
                    }
                  ?>

                  <!-- FORMULÁRIO DE CADASTRO DE CANTORES -->
                  <fieldset><legend>.::Cadastro de Cantores::.</legend>
                  <form action="" method="post" enctype="multipart/form-data">
                    <p>* obrigatório </p>
                    <p>
                    <label for="cantor">Cantor: </label>
                    <input type="text" name="cantor"> * <?php echo $cantorErro ?>
                    </p>
                    <div class="form-group col-sm-4">
                      <input type="file" name="img[]" multiple> 
                    </div>
                    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar">
                  </form>
                  </fieldset>
                  <hr>
                  <p>
                  <?php
                  }
                  //Listar os cantores cadastradas
                  require 'conexao.php';

                  $sql = "SELECT * FROM tbcantor";

                  $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta

                  if (mysqli_num_rows($result) > 0) {
                    ?>
                    <form action="" method="post">
                      <table class="table table-striped">
                        <tr>
                          <th>Código</th>
                          <th>Cantor</th>
                          <th>EDITAR</th>
                          <th>EXCLUIR</th>
                        </tr>
                      <?php
                    while ($cantor = mysqli_fetch_assoc($result)) {
                      ?>
                          <tr>
                        <td><?php echo $cantor['idCantor'] ?></td>
                        <td><a href="index.php?pg=cantores&id=<?php echo $cantor['idCantor'] ?>"><?php echo $cantor['NomeCantor'] ?></a></td>
                        <td><a href="?acao=edit&cat=<?php echo $cantor['idCantor'] ?>">editar</a></td>
                        <td><input type="checkbox" name="cat[]" value="<?php echo $cantor['idCantor'] ?>"></td>
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
