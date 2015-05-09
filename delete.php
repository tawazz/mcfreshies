<?php
    include('phpFunc.php');

    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];

        if(connect_db()){
            $query = "delete from products where id ='$id'";
            mysql_query($query);
            header('Location:staff.php?p=manageproducts&m=edit_products');
        }
    }

    if(isset($_GET['Custdelete']))
    {
        $id = $_GET['Custdelete'];

        if(connect_db()){
            $query = "delete from Customer where CustNo ='$id'";
            mysql_query($query);
            header('Location:staff.php?p=manageusers&m=mod_cus');
        }
    }

    if(isset($_GET['staffdelete']))
    {
        $id = $_GET['staffdelete'];

        if(connect_db()){
            $query = "delete from Staff where staffId ='$id'";
            mysql_query($query);
            header('Location:staff.php?p=manageusers&m=mod_staff');
        }
    }
?>
