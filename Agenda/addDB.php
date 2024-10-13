<?php 
include 'connectDB.php';

if(isset($_COOKIE['sessionid'])){
  $sql = "INSERT INTO agenda2 (user_id,oggetto, data)
  VALUES ('{$_COOKIE['sessionid']}','{$_POST["oggetto"]}', '{$_POST["data"]}')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


$conn->close();
header('Location: index.php');
?>
