<?php
    session_start();
    
    if (isset($_POST['username']) && isset($_POST['password']) 
        && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
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
    $sql = "SELECT * FROM dentist.users WHERE username='$username' and password='$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        // in here we are sure that some one has login successfully
        $_SESSION['hasLogin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['userType'] = $row['isDoctor'];
        ?>
            <script text="text/javascript">
                location.replace('schedule.php')
            </script>
        <?php
    } else {
        echo "Sorry, no user founded ;(";
    }
    mysqli_free_result($result);  
    mysqli_close($conn);
?>