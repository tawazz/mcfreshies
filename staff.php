<?php
    session_start();
    
    if(isset($_SESSION['staffname'])){
        $username = $_SESSION['staffname'];
    }else{
        header('Location: index.php?p=stafflogin');
    }    

?>
<!DOCTYPE html>

<html lang="en"xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>McFreshies - staff</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="staffnavbar.css"/>
        <link rel="stylesheet" type="text/css" href="shop.css"/>
        <script src="Validate.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <a href="index.php"><img alt="header" src="header.png" /></a>
            </div>
            <div id="nav">
                 <ul>
                    <li><a href="staff.php">Home</a> </li>
                    <li><a href="staff.php?p=manageusers">Manage Users</a></li>
                    <li><a href="staff.php?p=manageproducts">Manage Products</a> </li>
                    <li><a href="staff.php?p=logout">LogOut</a>
                 </ul>
                <br/>
            </div>
            <div id="contents">
                <?php
                    if(!empty($_GET['p'])){
                        $p = $_GET['p'];
                        include($p.".php");
                    }
                    else{
                        include("staffprofile.php");
                    }
                ?>
                
            </div>
        </div>
    </body>
</html>
