<?php
    include 'connectDB.php';
    $sql="SELECT oggetto,data FROM agenda2 WHERE user_id='".$_COOKIE["sessionid"]."'AND data < NOW() ";
    $result = $conn->query($sql);
    
?>
    <div class="centeredTitle"><p>Eventi Passati</p></div>
    
    <div class="centeredTitle">
        <p>Oggetto</p>
        <p>Data</p>
    </div>
<?php
if($result->num_rows>0){
    
    while($row=$result->fetch_assoc()){
        ?>
        <div class="centered">
        <p>
            <?php echo $row["oggetto"];?>
        </p>
        
        <p>
            <?php echo date('d/m/Y H:i', strtotime($row["data"]));?>
        </p>
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