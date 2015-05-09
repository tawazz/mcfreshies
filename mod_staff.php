<?php

include('phpFunc.php');
// show searched staff
if(!empty($_GET['search'])){
    $search = $_GET['search'];
    $query = "select * from Staff where username LIKE '%$search%' OR firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
}else{
    //show all staff
    $query = "select * from Staff";
}
if(connect_db()){
    echo "<ul>";
        
        $result = mysql_query($query);
        while($row = mysql_fetch_array($result)){
            echo "<li>";
            echo "<span> Name : ".$row['firstname']." ".$row['lastname']."</span><br>";
            echo "<span> UserName : ".$row['username']." <br>StaffID : ".$row['staffId']."</span><br>";
             echo "<a href='staff.php?p=manageusers&m=updateStaff&edit=".$row['staffId']."'>Edit</a><a class='delete' href='delete.php?staffdelete=".$row['staffId']."'>Delete</a><br/>";
            echo "</li>";
        }
        echo"</ul>";
}
?>

