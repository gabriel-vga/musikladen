               <?php 


                $id = $_GET['id'];

                require ("conexao.php"); 

                        $consulta = "SELECT * FROM tbmusica JOIN tbfornecedor ON idmForn = idFornecedor JOIN tbgenero ON idmGenero = idGenero JOIN tbalbum ON idmAlbum = idAlbum JOIN tbcantor ON idmCantor = idCantor JOIN tbcompositor ON idmCompositor = idCompositor AND idmCantor = '$id' ORDER BY NomeMusica";
                        
                        $cantor = "SELECT * FROM tbCantor WHERE idCantor = '$id'";
                        $exec_consulta2 = mysqli_query($conexao,$cantor);
                          
                        $exec_consulta = mysqli_query($conexao,$consulta);

                        if (mysqli_num_rows($exec_consulta) > 0) {
                ?>
                <?php
                while ($musica2 = mysqli_fetch_assoc($exec_consulta2)) {
                  ?>
                <h2 class="font-thin m-b"><?php echo $musica2['NomeCantor'] ?></h2>
                <?php
                }
                ?>
                   <div class="row row-sm">
                   
                        <?php
                        while ($musica = mysqli_fetch_assoc($exec_consulta)) {
                        ?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                          <div class="item">
                            <div class="pos-rlt">
                              <div class="item-overlay opacity r r-2x bg-black">
                                <div class="center text-center m-t-n">
                                </div>
                              </div>
                              <a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>"><img src="uploads/<?php echo $musica['nomeCapa'] ?>" alt="Capa" class="r r-2x img-full" style="width: 100%; height: auto"></a>
                            </div>
                            <div class="padder-v">
                              <a href="index.php?pg=musicas&id=<?php echo $musica['idMusica'] ?>" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis"><?php echo $musica['NomeMusica'] ?></a>
                              <a href="index.php?pg=albuns&id=<?php echo $musica['idAlbum'] ?>" data-bjax data-target="#bjax-target" data-el="#bjax-el" data-replace="true" class="text-ellipsis text-xs text-muted"><?php echo $musica['NomeAlbum'] ?></a>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        }
                        ?>
                        </div>