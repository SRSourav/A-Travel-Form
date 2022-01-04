<?php


    $insert = false;

    if(isset($_POST['name'])){
    // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "coxtrip";

    // Create a database connection
        $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());

    }


    // echo "Success connecting to the db";

    // Collect post variables

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    

    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc')";
    // echo $sql;

    // Execute the query
    if( mysqli_query($con, $sql) ){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to the Annual Cox's Bazar Tour</h3>
        <p>Enter your details and submit this form to confirm your participation in the Tour </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the Cox's Bazar Tour</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
