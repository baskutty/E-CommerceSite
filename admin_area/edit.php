<?php
session_start();
include("../functions/functions.php");
date_default_timezone_set('Asia/Kolkata');
$name='KOTTEKUDY SHOPPING';
if(!isset($_SESSION['customer_email']))
           {

            include('admin_login.php');


           }
           else
           {
  
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

    <title>ADMIN PANEL</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

    <!-- Custom styles for this template -->
   
    <link href="css/custom.css" rel="stylesheet" media="all">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nl7f1ceqvxqbzrybr358plda3lgdi6u85rwqzybk64jzb0ht"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>





<body>
<img class="logo" src="images/bg-header.jpg" title="logo" alt="logo" />
 


    
      
          <div class="container-fluid">
      <div class="row" >
        <div class="col-sm-3 col-md-2 sidebar">
           <div id="sidebar_title">MANAGE CONTENT</div>
          <ul class="nav nav-sidebar">
            <li> <a href="index.php">ADMIN HOME</a></li>
           <li> <a href="index.php?ip">INSERT PRODUCT</a></li>
           <li> <a href="index.php?vp">VIEW ALL PRODUCTS</a></li>
           <li> <a href="index.php?cat">INSERT CATEGORY</a></li>
           <li> <a href="index.php?vc">VIEW ALL CATEGORIES</a></li>
           <li> <a href="index.php?brand">INSERT BRAND</a></li>
           <li> <a href="index.php?vb">VIEW ALL BRANDS</a></li>
           <li> <a href="index.php?vcu">VIEW CUSTOMERS</a></li>
           <li> <a href="insert_product.php">VIEW ORDERS</a></li>
           <li> <a href="insert_product.php">VIEW PAYMENTS</a></li>
           <li> <a href="admin_logout.php">ADMIN LOGOUT</a></li>
          </ul>
           </div>
        <div class="main">
         <?php
    if(isset($_GET['product_id']))
    {

$product_id=$_GET['product_id'];
$con=mysqli_connect("localhost","root","","ecommerce");

$get_pros="select * from products where product_id=$product_id";
$run_pros=mysqli_query($con,$get_pros);
while($row_pros=mysqli_fetch_array($run_pros))
{
  
 $product_title=$row_pros['product_title'];
 $product_image=$row_pros['product_image'];
 $product_price=$row_pros['product_price'];
 $product_brand=$row_pros['product_brand'];
 $product_cat=$row_pros['product_cat'];
 $product_desc=$row_pros['product_desc'];
 $product_keywords=$row_pros['product_keywords'];



    ?>
<form action="edit.php?product_id=<?php echo"$product_id"; ?>" method="post" enctype="multipart/form-data">
  <table align="center" width="700" height="500" border="2" bgcolor="yellow" style="background-color: #ffc107">

    <tr align="center">
      <td colspan="5"><h1 style="text-align:center">UPDATE PRODUCT HERE</h1></td>
    </tr>

<tr>
      <td align="right">Product Title</td>
      <td><input type="text" name="product_title" value=<?php echo"$product_title";?> /></td>
    </tr>
    <tr>
      <td align="right">Product Category</td>
      <td><select name="product_cat" >

          <option value=<?php echo"$product_cat";?>><?php 
$con=mysqli_connect("localhost","root","","ecommerce");

$get_cats="select * from categories where cat_id=$product_cat";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
  $cat_id=$row_cats['cat_id'];
  $cat_title=$row_cats['cat_title'];
  echo "$cat_title";
}


    ?></option>
         <?php 
$con=mysqli_connect("localhost","root","","ecommerce");

$get_cats="select * from categories";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
  $cat_id=$row_cats['cat_id'];
  $cat_title=$row_cats['cat_title'];
  echo "<option value='$cat_id'>$cat_title</option>";
}


    ?>
      </select>

      </td>
    </tr>
    <tr>
      <td align="right">Product Brand</td>
      <td><select name="product_brand">
     <option value=<?php echo"$product_brand";?>><?php 
$con=mysqli_connect("localhost","root","","ecommerce");

$get_cats="select * from brands where brand_id=$product_brand";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
  $cat_id=$row_cats['brand_id'];
  $cat_title=$row_cats['brand_title'];
  echo "$cat_title";
}


    ?></option>

    <?php
$con=mysqli_connect("localhost","root","","ecommerce");
     $get_brands="select * from brands";
