              <h2 class="font-thin m-b">ÁLBUNS</h2>
                      <div class="row row-sm">
                        <?php
                        $sql = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor ORDER BY NomeMusica";

                        $album = "SELECT * FROM tbAlbum ORDER BY NomeAlbum";

                        $result2 = mysqli_query($conexao,$album);
                        $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));//guarda o resultado da consulta

                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <?php
                        while ($musica = mysqli_fetch_assoc($result2)) {
                        ?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                          <div class="item">
                            <div class="pos-rlt">
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                  </div>
                              </div>
                              <a href="index.php?pg=albuns&id=<?php echo $musica['idAlbum'] ?>"><img src="uploads/<?php echo $musica['nomeCapa'] ?>" alt="capa" class="r r-2x img-full"></a>
                            </div>
                            <div class="padder-v">
                              <a href="index.php?pg=albuns&id=<?php echo $musica['idAlbum'] ?>" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis"><?php echo $musica['NomeAlbum'] ?></a>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        }
                        ?>
                        </div>