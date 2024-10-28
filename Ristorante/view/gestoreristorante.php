<!DOCTYPE html>
<html lang="it">
     <body>
        <?php include 'navbar.php';?>
        <div class="center column bgphoto">
            <div class="container">
                <div class="column">
                    <h1>Modifica Menu</h1>
                    <form action="../Ristorante/gestoreristorante.php" method="POST">
                        <table>
                            <tr>
                                <th>Nome</th>
                                <th>Descrizione</th>
                                <th>Prezzo</th>
                                <th>Tipo</th>
                                <th>Delete</th>
                            </tr>
                            <?php 
                                foreach($piatti as $piatto){
                                    ?> 
                            <tr>
                                <td>
                                    <input type="text" name="<?php echo 'nome'.$piatto->getIdPiatto(); ?>"  value="<?php echo $piatto->getNomePiatto();?>">
                                </td>
                                <td>
                                    <input type="text" name="<?php echo 'descrizione'.$piatto->getIdPiatto(); ?>"  value="<?php echo $piatto->getDescrizionePiatto();?>">
                                    </td>
                                    <td>
                                    <input type="text" name="<?php echo 'prezzo'.$piatto->getIdPiatto(); ?>"  value="<?php echo $piatto->getPrezzoPiatto();?>">
                                    </td>
                                    <td>
                                    <input type="text" name="<?php echo 'type'.$piatto->getIdPiatto(); ?>"  value="<?php echo $piatto->getTypePiatto();?>">
                                    </td>
                                    <td>
                                    <button type="submit" name="delete" value="<?php echo $id; ?>" class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                            <?php
                                }
                                
                                ?>
                        </table>
                        <input type="hidden" name="update" value="">
                        <button type="submit" class="btn">Update</button>
                    </form>
                    
                </div>
            </div>
            <br>
            <div class="container">
                <div class="column">
                    <h2>Aggiungi al Menu</h2>
                    <form action="../Ristorante/gestoreristorante.php" method="POST">
                        <table>
                        <tr>
                                <th>Nome</th>
                                <th>Descrizione</th>
                                <th>Prezzo</th>
                                <th>Tipo</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="nomenew" >
                                </td>
                                <td>
                                    <input type="text" name="descrizionenew" >
                                </td>
                                <td>
                                    <input type="text" name="prezzonew" >
                                </td>
                                <td>
                                    <input type="text" name="typenew" >
                                </td>
                                    
                            </tr>
                        </table>
                                    <input type="hidden" name="add" value="">
                                    <button type="submit" class="btn">Aggiungi</button>
                    </form>
                </div>

            </div>
            <a href="../Ristorante/index.php" class="btn">Home</a>
        </div>
        <?php include 'footer.html';?>   
    </body>
</html>