<?php

?>

<div class="staffbar">
    <div class="col">
    <form name="searchForm" id="searchForm" action="#" method="get">
        <input type="text" name="search" />
        <input type="image" alt="search" src="search.png" height="30" width="30"/>
        <a href="staff.php?p=manageusers&m=edit_users">Edit Records</a>
        <a href="staff.php?p=manageusers&m=register">Register User</a>
        <a href="staff.php?p=manageusers&m=staffreg">Register staff</a>
     </form>
    </div>
</div>
<div class="lists">
    <?php
        if(!empty($_GET['m'])){
            $m = $_GET['m'];
            include( $m .'.php'); 
        }
        else{
            include('edit_users.php');
        }        

    ?>
</div>
