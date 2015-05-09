<?php
    include('phpFunc.php');
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    if(connect_db()){
        $query ="select * from products where id ='$id'";
        $get_products= mysql_query($query);
        while($row = mysql_fetch_array($get_products)){
            $name= $row['name'];
            $price = $row['price'];
            $cat = $row['catId'];
        }
    }
}else{
    header('Location:staff.php?p=manageproducts&m=edit_products');
}
    

?>
<h2>Update Product Detail</h2>
<div class="border">
<form action="update.php" method="get" name="products">
    <label>Product Name</label><input type="text" name="product" value="<? echo $name;?>"></br>
    <label>Product Price</label><input type="text" name="price"value="<? echo $price;?>"></br>
    <label>Category</label><select name="cat">
        <?php
            if(connect_db()){
                $query ="select name from category";
                $get_cat= mysql_query($query);

                while($row = mysql_fetch_array($get_cat)){
                    echo "<option>".$row['name']."</option>";
                }
            }
        ?>
    </select></br>
    <input type="hidden" name="id" value="<?echo $id;?>"/>
    <input type="hidden" name="edit" value="edit"/>
    <input type="submit" value="Update">
        
</form>
    </div>
