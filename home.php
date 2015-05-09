<?php
    session_start();
    //session variable to store search history
    $_SESSION['lastsearch'];

    // include the mainly used php functions
    include('phpFunc.php');
    //check if the user is logged in
    if(isset($_SESSION['username'])){
        $username =$_SESSION['username'];
    }

    //session variables for the shopping cart
   if(isset($_GET['add']))
    {
        //adding a item into the cart
        //used for the + button aswell
        $item = $_GET['add'];
        $_SESSION['incart_'.$item]+= '1';
       
    }

    if(isset($_GET['sub'])){
        //remove item quatity from the cart
        //used for the - button in the cart
        $item = $_GET['sub'];
        $_SESSION['incart_'.$item]-='1';
    }

    if(isset($_GET['remove'])){
        //remove an item from the cart
        $item = $_GET['remove'];
        $_SESSION['incart_'.$item] ='0';
    }

?>

<div class="bar">
    <div class="col">
    <form name="searchForm" id="searchForm" action="#" method="get">
        <input type="text" name="search" />
        <input type="image" alt="search" src="search.png" height="30" width="30"/>
   
        <?php
            //get categories from the database and display on page
            if(connect_db()){
                echo "<a href='index.php?c=*'>All Products</a>";
                $query = "select name from category";
                $result = mysql_query($query);
                while ($row = mysql_fetch_array($result)){
                    
                    echo "<a href=\"index.php?c=";
                    echo $row['name'];
                    echo "\">";
                    echo  $row['name'];
                    echo "</a>";
                }
                echo "<br><br/>";
                mysql_free_result($result);
                mysql_close();
            }
        ?>
       
     </form>
    </div>
</div>
  <?php
            if(connect_db()){

                //sort items by category
                 if(!empty($_GET['c'])){

                        $c = $_GET['c'];
                        //if category is choosen 
                        if($c != '*'){
                            //set the query to only fetch data from that category
                        $query = "select p.name,p.price , p.id from products p , category c where c.name = '$c' and p.catId = c.id ";
                        }else{
                            $query = "select * from products";
                        }
                        // sort the products
                    }elseif(!empty($_GET['sort'])){

                        $sort = $_GET['sort'];
                        // sort by price ascending
                        if($sort == 'priceA')
                        {
                            $query = "select p.name,p.price, p.id from products p ORDER BY p.price";
                            //sort by price descending
                        }elseif($sort == 'priceD')
                        {
                            $query = "select p.name,p.price,p.id from products p ORDER BY p.price DESC";
                            //sort by tittle ascending
                        }elseif($sort == 'titleA')
                        {
                            $query = "select p.name,p.price,p.id from products p ORDER BY p.name ";
                            //sort by titlle descending
                        }elseif($sort == 'titleD')
                        {
                            $query = "select p.name,p.price,p.id from products p ORDER BY p.name DESC";
                        }
                        //searching 
                    }elseif(!empty($_GET['search'])){
                        //get the search from the user
                        $search = $_GET['search'];
                        //store the search
                        $_SESSION['lastsearch']= $search;
                        //find products with the search keywords
                        $query = "select name,price,id from products where name LIKE '%$search%'";
                    }
                    else{
                        // if all get variables not set just show all products
                        $query = "select * from products";
                    }
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            //interface tweaking to change layout
            $prev = "";
            $scount=0;
            $large =3;
            $medium = 2;
            if(isset($_GET['inteface'])){
                $rand = $_GET['inteface'];
            }else{
                $ranNum = 1;
            }
                    

            if($count < 1){
                echo "<h3> Product Not found </h3>";

            }else{
            while($row= mysql_fetch_array($result)){
                //generate random interface every time
                if($rand){
                   $ranNum = rand(0,1); 
                }
                
                //display query results
                if($ranNum == 2 && $prev != "medium" && $scount <2 ){
                   echo "<div class =\"large\"> <span>".$row['name']."</span></br><span>$".$row['price']."</span></br><span><a href=\"index.php?add=".$row['id']."\">Add to cart</a></span></div>"; 
                   $prev = "large";
                   $scount += $large;
                }elseif($scount > 3){
                    $scount=0;
                    echo "<div class =\"small\"> <span>".$row['name']."</span></br><span>$".$row['price']."</span></br><span><a href=\"index.php?add=".$row['id']."\">Add to cart</a></span></div>"; 
                    $prev = "small";
                    $scount += 1;
                       
                } 
                elseif($ranNum == 1 && $prev != "large" && $scount < 2){
                    
                    echo "<div class =\"medium\"> <span>".$row['name']."</span></br><span>$".$row['price']."</span></br><span><a href=\"index.php?add=".$row['id']."\">Add to cart</a></span></div>"; 
                    $prev = "medium";
                    $scount += $medium;
                }else if($scount > 2){
                    $scount=0;
                    echo "<div class =\"small\"> <span>".$row['name']."</span></br><span>$".$row['price']."</span></br><span><a href=\"index.php?add=".$row['id']."\">Add to cart</a></span></div>"; 
                    $prev = "small";
                    $scount += 1;
                       
                }else{
                    echo "<div class =\"small\"> <span>".$row['name']."</span></br><span>$".$row['price']."</span></br><span><a href=\"index.php?add=".$row['id']."\">Add to cart</a></span></div>"; 
                    $prev = "small";
                    $scount += 1;
                }
                
            }
        }
            }
             
?>


