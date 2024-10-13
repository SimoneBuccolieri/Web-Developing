<?php
include 'connectDB.php';

#checklogin
$sql="SELECT * FROM credenziali WHERE user=  '" . $_POST["username"] . "'";
$result= $conn->query($sql);
if($result->fetch_assoc()){
    $sql = "SELECT * FROM credenziali WHERE user = '" . $_POST["username"] . "' AND password = '" . $_POST["password"] . "'";
    $result= $conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $id=$row['id'];
            $user=$row['user'];
            setcookie("sessionid",$id,time() + (86400 * 30),"/");
            setcookie("sessionuser",$user,time() + (86400 * 30),"/");
            echo "Login success";
            header('Location: index.php');
            #redirect to index with post data
            $conn->close();
            exit();
        }
    }
    else{
        $sql="SELECT * FROM credenziali WHERE user=  '" . $_POST["username"] . "'";
        $result= $conn->query($sql);
        
        if($row=$result->fetch_assoc()){
            header('Location: login.php'."?info=loginerrato");
            #login errato
            echo "Login Errato";
            $conn->close();
            exit();
    }
    }
}
else{
    $sql="INSERT INTO credenziali (user, password) VALUES ('" . $_POST["username"] . "', '" . $_POST["password"] . "')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrazione effettuata";
        header('Location: login.php'."?info=registrato");
        #registrazione effettuata
      } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
        $conn->close();
        exit();
}
#registrazione
?>