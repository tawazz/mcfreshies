<?php

?>

<div class="staffbar">
    <div class="col">
    <form name="searchForm" id="searchForm" action="staff.php" method="get">
        <input type="text" name="search" />
        <input type="hidden" name="p" value="manageproducts"/>
        <input type="hidden" name="m" value="edit_products"/>
        <input type="image" alt="search" src="search.png" height="30" width="30">
        <a href="staff.php?p=manageproducts&m=add_products">Add Products</a>
        <a href="staff.php?p=manageproducts&m=edit_products">Edit Products</a>
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
            include('add_products.php');
        }        

    ?>
</div>
