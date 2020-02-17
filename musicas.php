<?php 


$id = $_GET['id'];

require ("conexao.php");

$consulta = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor AND idMusica = '$id'";
      
$exec_consulta = mysqli_query($conexao,$consulta);

if (mysqli_num_rows($exec_consulta) > 0) {
  ?>
<br>
  <div class="container" align="center">
  <?php
  while ($linhas = mysqli_fetch_assoc($exec_consulta)) {
    /*
    echo $linhas['prod_id'] . " " . $linhas['prod_nome'] . 
       " " . $linhas['img_nome'] . "<br>";
      */
      ?>
      <!---<img src="uploads/<?php //echo $linhas['NomeMusica'] ?>" alt="Imagem" style="width: 80px; height: auto"><br>-->
      
        <div class="col-md-9 hbox v-middle" align="center">
        <div class="thumbnail">
          <a href="index.php?pg=albuns&id=<?php echo $linhas['idAlbum'] ?>">
          <img src="uploads/<?php echo $linhas['nomeCapa'] ?>" alt="Álbum" class="img-thumbnail" style="width: 300px; height: 300px">
          <div class="caption">
            <h5 align="center"><?php echo $linhas['NomeAlbum'] ?></h5>
          </div>
          </a>
          <audio controls style="width: 100%">
              <source src="uploads/<?php echo $linhas['NomeAudio'] ?>" type="audio/mpeg">
          </audio>
          <a href="index.php?pg=musicas&id=<?php echo $linhas['idMusica'] ?>">
          <h4><b><?php echo $linhas['NomeMusica'] ?></b></h4>
          </a>
          <a href="index.php?pg=cantores&id=<?php echo $linhas['idCantor'] ?>">
          <p><?php echo $linhas['NomeCantor'] ?></p>
          </div>
          </a>
        </div>
      
      <?php
  }
  ?>

  </div>
  <?php
}
?>