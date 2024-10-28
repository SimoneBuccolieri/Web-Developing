<!DOCTYPE html>
<html lang="it">
   <body>
   <?php include 'navbar.php';?>
      <div class="center bgphoto">
      <div class="container">
      <div class="column">
         <h1>Ordini</h1>
         <table>
            <tr>
               <th>Ordine n*</th>
               <th>Piatti</th>
               <th>Prezzo</th>
               <th>Data e Ora</th>
               <th>Stato</th>
            </tr>
            <?php 
               foreach($ordini as $ordine){
                   ?> 
            <tr>
               <td><?php echo $ordine->getIdOrdine();?></td>
               <td><?php 
                  $piatti=$ordine->getPiatti();
                  foreach($piatti as $piatto){
                       echo $piatto->getNomePiatto()." ";
                  }
                  ?></td>
               <td><?php 
                  $prezzo=0;
                  $piatti=$ordine->getPiatti();
                  foreach($piatti as $piatto){
                      $prezzo+=$piatto->getPrezzoPiatto();
                      
                  }
                  echo $prezzo;?></td>
                  <td><?php 
                  
                  echo $ordine->getDateTime();?></td>
               <td><?php echo $ordine->getStato();?></td>
            </tr>
            <?php
               }
               
               ?>
         </table>
         <a href="../Ristorante/menu.php" class="btn">menu</a>
         <a href="../Ristorante/index.php" class="btn">Home</a>
      </div></div></div>
      <?php include 'footer.html';?>   
   </body>
</html>