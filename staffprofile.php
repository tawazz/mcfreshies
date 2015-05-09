<?php
    session_start();
    include('phpFunc.php');
    echo"<h2>Staff Profile</h2>";
    if(isset($_SESSION['staffname'])){
        $username =$_SESSION['staffname'];
        $password = $_SESSION['staffpassword'];
        if(connect_db()){
            $query = "select * from Staff where username = '$username' AND password = '$password'";
            $profile = mysql_query($query);
            echo"<div class='border'>";
            while($row = mysql_fetch_array($profile)){
                echo "<label>StaffID</label>".$row['staffId'] . "</br>";
                echo "<label>UserName</label>".$row['username'] . "</br>";
                echo "<label>First Name</label>".$row['firstname'] . "</br>";
                echo "<label>Last Name</label>".$row['lastname'] . "</br>";
                echo "<label>Email</label>".$row['email']. "</br>";
                echo "<label>Address</label>".$row['address']. "</br>";
                      
            }
            echo"</div>";
        }

    }

?>

