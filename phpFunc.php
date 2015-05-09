<?php
    function connect_db()
    {
        //connect to db
        $db = mysql_connect("localhost", "X31866622", "X31866622");
        $er = mysql_select_db("X31866622");

        if (!$db) {
             print "Error - Could not connect to MySQL\n";
             exit;
             return FALSE;
            }

            if(!$er) {
            echo "Error - Could not select the database </br>";
            exit;
            return FALSE;
        }
            return TRUE;
    }

    function inCart(){
        echo"<h2>Shopping Cart</h2>";
        if(connect_db()){
            echo"<ul>";
            foreach($_SESSION as $name => $value){
                if($value >0){
                    if(substr($name,0,7)== 'incart_')
                    {
                        $id =(int)substr($name,7);
                        $query = "select name,price from products where id ='$id'";
                        $get_prod = mysql_query($query);

                        while($row = mysql_fetch_array($get_prod)){
                            echo"<li>";
                            echo $row['name']."</br>";
                            echo " Quantity : <a href='index.php?sub=$id'>--</a>".$value."kg <a href='index.php?add=$id'>+ </a><a href='index.php?remove=$id'> remove</a></br>";
                            $prodTotal = $row['price']*$value;
                            echo "$". number_format($prodTotal,2);
                            echo "</li>";
                            $total += $prodTotal;
                        }
                    }
                }
            }
            echo"</ul>";
            if($total > 0){

                echo"<p>Total $".number_format($total,2)."</p>";
                if(connect_db()){
                    $num = mysql_query("select max(orderNo) from orders");
                    $row = mysql_fetch_row($num);
                    $orderID = $row[0]+1;
                    echo "<form action='order.php' method ='post' name='order'> ";
                    echo "<input type=\"hidden\" value=\"$orderID\" name=\"orderID\" />";
                    echo "<input type=\"hidden\" value=".number_format($total,2)." name=\"total\" />";
                    echo "<input type='submit' value ='CheckOut'/>";
                    echo "</form>";
                }
                
            }else{
                echo "<p>Empty shopping cart</p>";
            }
            
        }else{echo"failed to connect";}
    }

    function sort_prod()
    {
                echo "<div>";
                echo "<h2>Sort Products</h2>";
                echo "<a href=\"index.php?sort=priceA\">Price Low-High</a>";
                echo "<a href=\"index.php?sort=priceD\">Price High-Low</a>";    
                echo "<a href=\"index.php?sort=titleA\">Title A-Z</a>";    
                echo "<a href=\"index.php?sort=titleD\">Title Z-A</a>";    
                echo "</div>"; 
    }
?>

