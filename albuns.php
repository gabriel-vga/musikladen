<?php 


$id = $_GET['id'];

require ("conexao.php");

$consulta = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor AND idAlbum = '$id' ORDER BY Faixa";

$album = "SELECT * FROM tbAlbum WHERE idAlbum = '$id'";
$exec_consulta2 = mysqli_query($conexao,$album);
      
$exec_consulta = mysqli_query($conexao,$consulta);

if (mysqli_num_rows($exec_consulta) > 0) {
  ?>
<?php
  while ($linhas2 = mysqli_fetch_assoc($exec_consulta2)) {
?>
<br>
  <div class="container" align="center">
    <div class="col-md-9 hbox v-middle" align="center">
        <div class="thumbnail">
          <a href="index.php?pg=albuns&id=<?php echo $linhas2['idAlbum'] ?>">
          <img src="uploads/<?php echo $linhas2['nomeCapa'] ?>" alt="Álbum" class="img-thumbnail" style="width: 300px; height: 300px">
          <div class="caption">
            <h3 align="center"><b><?php echo $linhas2['NomeAlbum'] ?></b></h3>
          </div>
          </a>
        </div>
<?php
 }
?>
  <table class="table table-striped">
                      <tr>
                        <th><h5 align="center">FAIXA</h5></th>
                        <th><h5 align="center">MÚSICA</h5></th>
                        <th><h5 align="center">OUVIR/DOWNLOAD</h5></th>
                      </tr>
  <?php
  while ($linhas = mysqli_fetch_assoc($exec_consulta)) {
    /*
    echo $linhas['prod_id'] . " " . $linhas['prod_nome'] . 
       " " . $linhas['img_nome'] . "<br>";
      */
      ?>
      <!---<img src="uploads/<?php //echo $linhas['NomeMusica'] ?>" alt="Imagem" style="width: 80px; height: auto"><br>-->
          <tr>
          <td align="center"><?php echo $linhas['Faixa'] ?></td>
          <td align="center"><a href="index.php?pg=musicas&id=<?php echo $linhas['idMusica'] ?>"><b><?php echo $linhas['NomeCantor'] ?></b> - <?php echo $linhas['NomeMusica'] ?></a></td>
          <td><audio controls style="width: 100%">
              <source src="uploads/<?php echo $linhas['NomeAudio'] ?>" type="audio/mpeg">
          </audio>
          </td>
          </tr>
          </tr>
      
      <?php
  }
  ?>

  </div>
  <?php
}
?>