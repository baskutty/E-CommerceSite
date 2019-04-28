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
    if(isset($_GET['ip']))
    {

include("insert_product.php");


    }
 if(isset($_GET['cat']))
    {

include("insert_cat.php");


    }
     if(isset($_GET['brand']))
    {

include("insert_brand.php");


    }
     if(isset($_GET['vp']))
    {

include("view_pro.php");


    }
     if(isset($_GET['vc']))
    {

include("view_cat.php");


    }
      if(isset($_GET['vb']))
    {

include("view_brand.php");


    }
 if(isset($_GET['vcu']))
    {

include("view_customer.php");


    }
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