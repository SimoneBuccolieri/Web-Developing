<!DOCTYPE html>
<html lang="it">
   <body>
   <?php include 'navbar.php';?>
      <div class="center bgphoto">
      <div class="container">
      <div class="column">
         <h1>Menu</h1>
         <table>
            <tr>
               <th>Nome</th>
               <th>Descrizione</th>
               <th>Prezzo</th>
               <th>Tipo</th>
               <th>Aggiungi al Cart
               </th>
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
                     <input type="hidden" name="add" value="<?php echo $piatto->getIdPiatto(); ?>">
                     <button type="submit" class="btn">Aggiungi al Carrello</button>
                  </form>
               </td>
            </tr>
            <?php
               }
               
               ?>
         </table>
         <a href="../Ristorante/carrello.php" class="btn">Carrello</a>
         <a href="../Ristorante/index.php" class="btn">Home</a>
      </div></div></div>
      <?php include 'footer.html';?>   
   </body>
</html>