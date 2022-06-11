<?php
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
    // var_dump($result);
    if ($result == true) {
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            ?>
                <script text="text/javascript">
                    location.replace('index.php')
                </script>
            <?php
        } else {
            echo "Sorry, no user founded ;(";
        }
        mysqli_free_result($result);
    } 
    mysqli_close($conn);
?>