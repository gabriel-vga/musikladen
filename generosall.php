                <h2 class="font-thin m-b">Músicas de todos os gêneros</h2>
                   <div class="row row-sm">
                   <?php
                        $sql = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor ORDER BY NomeMusica";

                        $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));//guarda o resultado da consulta

                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <?php
                        while ($musica = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-sm-4 ">
                          <div class="item">
                            <div class="pos-rlt">
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                </div>
                              </div>
                              <a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>"><img src="uploads/<?php echo $musica['nomeCapa'] ?>" alt="Capa" class="r r-2x img-full" style="width: 100%; height: auto"></a>
                            </div>
                            <div class="padder-v">
                              <a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis"><?php echo $musica['NomeCantor'] ?> - <?php echo $musica['NomeMusica'] ?></a>
                              <a href="index.php?pg=albuns&id=<?php echo $musica['idAlbum'] ?>" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis text-xs text-muted"><?php echo $musica['NomeAlbum'] ?></a>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        }
                        ?>
                        </div>