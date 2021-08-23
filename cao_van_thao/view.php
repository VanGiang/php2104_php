<?php
 include_once 'connection.php';

 if (isset($_POST['submit'])) {
     if (isset($_POST['name'])
     && isset($_POST['email'])
     && isset($_POST['phone'])
     && isset($_POST['address'])
     ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $sql = "INSERT INTO $table (name,email,phone,address)
        VALUES ('$name', '$email', '$phone', '$address')";
        
        if ($conn->query($sql) === TRUE) {
          echo "";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }        
    }    
}
?>