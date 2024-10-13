<?php
include 'connectDB.php';
include 'Event.php';
$sql="SELECT oggetto,data,id FROM agenda2 WHERE user_id='".$_COOKIE["sessionid"]."' AND data >= NOW()";
$result = $conn->query($sql);
?> 
    <div class="centeredTitle">
        <p>Eventi in Programma</p>
    </div>
    <div class="centeredTitle">
        <p>Evento</p>
        <p>Data</p>
        <p>Delete event</p>
    </div>
    <?php
if($result->num_rows>0){

    #a oggetti
    while($row=$result->fetch_assoc()){
        ?>
        
        <div class="centered">
        <p>
            <?php echo $row["oggetto"];?>
        </p>
        
        <p>
            <?php echo date('d/m/Y H:i', strtotime($row["data"]));?>
        </p>
        <form action="removeDB.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Delete">
        </form>
        </div>
        <?php
        #echo "oggetto: " . $row["oggetto"] . " - Data: " . $row["data"] . "<br>";
        
    }
    
}
else{
    ?> 
        <p class="centered">No Result</p>
    <?php
}
$conn->close();    
?>

