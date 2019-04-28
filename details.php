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
            <div class="btn-group search1" role="group" aria-label="...">
 
  <input type="button" class="btn btn-warning"  name="search" value="Search" />
</div>
</form>
          <ul class="nav navbar-nav navbar-right" style="padding-right: 100px;">
            <li><a href="#">Home</a></li>
            <li><a href="#">All Products</a></li>
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
          <div id="cart">
            <span style="float:right; font-size: 18px;padding-right: 10px;line-height: 40px;">
           <?php cus_name();   ?> <b style="color:yellow">Shopping Cart-</b> Total Items: Total Price: <a href="cart.php" style= "color: yellow;"> Go to Cart</a>
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

           <?php
           getDetails();
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
