<?php
    include('phpFunc.php');
    if(isset($_GET['edit'])){
    echo "hello";
        $id = $_GET['edit'];

        if(connect_db()){

            $query ="select * from Staff where staffId ='$id'";
            $get_staff= mysql_query($query);

            while($row = mysql_fetch_array($get_staff)){
                $name= $row['username'];
                $firstname= $row['firstname'];
                $lastname= $row['lastname'];
                $email = $row['email'];
                $address = $row['address'];
            }
            $split = explode(" ",$address);
        }else{
            header('Location:staff.php?p=manageusers');
        }
    }
?>

<h2>Update <?echo $firstname;?> Details</h2>
<div class="border">
<form name="regstaff" action="update.php" method="get" onsubmit="return staffupdate()">
    <label>firstname</label><input type="text" name="firstname" value="<?echo $firstname;?>"/><br>
    <label>lastname</label><input type="text" name="lastname" value="<?echo $lastname;?>"/><br>
    <label>username</label><input type="text" name="username" value="<?echo $username;?>" disabled/><br><br>
    <label>Old password</label><input type="password" name="oldpassword"/><br>
    <label>new password</label><input type="password" name="password"/><br>
    <label>confirm new password</label><input type="password" name="password2"/><br><br> 
    <label>email</label><input type="text" name="email" value="<?echo $email;?>"/><br>
    <label>street</label><input type="text" name="street" placeholder="street" value="<?echo $split[0]." ".$split[1]." ".$split[2];?>"/><br>
    <label>surburb</label><input type="text" name="surburb" placeholder="surburb" value="<?echo $split[3];?>"/><br>
    <label>state</label><input type="text" name="state" placeholder="state" value="<?echo $split[4];?>"/><br>
    <label>postcode</label><input type="text" name="postcode" placeholder="postcode" value="<?echo $split[5];?>"/><br>
    <input type="hidden" name="staffupdate" value="staffupdate"/>
    <input type="hidden" name="staffId" value="<?echo $id;?>"/>
    <input type="submit" value="UPDATE"/>
</form>
    </div>
