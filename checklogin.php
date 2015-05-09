<?php
    session_start();
    include('phpFunc.php');

    $name = $_POST['username'];
    $password = $_POST['password'];

if(isset($_POST['user'])){
    if(connect_db()){
        $query = " Select * from Customer where CustName = '$name'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if($count > 0){
            $query = " Select * from Customer where CustName = '$name' AND Password = '$password'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count === 1){
                while($row = mysql_fetch_array($result))
                {
                    $_SESSION['username'] =  $row['CustName'];
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['custno']= $row['CustNo'];
                    header('Location: index.php');
                }
            }else{
                echo "wrong username or password";
                header('Location: index.php?p=login');
            }
        
        }
        else{
            echo "wrong username or password";
            header('Location: index.php?p=login');
        }
    }
        mysql_free_result($result);
        mysql_close();
}

if(isset($_POST['staff'])){
    if(connect_db()){
        $query = " Select * from Staff where username  = '$name'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if($count > 0){
            $query = " Select * from Staff where username = '$name' AND password = '$password'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count === 1){
                while($row = mysql_fetch_array($result))
                {
                    $_SESSION['staffname'] =  $row['username'];
                    $_SESSION['staffpassword'] = $row['password'];
                    $_SESSION['staffId'] = $row['staffId'];
                    header('Location: staff.php');
                }
            }else{
                echo "wrong username or password";
            }
        
        }
        else{
            echo "wrong username or password";
        }
    }
        mysql_free_result($result);
        mysql_close();
}

    
?>
