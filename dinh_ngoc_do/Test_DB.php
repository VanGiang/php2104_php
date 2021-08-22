<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test_DB</title>
</head>
<body>
    <?php 
    
    if (isset($_POST["register"])) {
        $servername = "localhost";
        $username = "root";
        $password = "01633830654";
        $dbname = "dinhngocdo";
        
        //Create connection 
        $coon = new mysqli($servername, $username, $password, $dbname);
        
        //Check connection
        if ($coon->connect_error) {
            die ("Connection failed: " . $coon->connect_error);
        }

        //Post Data
        $firstName = isset($_POST["firstname"]) ?  $_POST["firstname"] : " ";
        $lastName = isset($_POST["lastname"]) ?  $_POST["lastname"] : " ";
        $sex = isset($_POST["gender"]) ?  $_POST["gender"] : " ";
        $age = isset($_POST["age"]) ?  $_POST["age"] : " ";
        $email = isset($_POST["email"]) ?  $_POST["email"] : " ";

        //Insert Register Data
        if ($firstName == "" || $lastName == "" || $sex == "" || $age == "" || $email == "") {
            echo '<script> alert("Vui lòng điền đầy đủ thông tin"); </script>';
        } else {
            $sql = "INSERT INTO do_test1 (first_name, last_name, sex, age, email)
            VALUES ('$firstName', '$lastName', '$sex', '$age', '$email')";
            /* var_dump($sql);die; */
        }

        if ($coon->query($sql) === TRUE) {
            echo '<script> alert("Register Successfuly"); </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $coon->error;
        }
    
        $coon->close();
    }
    ?>
    <form action="Test_DB.php" method="POST">
        <div class="field">
            <label for="">First Name</label>
            <input type="text" name="firstname" placeholder="Enter First Name...">
        </div>
        <div class="field">
            <label for="">Last Name</label>
            <input type="text" name="lastname" placeholder="Enter Last Name...">
        </div>
        <div class="field-radio">
            <label for="">Sex</label>
            <input type="radio" name="gender" id="male" value="Male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="Female">
            <label for="female">Female</label>
        </div>
        <div class="field">
            <label for="">Age</label>
            <input type="number" name="age">
        </div>
        <div class="field">
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div class="button">
            <input type="submit" name="register">
        </div>
    </form>
</body>
</html>