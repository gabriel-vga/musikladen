<!DOCTYPE html>
<html lang="pt-br" class="app">
<head>  
  <meta charset="utf-8" />
  <title>MUSIKLADEN</title>
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
<body class="bg-info dker">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
<?php

ob_start();

session_start();

if(!empty($_POST['submit'])) 
{
	echo "<a class='btn btn-lg btn-info btn-block rounded' href='signin.HTML'>VOLTAR À TELA DE LOGIN</a><BR>";
	//Validação do e-mail
	if(empty($_POST['email']))
	{
		echo "Preencha o e-mail";
		echo "<br>";
	}
	else
	{
		$email = $_POST['email'];
	}
	
	//Validação da senha
	if(empty($_POST['pwd']))
	{
		echo "Preencha a senha";
		echo "<br>";
	}
	else
	{
		$pwd = $_POST['pwd'];
	}
	//Efetuar login
	if (!empty($_POST['email']) and ! empty($_POST['pwd']))
	{
		require("conexao.php");
		$sql = "SELECT * FROM tbgerenciador
		WHERE EMail = '$email' AND Senha = '$pwd' LIMIT 1";
		$result = mysqli_query($conexao,$sql);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('Login admnistrador efetuado com sucesso!')</script>";
			while($rows = mysqli_fetch_assoc($result)) {
				$_SESSION['login'] = $rows;
			}
			echo "<script>window.location.href='admin.php'</script>";
		} else {
			if (!empty($_POST['email']) and ! empty($_POST['pwd']))
			{
				require("conexao.php");
				$sql = "SELECT * FROM tbcliente
				WHERE EMail = '$email' AND Senha = '$pwd' LIMIT 1";
				$result = mysqli_query($conexao,$sql);
				if (mysqli_num_rows($result) > 0) {
					echo "<script>alert('Login efetuado com sucesso!')</script>";
					while($rows = mysqli_fetch_assoc($result)) {
						$_SESSION['login'] = $rows;
					}
					echo "<script>window.location.href='index.php'</script>";
				} else {
					echo "<script>alert('Falha ao logar')</script>";
					//Caso não consiga fazer login, redireciona para a index
					echo "<script>window.location.href='signin.html'</script>";
				}
			}
		}
	}
}
else
{
?>
<h1 class="navbar-brand block"><span class="h1 font-bold">ACESSO INVÁLIDO</span></h1>
<br><br>
<form action="signin.html">
    <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Voltar ao Login</span></button>
</form>
<?php
}

ob_end_flush();
?>
 </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>MUSIKLADEN<br>&copy; 2017</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
  <script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
  <script type="text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>