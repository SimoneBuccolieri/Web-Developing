<!DOCTYPE html>
<html lang="it">
   <body>
   <?php include 'navbar.php';?>
      <div class="center bgphoto">
      <div class="container">
      <div class="column">
         <h1>Carrello</h1>
         <table>
            <tr>
               <th>Nome</th>
               <th>Descrizione</th>
               <th>Prezzo</th>
               <th>Tipo</th>
               <th>Remove</th>
            </tr>
            <?php 
               foreach($piatti as $piatto){
                   ?> 
            <tr>
               <td><?php echo $piatto->getNomePiatto();?></td>
               <td><?php echo $piatto->getDescrizionePiatto();?></td>
               <td><?php echo $piatto->getPrezzoPiatto();?></td>
               <td><?php echo $piatto->getTypePiatto();?></td>
               <td>
                  <form action="" method="POST">
                     <input type="hidden" name="rem" value="<?php echo $piatto->getIdPiatto(); ?>">
                     <button type="submit" class="btn">Remove from Carrello</button>
                  </form>
               </td>
            </tr>
            <?php
               }
               
               ?>
         </table>
         <?php if($piatti != NULL){ ?>
         <form action="../Ristorante/ordini.php" method="POST">
            <input type="hidden" name="order" value="">
            <button type="submit" class="btn">Invia Ordine</button>
         </form>
         <?php
            }
            
            ?>
         <a href="../Ristorante/menu.php" class="btn">menu</a>
         <a href="../Ristorante/index.php" class="btn">Home</a>
      </div></div></div>
      <?php include 'footer.html';?>   
   </body>
</html>