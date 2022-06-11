<?php
    if (isset($_POST['username']) && isset($_POST['password']) 
        && isset($_POST['email']) && isset($_POST['repassword'])
        && !empty($_POST['username']) && !empty($_POST['password'])
        && !empty($_POST['email']) && !empty($_POST['repassword']))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email      = $_POST['email'];
        $isDoctor   = 0;

    } else {
        exit("please make sure to fill all the inputs.");
    }

    if ($password !== $repassword) {
        exit("sorry! passwords aren't same");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("the email is not in a correct format!");
    } 

    $db_serverName = "localhost";
    $db_username   = "root";
    $db_password   = "";
    $db_dbName     = "dentist";

    // Create connection
    $conn = new mysqli($db_serverName, $db_username, $db_password, $db_dbName);
    
    // Check connection
    if ($conn->connect_error) {
        exit("Database connection failed");
    }
    // Query
    $sql = "INSERT INTO users (username , password , email , isDoctor) VALUES ('$username', '$password', '$email', '$isDoctor')";

    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      
      $conn->close();
?>