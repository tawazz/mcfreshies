<?php
    
include('phpFunc.php');
// show all products
if(!empty($_GET['search'])){
    $search = $_GET['search'];
    $query = "select name,price,id from products where name LIKE '%$search%'";
}else{
    $query = "select * from products";
}
if(connect_db()){
    echo "<ul>";
        
        $result = mysql_query($query);
        while($row = mysql_fetch_array($result)){
            echo "<li>";
            echo "<span>".$row['name']."</span><br>";
             echo "<a href='staff.php?p=manageproducts&m=updateform&edit=".$row['id']."'>Edit</a><a class='delete' href='delete.php?delete=".$row['id']."'>Delete</a><br/>";
            echo "</li>";
        }
        echo"</ul>";
}

?>


