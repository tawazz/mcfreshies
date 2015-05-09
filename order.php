<?php
    include('phpFunc.php');
    session_start();
    if(isset($_POST['orderID']))
    {
        $orderNo =$_POST['orderID'];
        $total = $_POST['total'];
    
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            echo "---------------------------Order#".$orderNo ."----------------------</br>";
            echo "purchaser -----------------".$username."</br>";
            echo "products </br>";
                                        
            
            foreach($_SESSION as $name => $value){
                        if($value >0){
                            if(substr($name,0,7)== 'incart_')
                            {
                                $id =(int)substr($name,7);
                                
                                    if(connect_db()){
                                          
                                        $query = "select name,price from products where id ='$id'";
                                        $get_prod = mysql_query($query);
                                        $get_cus = mysql_query("select CustNo from Customer where CustName='$username' AND Password = '$password'");
                                       $custID= mysql_result($get_cus,0);
                                     while($row = mysql_fetch_array($get_prod)){
                                         $price = $row['price']*$value;
                                         $product = $row['name'];
                                          $query ="insert into orders values($orderNo,$custID,'$product','$value','$price','$total')";
                                          $addtodb = mysql_query($query);
                                          
                                          echo $value." x ".$product ."------------------$".$price."<br>";
                                     }
                                     
                                }else{
                                    echo "not working";
                                }
                            }
                        }
            }
            echo "Total ----------------".$total."</br>";
            echo "Order complete </br>Thanks for shopping with us <a href='index.php'>return to home page</a>";

        }else{
            header('Location: index.php?p=login');
        }
    }else{
        echo"didnt work";
    }

?>


