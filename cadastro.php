<?php 
    ob_start();
    session_start();

    require 'conexao.php';

                $Erro = "";
                if (!isset($_GET['acao']) and empty($_GET['acao'])) { //pressionou o botão
                  if (isset($_POST['incluir'])) {
                    if (empty($_POST['nome'])
                      OR empty($_POST['email'])
                      OR empty($_POST['cpf'])
                      OR empty($_POST['data_nascimento'])
                      OR empty($_POST['telefone'])
                      OR empty($_POST['cep'])
                      OR empty($_POST['cidade'])
                      OR empty($_POST['uf'])
                      OR empty($_POST['rua'])
                      OR empty($_POST['numero'])
                      OR empty($_POST['senha'])) { //não preencheu os dados obrigatórios
                      $Erro = "<h5>Preencha os campo obrigatórios!</h5>";
                      echo "<script>alert('Preencha os campos obrigatórios para se cadastrar.')</script>";
                      echo "<script>window.location.href='signup.html'</script>";
                    } else { //preencheu corretamente
                      $nome      = $_POST['nome'];
                      $email     = $_POST['email'];
                      $cpf      = $_POST['cpf'];
                      $data_nascimento  = $_POST['data_nascimento'];
                      $telefone   = $_POST['telefone'];
                      $cep     = $_POST['cep'];
                      $cidade    = $_POST['cidade'];
                      $uf    = $_POST['uf'];
                      $rua    = $_POST['rua'];
                      $numero    = $_POST['numero'];
                      $complemento    = $_POST['complemento'];
                      $senha      = $_POST['senha'];
                      //inciar o cadastro

                      $sql = "INSERT INTO tbcliente 
                      (Nome,
                      EMail,
                      CPF,
                      DataNasc,
                      Telefone,
                      CEP,
                      Cidade,
                      UF,
                      Rua,
                      Num,
                      Complemento,
                      Senha) 
                      VALUES
                      ('$nome',
                      '$email',
                      '$cpf',
                      '$data_nascimento',
                      '$telefone',
                      '$cep',
                      '$cidade',
                      '$uf',
                      '$rua',
                      '$numero',
                      '$complemento',
                      '$senha')";
                      //inserção do dado
                      if (mysqli_query($conexao, $sql)) {
                        echo "<script>alert('Cliente cadastrado com sucesso')</script>";
                        echo "<script>window.location.href = 'signin.html'</script>";
                      } else {
                        echo "<script>alert('Erro ao cadastrar')</script>";
                      }
                    }
                  }
                }


    ob_end_flush();
?>