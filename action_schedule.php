<?php
    session_start();

        if (isset($_POST['date']) && isset($_POST['time']) 
        && !empty($_POST['date']) && !empty($_POST['time'])
        && isset($_POST['doctor']) && !empty($_POST['doctor']))
    {
        $date   = $_POST['date'];
        $time   = $_POST['time'];
        $doctor = $_POST['doctor'];
    } else {
        exit("please make sure to fill all the inputs.");
    }

    $db_serverName = "localhost";
    $db_username   = "root";
    $db_password   = "";
    $db_dbName     = "dentist";
    // Create connection
    $conn = new mysqli($db_serverName, $db_username, $db_password, $db_dbName);
    
    // Check connection
    if (mysqli_connect_errno()) {
        exit("Database connection failed");
    }
    
    // Check that the user is doctor
    if ($_SESSION['userType'] === "1") {
        $searchQuery = "SELECT * FROM dentist.schedule WHERE date='$date' and time='$time'";
        // var_dump($_POST['date']);
        $result = mysqli_query($conn, $searchQuery);
        $row = mysqli_fetch_array($result);
        
        // if there is no such of this date in db then we can insert it 
        if (!$row) {
        $insertQuery = "INSERT INTO dentist.schedule (date, time, doctor, username, isReserved) VALUES ('$date', '$time', '$doctor', '', 0);";
        
        if ($conn->query($insertQuery) === true) {
            echo "The record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "there is a row in db with the same value";
    }
    mysqli_close($conn);
    exit();
    }

    // Query
    $sql = "SELECT * FROM dentist.schedule WHERE date='$date' and time='$time'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        // update row ...
        $username = $_SESSION['username'];
        $update_query = "UPDATE dentist.schedule SET username='$username', isReserved=1;";
        if ($conn->query($update_query) === true) {
            echo "The record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        ?>

        <!-- //     <script text="text/javascript"> -->
        <!-- //         location.replace('userpage.php') -->
        <!-- //     </script> -->

        <?php

    } else {
        echo "Sorry, no time founded ;(";
    }

    mysqli_free_result($result);
    mysqli_close($conn);

?>