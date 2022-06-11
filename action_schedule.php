<?php
        if (isset($_POST['date']) && isset($_POST['time']) 
        && !empty($_POST['date']) && !empty($_POST['time']))
    {
        $date   = $_POST['date'];
        $time   = $_POST['time'];
        $doctor = "";
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
    // Query
    $sql = "SELECT * FROM dentist.schedule WHERE date='$date' and time='$time'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        // update row ...
        $update_query = "UPDATE dentist.schedule SET username='jafar', isReserved=1;";
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