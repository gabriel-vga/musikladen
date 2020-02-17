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
        <!-- .aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <div class="container">
                <h3>ÁREA DO ADMNISTRADOR</h3>
                  <?php
                  require("conexao.php");

                  //Variáveis de controle
                  $idMusica = $musica = $nomemusica = $duracao = $lancamento = $gravadora = $faixa = $forn = $genero = $album = $cantor = $compositor = "";
                  $errosql = $musicaErr = $nomemusicaErr = $precoErr = $duracaoErr = $lancamentoErr = $gravadoraErr = $faixaErr = $fornErr = $generoErr = $albumErr = $cantorErr = $compositorErr = "";
                  $erros = 0;

                  /** EXCLUSÃO **/
                  if (isset($_POST['excluir'])) {//Botão excluir pressionado
                    
                    if (!empty($_POST['cat'])) {//Verifica se existem categorias
                      foreach ($_POST['cat'] as $cat => $id) {
                        echo $id . "<br>";
                        $sql = "DELETE FROM tbmusica WHERE idMusica = '$id'";
                        if (mysqli_query($conexao,$sql) ) {
                          echo "<script>alert('Música(s) apagada(s) com sucesso!')</script>";
                          echo "<script>window.location.href = 'cadastromusica.php'</script>";//Limpando URL
                        } else {
                          echo "Erro: " .$sql . " " . mysqli_error($conexao);
                        }
                      }
                    }
                  }

                  /** EDIÇÃO **/
                  if (isset($_GET['acao'])){
                    echo $_GET['cat'];//Está vindo via URL
                    $idmusica = $_GET['cat'];//Guarda o id da musica
                    
                    if (isset($_POST['editar'])) {
                      $nomemusica = $_POST['nomemusica'];//Recebe o novo nome que vem do form
                      $duracao = $_POST['duracao'];//Recebe a nova duração que vem do form
                      $lancamento = $_POST['lancamento'];//Recebe o novo lançamento que vem do form
                      $gravadora = $_POST['gravadora'];//Recebe o novo nome que vem do form
                      $faixa = $_POST['faixa'];//Recebe o novo nome que vem do form
                      $sql = "UPDATE tbmusica SET NomeMusica = '$nomemusica', Duracao = '$duracao', Lancamento = '$lancamento', Gravadora = '$gravadora', Faixa = '$faixa' WHERE idMusica = '$idmusica'";
                    if (mysqli_query($conexao,$sql) ) {
                      echo "<script>alert('Música alterada com sucesso!')</script>";
                      echo "<script>window.location.href = 'cadastromusica.php'</script>";
                    }
                    //header("Location:cadastromusica.php");
                    } 
                    ?>
                    <!-- FORMULÁRIO DE EDIÇÃO DE MÚSICAS -->
                    <fieldset><legend>.::Editar Música::.</legend>
                    <form action="" method="post">
                      <p>* obrigatório </p>
                      <p>
                      <label for="nomemusica">Música: </label>
                      <input type="text" name="nomemusica"> * <?php echo $nomemusicaErr ?>
                      </p>
                      <label for="duracao">Duração: </label>
                      <input type="text" name="duracao"> * <?php echo $duracaoErr ?>
                      </p>
                      <label for="lancamento">Lançamento: </label>
                      <input type="text" name="lancamento"> * <?php echo $lancamentoErr ?>
                      </p>
                      <label for="gravadora">Gravadora: </label>
                      <input type="text" name="gravadora"> * <?php echo $gravadoraErr ?>
                      </p>
                      <label for="faixa">Faixa: </label>
                      <input type="text" name="faixa"> * <?php echo $faixaErr ?>
                      </p>
                      <input type="submit" name="editar" value="Editar">
                    </form>
                    </fieldset>
                    <hr>
                    <br>
                    <?php
                  }
                  //Cadastro
                  if (isset($_POST['cadastrar'])) {
                    if (empty($_POST['nomemusica'])) {
                      $nomemusicaErr = "obrigatório";
                      $erros++;
                    } else {
                      $nomemusica = $_POST['nomemusica'];
                    }
                    if (empty($_POST['duracao'])) {
                      $duracaoErr = "obrigatório";
                      $erros++;
                    } else {
                      $duracao = $_POST['duracao'];
                    }
                    if (empty($_POST['lancamento'])) {
                      $lancamentoErr = "obrigatório";
                      $erros++;
                    } else {
                      $lancamento = $_POST['lancamento'];
                    }
                    if (empty($_POST['gravadora'])) {
                      $gravadoraErr = "obrigatório";
                      $erros++;
                    } else {
                      $gravadora = $_POST['gravadora'];
                    }
                    if (empty($_POST['faixa'])) {
                      $faixaErr = "obrigatório";
                      $erros++;
                    } else {
                      $faixa = $_POST['faixa'];
                    }
                    if (empty($_POST['forn'])) {
                      $fornErr = "obrigatório";
                      $erros++;
                    } else {
                      $forn = $_POST['forn'];
                    }
                    if (empty($_POST['genero'])) {
                      $generoErr = "obrigatório";
                      $erros++;
                    } else {
                      $genero = $_POST['genero'];
                    }
                    if (empty($_POST['album'])) {
                      $albumErr = "obrigatório";
                      $erros++;
                    } else {
                      $album = $_POST['album'];
                    }
                    if (empty($_POST['cantor'])) {
                      $cantorErr = "obrigatório";
                      $erros++;
                    } else {
                      $cantor = $_POST['cantor'];
                    }
                    if (empty($_POST['compositor'])) {
                      $compositorErr = "obrigatório";
                      $erros++;
                    } else {
                      $compositor = $_POST['compositor'];
                    }
                    if (empty($erros)) {
                      $sql = "INSERT INTO tbmusica (NomeMusica,Duracao,Lancamento,Gravadora,Faixa,idmForn,idmGenero, idmAlbum, idmCantor, idmCompositor) VALUES ('$nomemusica','$duracao','$lancamento','$gravadora','$faixa','$forn','$genero','$album','$cantor','$compositor')";
                      //$sql = "INSERT INTO tbmusica (Duracao) VALUES ('$duracao')";
                      if (mysqli_query($conexao,$sql)) {
                      /** aqui começa o cadastro da música **/
                      $id_musica = mysqli_insert_id($conexao);//pega o último registro inserido
                      //Informações da música
                      $file = $_FILES['music'];//Contém as músicas selecionadas
                      $numFile = count(array_filter($file['name']));//Nº de arquivos
                      //PASTA
                      $folder = "uploads";
                      //REQUISITOS
                      $permite = array("audio/mp3");//Tipos permitidos
                      $maxSize = 1024 * 1024 * 1024 * 100;//Tamanho máximo do arquivo
                      //MENSAGENS
                      $msg = array();
                      $errorMsg = array(
                        1 => "O arquivo no upload é maior do que o permitido no php.ini",
                        2 => "O arquivo ultrapassa o limite de tamanho de MAX_FILE_SIZE",
                        3 => "O upload do arquivo foi feito parcialmente",
                        4 => "Não foi feito o upload do arquivo"
                      );

                      if ($numFile <= 0){
                        echo "<script>alert('Selecione uma música!')</script>";
                      }else{
                        for ($i = 0;$i < $numFile;$i++){//Inicia a identificação das músicas
                          $name = $file['name'][$i];
                          $type = $file['type'][$i];
                          $size = $file['size'][$i];
                          $error = $file['error'][$i];
                          $tmp = $file['tmp_name'][$i];

                          $extensao = @end(explode('.',$name));
                          $novoNome = rand().".$extensao";//Gera um novo nome para a música
                          //Agora vamos inserir na tabela audios
                          $sql = "UPDATE tbmusica SET NomeAudio = '$novoNome' WHERE idMusica = '$id_musica'";
                          mysqli_query($conexao,$sql);

                        if ($error != 0) {
                              $msg[] = "<b>$name: </b>" . $errorMsg[$error];
                            } elseif ( ! in_array($type,$permite) ) {
                              $msg[] = "<b>$name: </b> Extensão não permitida." ;
                            } elseif ($size > $maxSize) {
                              $msg[] = "<b>$name: </b> Tamanho máx. excedido." ;
                            } else {
                              if ( move_uploaded_file($tmp,$folder.'/'.$novoNome) ) {
                                echo "<script>alert('Música cadastrada com sucesso!')</script>";
                                echo "<script>window.location.href = 'cadastromusica.php'</script>";
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
                        $errosql = mysqli_error($conexao);
                        echo $errosql;
                        echo "<script>alert('Não foi possível cadastrar a música! $erros $errosql')</script>";
                        echo "<script>window.location.href = 'cadastromusica.php'</script>";
                      }
                    
                    } else {
                      echo "Não foi possível efetuar o cadastro. Verfique se todos os campos obrigatórios foram preenchidos.";
                    }
                  }
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                  <h3>Cadastro de Músicas</h3>
                  <p><span class="error">* obrigatório.</span></p>
                    <div class="row">
                      <div class="form-group col-sm-4">
                      <label>Nome: <span class="error">*</span></label>
                      <input type="text" class="form-control" name="nomemusica" autofocus><span class="error"><?php echo $nomemusicaErr ?></span>
                      </div>
                      <div class="form-group col-sm-1">
                      <label>Duração: <span class="error">*</span></label>
                      <input type="text" class="form-control" maxLength="8" placeholder="00:00" name="duracao"><span class="error"><?php echo $duracaoErr ?></span>
                      </div>
                      <div class="form-group col-sm-2">
                      <label>Lançamento: <span class="error">*</span></label>
                      <input type="text" class="form-control" maxLength="4" name="lancamento"><span class="error"><?php echo $lancamentoErr ?></span>
                      </div>
                      <div class="form-group col-sm-2">
                      <label>Gravadora: <span class="error">*</span></label>
                      <input type="text" class="form-control" name="gravadora"><span class="error"><?php echo $gravadoraErr ?></span>
                      </div>
                      <div class="form-group col-sm-1">
                      <label>Faixa: <span class="error">*</span></label>
                      <input type="text" class="form-control" maxLength="3" name="faixa"><span class="error"><?php echo $faixaErr ?></span>
                      </div>
                      <div class="form-group col-sm-2">
                      <label>Gênero: <span class="error">*</span></label>
                      <select name="genero" class="form-control">
                      <?php 
                      $sql = "SELECT * FROM tbgenero";
                      $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta
                      if (mysqli_num_rows($result) > 0) {
                        while ($genero = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $genero['idGenero'] ?>"><?php echo $genero['NomeGenero'] ?></option>
                      <?php 
                        }
                      }
                      ?>
                      </select> <?php echo $generoErr ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-2">
                      <label>Fornecedor: <span class="error">*</span></label>
                      <select name="forn" class="form-control">
                      <?php 
                      $sql = "SELECT * FROM tbfornecedor";
                      $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta
                      if (mysqli_num_rows($result) > 0) {
                        while ($forn = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $forn['idFornecedor'] ?>"><?php echo $forn['NomeFornecedor'] ?></option>
                      <?php 
                        }
                      }
                      ?>
                      </select> <?php echo $fornErr ?>    
                      </div>
                      <div class="form-group col-sm-3">
                      <label>Cantores: <span class="error">*</span></label>
                      <select name="cantor" class="form-control">
                      <?php 
                      $sql = "SELECT * FROM tbcantor";
                      $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta
                      if (mysqli_num_rows($result) > 0) {
                        while ($cantor = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $cantor['idCantor'] ?>"><?php echo $cantor['NomeCantor'] ?></option>
                      <?php 
                        }
                      }
                      ?>
                      </select> <?php echo $cantorErr ?>    
                      </div>
                      <div class="form-group col-sm-4">
                      <label>Álbum: <span class="error">*</span></label>
                      <select name="album" class="form-control">
                      <?php 
                      $sql = "SELECT * FROM tbalbum";
                      $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta
                      if (mysqli_num_rows($result) > 0) {
                        while ($album = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $album['idAlbum'] ?>"><?php echo $album['NomeAlbum'] ?></option>
                      <?php 
                        }
                      }
                      ?>
                      </select> <?php echo $albumErr ?>
                      </div>
                      <div class="form-group col-sm-3">
                      <label>Compositores: <span class="error">*</span></label>
                      <select name="compositor" class="form-control">
                      <?php 
                      $sql = "SELECT * FROM tbcompositor";
                      $result = mysqli_query($conexao, $sql);//guarda o resultado da consulta
                      if (mysqli_num_rows($result) > 0) {
                        while ($compositor = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $compositor['idCompositor'] ?>"><?php echo $compositor['NomeCompositor'] ?></option>
                      <?php 
                        }
                      }
                      ?>
                      </select> <?php echo $compositorErr ?> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-4">
                        <input type="file" name="music[]" multiple>
                      </div>
                    </div>
                    <div align="left"><button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button></div>
                  </form>
                  <hr>
				  <form action="" method="post" enctype="multipart/form-data">
                  <?php
                  //Listar os produtos cadastrados
                  $sql = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor";

                  $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));//guarda o resultado da consulta

                  if (mysqli_num_rows($result) > 0) {
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th>ID</th>
                        <th>MÚSICA</th>
                        <th>EDITAR</th>
                        <th>EXCLUIR</th>
                      </tr>
                    <?php
                    while ($musica = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                        <td><?php echo $musica['idMusica'] ?></td>
                        <td><a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>"><?php echo $musica['NomeMusica'] ?></a></td>
                        <td><a href="?acao=edit&cat=<?php echo $musica['idMusica'] ?>">editar</a></td>
                        <td><input type="checkbox" name="cat[]" value="<?php echo $musica['idMusica'] ?>"></td>
                        </tr>
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
