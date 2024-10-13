<?php
    include 'connectDB.php';

    $sql = "DELETE FROM agenda2 WHERE id='{$_POST["id"]}'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      
      $conn->close();
      header('Location: index.php');
      exit();
?>