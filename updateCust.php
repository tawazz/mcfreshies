<?php
    
include('phpFunc.php');
    
if(isset($_GET['edit'])){
    $CustNo = $_GET['edit'];
        if(connect_db()){
            $query ="select * from Customer where CustNo ='$CustNo'";
            $get_products= mysql_query($query);
           
            while($row = mysql_fetch_array($get_products)){
                $name= $row['CustName'];
                $email = $row['Email'];
                $address = $row['Address'];
            }
        $split = explode(" ",$address);
        }else{
            header('Location:staff.php?p=manageusers');
        }
}
   
?>
    <h2>Update <? echo $name;?> Details</h2>
    <div class="border">
    <form method="get" action="update.php" name="reg" onsubmit="return check()">
        <label>User Name</label><input type="text" name="username" value="<?echo $name;?>" disabled></br>
        </br><label style="text-align: center;">Change password</label></br></br>
        <label>Old Password</label><input type="password" name="oldpassword" >
<?
    if(isset($_GET['error']))
    {
        echo "<label style='color:red; text-align:center;'>wrong old password</label>";
    }
?></br>
        <label>New Password</label><input type="password" name="password" placeholder="minimum 6 characters"></br>
        <label>Confirm Password</label><input type="password" name="password1" placeholder="minimum 6 characters"></br>
        </br><label>Email</label><input type="email" name="email" value="<?echo $email;?>"></br>
        <label>Address</label><input type="text" placeholder="street" name="street" value="<?echo $split[0]." ".$split[1]." ".$split[2];?>"></br>
        <label></label><input type="text" placeholder="city" name="city" value="<?echo $split[3];?>"></br>
        <label></label><input type="text" placeholder="state" name="state" value="<?echo $split[4];?>"></br>
        <label></label><input type="text" placeholder="post code" name="pcode" value="<?echo $split[5];?>"></br></br>
        <input type="hidden" name="userupdate" value="userupdate"/>
        <input type="hidden" name="CustNo" value="<?echo $CustNo;?>"/>
        <input type="submit" value="UPDATE">
    </form>
</div>