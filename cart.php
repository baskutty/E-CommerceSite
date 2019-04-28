<?php
session_start();
include("functions/functions.php");
date_default_timezone_set('Asia/Kolkata');
$name='KOTTEKUDY SHOPPING';
?>


<!DOCTYPE>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.gif">

    <title>KOTTEKUDY SHOPPING</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

    <!-- Custom styles for this template -->
   
    <link href="css/custom.css" rel="stylesheet" media="all">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>





<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <img class="logo" src="images/logo.gif" title="logo" alt="logo" /><img class="ad" title="ad" alt="ad" style="display:inline;" src="images/ad_banner.gif" />

      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="color:#9cc306" class="navbar-brand" href="#">KOTTEKUDY SHOPPING</a>
        </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
           <form method="get" action="results.php" enctype="multipart/form-data" class="navbar-form navbar-right search">
            <input type="text" name="user_query" class="form-control" placeholder="Search a Product"/>
           
 
  <input type="submit" class="btn btn-warning" name="search" value="Search" />

</form>
          <ul class="nav navbar-nav navbar-right" style="padding-right: 100px;">
            <li><a href="index.php">Home</a></li>
            <li><a href="all_products.php">All Products</a></li>
            <li><a href="my_account.php">My Account</a></li>
            <li><a href="customer_register.php">Sign Up</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
         
        </div>
 </nav>


    
      
          <div class="container-fluid">
      <div class="row" >
        <div class="col-sm-3 col-md-2 sidebar">
           <div id="sidebar_title">Categories</div>
          <ul class="nav nav-sidebar">
            <?php
       getCats();
       ?>
          </ul>
           <div id="sidebar_title">Brands</div>
          <ul class="nav nav-sidebar">
            <?php
       getBrands();
       ?>
          </ul>
         
        </div>

        <div class="main">
          <?php
          cart();
          ?>
          <div id="cart">
            <span style="float:right; font-size: 18px;padding-right: 10px;line-height: 40px;">
            <?php cus_name();   ?> <b style="color:yellow">Shopping Cart-</b> Total Items:<?php total_items();?> Total Price:<?php total_price();?> <a href="cart.php" style= "color: yellow;"> Go to Cart</a>
<?php

            if(!isset($_SESSION['customer_email']))
           {

            echo " <a href='checkout.php'>LOGIN</a>";


           }

           else
           {echo " <a href='logout.php'>LOGOUT</a>";

           }
?>
            </span>


          </div>

          <div id="products">

           <form action="" method="post" enctype="multipart/form-data">
<table  style="background-color:rgb(5, 197, 228);" align="center" width="700"  border="2" >

<tr align="center">
  <th>Remove</th>
  <th>Product(s)</th>
  <th>Quantity</th>
  <th>Total Price</th>
</tr>

<?php



$con=mysqli_connect("localhost","root","","ecommerce");
  $ip=getIp();


$check="select * from cart where ip_add='$ip'";
$run_check=mysqli_query($con,$check);
$count=mysqli_num_rows($run_check);
$tp=0;

while($row_car=mysqli_fetch_array($run_check))
{
  $pro_id=$row_car['p_id'];
  $quant=$row_car['qty'];
  
  $price="select * from products where product_id='$pro_id' LIMIT 1";
  $run_pro=mysqli_query($con,$price);
  while($row_pro=mysqli_fetch_array($run_pro))
  {
    $price_arr=array($quant*$row_pro['product_price']);

    $pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price= $quant*$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
$values=array_sum($price_arr);
$tp+=$values;
     echo "<tr align='center'>
  <td><input type='checkbox' name='remove[]' value='$pro_id'/></td>
  <td style='padding:5'><img style='padding:5' width='60' height='60' src='admin_area/product_images/$pro_image' /><br>$pro_title</td>
  <td><input type='text' size='5' name='qty[]' value='$quant'/></td>
  <td> &#8377 $pro_price</td>
</tr>";



  }


  
}
echo"<tr align='right'>
  <td colspan='10'>Sub Total:</td>
  <td > &#8377 $tp</td>
  </tr>";
?>

<tr align="center">
  <td colspan="3"><input type='submit' name='update_cart' value="Update Cart"></input></td>
  <td colspan="3"><input type='submit' name='continue' value="Continue Shopping"></input></td>
  <td colspan="3"><button   class="btn btn-success"><a href="checkout.php" style="text-decoration: none;">Checkout</button></a></td>

  </tr>
</table>




           </form>

<?php

$con=mysqli_connect("localhost","root","","ecommerce");
  $ip=getIp();
if(isset($_POST['update_cart']))
{

if(isset($_POST['update_cart']))
{
if(isset($_POST['qty']))
{
  $i=0;

  $check="select * from cart where ip_add='$ip'";
$run_check=mysqli_query($con,$check);
while($row_car=mysqli_fetch_array($run_check))
{
  $pro_id=$row_car['p_id'];
  $qty=$_POST['qty'][$i];

  $update_pro="update cart set qty='$qty' where p_id='$pro_id'";
$run_update=mysqli_query($con,$update_pro);
 

$i=$i+1;

 }echo "<script>window.open('cart.php','_self')</script>";
}




}







  if(isset($_POST['remove']))
{
  foreach ($_POST['remove'] as $remove_id) {
    
  $delete_pro="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
  $run_delete=mysqli_query($con,$delete_pro);

if($run_delete)
{

  echo "<script>window.open('cart.php','_self')</script>";
}







}
}
}
if(isset($_POST['continue']))
{
echo "<script>window.open('index.php','_self')</script>";
}





?>













          </div>
          
          </div>
        
      </div>
         </div>
   
     
    



<div id="footer">


<footer style="text-align:center;margin-bottom:0">
        <p style="text-align:center;">&copy; <?php echo date('Y'); ?> <?php echo $name; ?>,Comp.</p>
      </footer>


</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

	</body>



	</html>
