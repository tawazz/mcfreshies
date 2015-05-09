<?php
include('phpFunc.php');    
$name = $_GET['product'];
$price =$_GET['price'];
$cat = $_GET['cat'];
$id = $_GET['id'];

if(isset($_GET['edit'])){
    if(connect_db()){

        $query= "select id from category where name = '$cat'";
        $get_id = mysql_query($query);
        while($row= mysql_fetch_array($get_id)){
            $cat = $row['id'];
        }
        
        $query = "update products set price ='$price', name = '$name' , catId='$cat' where id ='$id'";
        mysql_query($query);
    }
    header('Location:staff.php?p=manageproducts&m=edit_products');
}

if(isset($_GET['add'])){
    
    if (connect_db()){
    $query = "select MAX(id) AS ID from products";
    $result = mysql_query($query);
    while($row= mysql_fetch_array($result)){
        $numOfProducts = $row['ID']+1;
    }

    $catquery= "select id from category where name = '$cat'";
    $get_id = mysql_query($catquery);
    while($row= mysql_fetch_array($get_id)){
        $cat = $row['id'];
    }
    $query = "insert into products values($numOfProducts,'$name',$price,$cat)";
    mysql_query($query);
    
    }
    header('Location:staff.php?p=manageproducts');
}

if(isset($_GET['userupdate'])){

    $oldpassword = $_GET['oldpassword'];
    $password = $_GET['password'];
    $address = $_GET['street']." ".$_GET['city']." ".$_GET['state']." ".$_GET['pcode'];
    $email = $_GET['email'];
    $CustNo =$_GET['CustNo'];

   

    if(connect_db()){

         if(strlen($oldpassword)>0){ 

             $query = "select * from Customer where Password = '$oldpassword' and CustNo ='$CustNo'";
             $result = mysql_query($query);
             $count = mysql_num_rows($result);
             if($count === 1){
                 $query = "update Customer set Password = '$password' where CustNo= '$CustNo'";
                 mysql_query($query);
             }else{
                header('Location:staff.php?p=manageusers&m=updateCust&edit='.$CustNo.'&error=1');   
             }
         }elseif(strlen($email)>0){ 
             $query = "update Customer set Email = '$email'where CustNo= '$CustNo'";
             mysql_query($query);
         }elseif(strlen($address)>0){ 
             $query = "update Customer set Address = '$address' where CustNo= '$CustNo'";
             mysql_query($query);
         }else{
             header('Location:staff.php?p=manageusers');
         }
         echo "Updated <a href='staff.php?p=manageusers'>back</a>";
          //header('Location:staff.php?p=manageusers');
    }

}

if(isset($_GET['staffupdate'])){
    $firstname =$_GET['firstname'];
    $lastname =$_GET['lastname'];
    $password = $_GET['password'];
    $address = $_GET['street']." ".$_GET['surburb']." ".$_GET['state']." ".$_GET['pcode'];
    $email = $_GET['email'];
    $id =$_GET['staffId'];

   

    if(connect_db()){
         if(strlen($password)>0){ 
             $query = "update Staff set password = '$password' where staffId= '$id'";
             mysql_query($query);
         }
         if(strlen($email)>0){ 
             $query = "update Staff set email = '$email'where staffId = '$id'";
             mysql_query($query);
         }
         if(strlen($address)>0){ 
             $query = "update Staff set address = '$address' where staffId = '$id'";
             mysql_query($query);
         }
         if(strlen($firstname)>0){ 
             $query = "update Staff set firstname = '$firstname' where staffId= '$id'";
             mysql_query($query);
         }
         if(strlen($lastname)>0){ 
             $query = "update Staff set lastname = '$lastname' where staffId= '$id'";
             mysql_query($query);
         }
         header('Location:staff.php?p=manageusers');
    }
    

}



?>

