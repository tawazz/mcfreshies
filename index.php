
<!DOCTYPE html>

<html lang="en"xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>McFreshies</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel="stylesheet" type="text/css" href="products.css"/>
        <link rel="stylesheet" type="text/css" href="navbar.css"/>
        <link rel="stylesheet" type="text/css" href="shop.css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="Validate.js"></script>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <a style="float: left;" href="index.php"><img alt="header" src="header.png" /></a>
                <?php
                    session_start();
                    if(isset($_SESSION['username'])){
                        $username =$_SESSION['username'];
                        echo "<div id=\"user\"> <a href='index.php?p=profile'>". $username."</a><a  href=\"logout.php\">LogOut</a></div>";

                    }
                ?>
            </div>
            <div id="nav">
                 <ul>
                    <li><a href="index.php">Home</a> </li>
                    <li><a href="index.php?p=about">About us</a></li>
                    <li><a href="index.php?p=contactus">Contact us</a> </li>
                    <li><a href="index.php?p=promo">Promotions</a> </li>
                    <li><a href="index.php?p=login">Login</a></li>
                </ul>
                <br/>
            </div>
            <div id="contents">
                <?php
                    // include the diffrent pages otherwise go to home
                    if(!empty($_GET['p'])){
                        $p = $_GET['p'];
                        include($p.".php");
                    }
                    else{
                        include("home.php");
                    }
                    
                ?>
                
            </div>
             <div id="cart">
                 <?php
                     if(empty($_GET['p'])){
                         //search history
                       $lastsearch = $_SESSION['lastsearch'];
                      echo "<div>";
                      echo "<h2>Search History</h2>";
                      echo "<a href='index.php?search=$lastsearch'>$lastsearch</a>";
                      echo "</div>";
                      //sort product menu
                      sort_prod();  
                      //display shopping cart
                      incart();
                      //choose site layout
                       echo "<div>";
                        echo "<h2>Choose Layout</h2>";
                        echo "<a href=\"index.php?inteface=True\">Random Layout</a>";   
                        echo "<a href=\"index.php?inteface=0\">3X3 Grid</a>";        
                        echo "</div>";

                        //need help
                        echo "<h2>Need Help</h2>";
                        echo "<a href='index.php?p=help'>Help</a>";
                    }
                 ?>
                

                
            </div>
           
            
        </div>
    </body>
</html>
