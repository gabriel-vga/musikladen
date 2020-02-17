              <h2 class="font-thin m-b">Aproveite nossas músicas mais recentes! <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                  <div class="row row-sm">
                  <?php
                        $sql = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor ORDER BY DataCadMusica DESC LIMIT 12";

                        $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));//guarda o resultado da consulta

                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <?php
                        while ($musica = mysqli_fetch_assoc($result)) {
                  ?>
                    <div class="col-xs-6 col-sm-4 col-md-3">
                      <div class="item">
                        <div class="pos-rlt">
                          <div class="bottom">
                          </div>
                          <div class="item-overlay opacity r r-2x bg-black">
                            <div class="text-info padder m-t-sm text-sm">
                            </div>
                            <div class="center text-center m-t-n">
                            </div>
                          </div>
                          <a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>"><img src="uploads/<?php echo $musica['nomeCapa'] ?>" alt="capa" class="r r-2x img-full"></a>
                        </div>
                        <div class="padder-v">
                          <a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>" class="text-ellipsis"><?php echo $musica['NomeMusica'] ?></a>
                          <a href="index.php?pg=cantores&id=<?php echo $musica['idCantor'] ?>" class="text-ellipsis text-xs text-muted"><?php echo $musica['NomeCantor'] ?></a>
                        </div>
                      </div>
                    </div>
                    <?php
                      }
                      }
                    ?>
                  </div>