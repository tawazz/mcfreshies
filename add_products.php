
<h2>Add Product</h2>
<div class="border">
<form action="update.php" method="get" name="products" onsubmit="return checkprod()">
    <label>Product Name</label><input type="text" name="product"></br>
    <label>Product Price</label><input type="text" name="price"></br>
    <label>Category</label><select name="cat">
        <?php
            include('phpFunc.php');
            if(connect_db()){
                $query ="select name from category";
                $get_cat= mysql_query($query);

                while($row = mysql_fetch_array($get_cat)){
                    echo "<option>".$row['name']."</option>";
                }
            }
        ?>
    </select></br>
    <input type="hidden" name="add" value="add"/>
    <input type="submit" value="Add Product">       
</form>
    </div>

