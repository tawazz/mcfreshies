<?php
    session_start();
    include('phpFunc.php');

    if(isset($_SESSION['username'])){
        $username =$_SESSION['username'];
        $password = $_SESSION['password'];
        $id = $_SESSION['custno'];

        echo "<h2> Profile</h2>";

        if(connect_db()){
            $query = "select * from Customer where CustName = '$username' AND Password = '$password'";
            $profile = mysql_query($query);
            echo"<div class='border'>";
            while($row = mysql_fetch_array($profile)){
                echo "<label>UserName</label>".$row['CustName'] . "</br>";
                echo "<label>email</label>".$row['Email']. "</br>";
                echo "<label>address</label>".$row['Address']. "</br>";
                      
            }
            echo"<a href='index.php?p=updateCust&edit=$id'>Edit Profile<a/>";
            echo"</div>";
        }
    }



?>

