<?php
    include('phpFunc.php');

    if(isset($_POST['userreg']))
    {
        $name = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pcode = $_POST['pcode'];
        $address = $street ." ".$city. " ".$state." ".$pcode;
        if(connect_db()){

            $query = " Select * from Customer where CustName = '$name'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
    
            if($count > 0)
            {
                echo "choose another username";
            }
            else{
                $query1 = "select MAX(CustNo) AS ID from Customer";
                $result1 = mysql_query($query1);
                while($row= mysql_fetch_array($result1)){
                   $numOfUsers = $row['ID']+1;
                }
                
                $query2 = "insert into Customer values($numOfUsers,'$name','$password','$email','$address')";
                $addtodb = mysql_query($query2);
                //if staff session set
                //header('Location:staff.php?p=manageusers');
                //else 
                header('Location:index.php?p=login');
            }
        }
    }

    if(isset($_POST['staffreg'])){

        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $street = $_POST['street'];
        $surburb = $_POST['surburb'];
        $state = $_POST['state'];
        $pcode = $_POST['postcode'];
        $address = $street ." ".$surburb. " ".$state." ".$pcode;

        if(connect_db()){
            
            $query = " Select * from Staff where username = '$username'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
    
            if($count > 0)
            {
                echo "choose another username";
            }else{
                $query = "insert into Staff (firstname,lastname,username,password,address,email) values('$firstname','$lastname','$username','$password','$address','$email')";
                $addtodb = mysql_query($query);
                header('Location:staff.php?p=manageusers');
            }
        }
    }
?>