$run_brands=mysqli_query($con,$get_brands);
while($row_brands=mysqli_fetch_array($run_brands))
{
  $brand_id=$row_brands['brand_id'];
  $brand_title=$row_brands['brand_title'];
  echo "<option value='$brand_id'>$brand_title</option>";
}
?>
</select>

      </td>
    </tr>
    <tr>
      <td align="right">Product Image</td>
      <td><input type="file" name="product_image" required/> <?php echo"<img style='padding:5' width='60' height='60' src='product_images/$product_image' />";?></td>
    </tr>
    <tr>
      <td align="right">Product Price</td>
      <td><input type="text" name="product_price" value=<?php echo"$product_price";?> /></td>
    </tr>
    <tr>
      <td align="right">Product Description</td>
      <td><textarea name="product_desc" cols="20" rows="15"><?php echo"$product_desc";?> </textarea></td>
    </tr>
    <tr>
      <td align="right">Product Keywords</td>
      <td><input type="text" name="product_keywords" value=<?php echo"$product_keywords";?> /></td>
    </tr>
    <tr align="center">
      <td colspan="5"><input type="submit" name="insert_post" value="Update Now"/></td>
    </tr>




  </table>
</form>



<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['insert_post']))
{
$product_title=$_POST['product_title'];
$update_title="update products set product_title='$product_title' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_title);

$product_cat=$_POST['product_cat'];
$update_cat="update products set product_cat='$product_cat' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_cat);
$product_brand=$_POST['product_brand'];
$update_brand="update products set product_brand='$product_brand' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_brand);
$product_price=$_POST['product_price'];
$update_price="update products set product_price='$product_price' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_price);
$product_desc=$_POST['product_desc'];
$update_desc="update products set product_desc='$product_desc' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_desc);
$product_keywords=$_POST['product_keywords'];
$update_keywords="update products set product_keywords='$product_keywords' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_keywords);
if(isset($_FILES['product_image']['name']))
{
$product_image=$_FILES['product_image']['name'];
$product_image_temp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_temp, "product_images/$product_image");

$update_image="update products set product_image='$product_image' where product_id='$product_id'";
$run_update=mysqli_query($con,$update_image);

}
echo "<script>alert('THE PRODUCT HAS BEEN UPDATED!')</script>";
  echo "<script>window.open('index.php?vp','_self')</script>";



}
}
}

?>


   <?php
 if(isset($_GET['cat_id']))
    {
$cat_id=$_GET['cat_id'];
$con=mysqli_connect("localhost","root","","ecommerce");

$get_cat="select * from categories where cat_id=$cat_id";
$run_cat=mysqli_query($con,$get_cat);
while($row_cat=mysqli_fetch_array($run_cat))
{
  
 $cat_title=$row_cat['cat_title'];
?>
<form action="edit.php?cat_id=<?php echo"$cat_id"; ?>" method="post" enctype="multipart/form-data">
  <table align="center" width="700" height="500" border="2" bgcolor="yellow" style="background-color: #ffc107">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center">UPDATE CATEGORY HERE</h1></td>
    </tr>

<tr>
      <td align="right">Category Title</td>
      <td><input type="text" name="cat_title" value=<?php echo"$cat_title";?>  /></td>
    </tr>
    

    
    <tr align="center">
      <td colspan="5"><input type="submit" name="update_cat" value="Update Now"/></td>
    </tr>




  </table>
</form>






 <?php $con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['update_cat']))
{
$cat_title=$_POST['cat_title'];
$update_title="update categories set cat_title='$cat_title' where cat_id='$cat_id'";
$run_update=mysqli_query($con,$update_title);
echo "<script>alert('THE CATEGORY HAS BEEN UPDATED!')</script>";
  echo "<script>window.open('index.php?vc','_self')</script>";


 }




 }} ?>




<?php

     if(isset($_GET['brand_id']))
    {
$brand_id=$_GET['brand_id'];
$con=mysqli_connect("localhost","root","","ecommerce");

$get_brand="select * from brands where brand_id=$brand_id";
$run_brand=mysqli_query($con,$get_brand);
while($row_brand=mysqli_fetch_array($run_brand))
{
  
 $brand_title=$row_brand['brand_title'];
?>
<form action="edit.php?brand_id=<?php echo"$brand_id"; ?>" method="post" enctype="multipart/form-data">
  <table align="center" width="700" height="500" border="2" bgcolor="yellow" style="background-color: #ffc107">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center">UPDATE BRAND HERE</h1></td>
    </tr>

<tr>
      <td align="right">BRAND Title</td>
      <td><input type="text" name="brand_title" value=<?php echo"$brand_title";?>  /></td>
    </tr>
    

    
    <tr align="center">
      <td colspan="5"><input type="submit" name="update_brand" value="Update Now"/></td>
    </tr>




  </table>
</form>






 <?php $con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['update_brand']))
{
$brand_title=$_POST['brand_title'];
$update_title="update brands set brand_title='$brand_title' where brand_id='$brand_id'";
$run_update=mysqli_query($con,$update_title);
echo "<script>alert('THE BRAND HAS BEEN UPDATED!')</script>";
  echo "<script>window.open('index.php?vb','_self')</script>";


 }




 }}

     
         ?>

          <div id="products">

         
         

   

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
<?php
}
  ?>