<?php

include('phpFunc.php');
// show searched users
if(!empty($_GET['search'])){
    $search = $_GET['search'];
    $query = "select CustName,CustNo from products where CustName LIKE '%$search%'";
}else{
    //show all users
    $query = "select * from Customer";
}
if(connect_db()){
    echo "<ul>";
        
        $result = mysql_query($query);
        while($row = mysql_fetch_array($result)){
            echo "<li>";
            echo "<span> UserName : ".$row['CustName']." <br>CustNo : ".$row['CustNo']."<br>Password : ".$row['Password']."</span><br>";
             echo "<a href='staff.php?p=manageusers&m=updateCust&edit=".$row['CustNo']."'>Edit</a><a class='delete' href='delete.php?Custdelete=".$row['CustNo']."'>Delete</a><br/>";
            echo "</li>";
        }
        echo"</ul>";
}
?>

