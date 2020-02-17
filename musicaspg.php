              <h2 class="font-thin m-b">Confira todas as nossas músicas! <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
              <?php
                  $sql = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor ORDER BY NomeMusica";

                  $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));//guarda o resultado da consulta

                  if (mysqli_num_rows($result) > 0) {
                    ?>
                    <table class="table table-striped">
                      <tr>
                        <th></th>
                        <th>MÚSICA</th>
                        <th>CANTOR</th>
                        <th>ÁLBUM</th>
                        <th>ANO</th>
                        <th>GÊNERO</th>
                        <th>COMPOSITOR</th>
                      </tr>
                    <?php
                    while ($musica = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                        <td align="center"><a href="?pg=musicas&id=<?php echo $musica['idMusica'] ?>"><img src="uploads/<?php echo $musica['nomeCapa'] ?>" alt="Capa" class="img-circle" style="width: 30px; height: 30px"></a></td>
                        <td><a href="?pg=musicas&id=<?php echo $musica['idMusica'] ?>"><?php echo $musica['NomeMusica'] ?></a></td>
                        <td><a href="?pg=cantores&id=<?php echo $musica['idCantor'] ?>"><?php echo $musica['NomeCantor'] ?></a></td>
                        <td><a href="?pg=albuns&id=<?php echo $musica['idAlbum'] ?>"><?php echo $musica['NomeAlbum'] ?></a></td>
                        <td><?php echo $musica['Lancamento'] ?></td>
                        <td><a href="generospg.php?pg=generospgx&id=<?php echo $musica['idGenero'] ?>"><?php echo $musica['NomeGenero'] ?></a></td>
                        <td><?php echo $musica['NomeCompositor'] ?></td>
                        </tr>
                        </tr>
                      <?php
                    }
                      ?>
                      </table>
                    </form>
                    <?php
                  }
                  ?>
                  </p>
                  </p>