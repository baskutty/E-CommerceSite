<?php

$con=mysqli_connect("localhost","root","","ecommerce");


function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}


function cus_name()
{
if(!isset($_SESSION['customer_email']))
{
	echo "WELCOME GUEST";
}
else
{

echo $_SESSION['customer_email'];


}


}

function cart()
{
  if(isset($_GET['car_id']))
  {

  	global $con;
	$ip=getIp();

$pro_id=$_GET['car_id'];
$check="select * from cart where p_id='$pro_id' AND ip_add='$ip'";
$run_check=mysqli_query($con,$check);


if(mysqli_num_rows($run_check)>0)
{
	echo "<script>alert('PRODUCT ALREADY ADDED TO CART')</script>";
}
else
{

	$insert_car="insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip',1)";
	$run_car=mysqli_query($con,$insert_car);

	if($run_car)
	{
echo "<script>alert('PRODUCT ADDED TO CART')</script>";
echo "<script>window.open('index.php','_self')</script>";


}

}


  }
  




}


function total_items()
{

global $con;
	$ip=getIp();


$check="select * from cart where ip_add='$ip'";
$run_check=mysqli_query($con,$check);
$count=mysqli_num_rows($run_check);

echo "<p style='color:red;display:inline;'> $count </p>";


}



function total_price()
{

global $con;
	$ip=getIp();


$check="select * from cart where ip_add='$ip'";
$run_check=mysqli_query($con,$check);
$count=mysqli_num_rows($run_check);
$tp=0;

while($row_car=mysqli_fetch_array($run_check))
{   $quant=$row_car['qty'];
	$pro_id=$row_car['p_id'];
	$price="select * from products where product_id='$pro_id' LIMIT 1";
	$run_pro=mysqli_query($con,$price);
	while($row_pri=mysqli_fetch_array($run_pro))
	{
      $tp+=($quant*$row_pri['product_price']);
	}


	
}
echo "<p style='color:red;display:inline;'> &#8377 $tp </p>";

}
function total_amount()
{

global $con;
  $ip=getIp();


$check="select * from cart where ip_add='$ip'";
$run_check=mysqli_query($con,$check);
$count=mysqli_num_rows($run_check);
$tp=0;

while($row_car=mysqli_fetch_array($run_check))
{   $quant=$row_car['qty'];
  $pro_id=$row_car['p_id'];
  $price="select * from products where product_id='$pro_id' LIMIT 1";
  $run_pro=mysqli_query($con,$price);
  while($row_pri=mysqli_fetch_array($run_pro))
  {
      $tp+=($quant*$row_pri['product_price']);
  }


  
}
return $tp;

}



function getCats()
{

global $con;
$get_cats="select * from categories";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats))
{
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];
	echo "<li><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
}




}
function getBrands()
{

global $con;
$get_brands="select * from brands";
$run_brands=mysqli_query($con,$get_brands);
while($row_brands=mysqli_fetch_array($run_brands))
{
	$brand_id=$row_brands['brand_id'];
	$brand_title=$row_brands['brand_title'];
	echo "<li><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";
}




}

function getPro()
{

global $con;


	if(isset($_GET['cat_id']))
{
 $product_cat=$_GET['cat_id'];

	$get_pro="select * from products where product_cat='$product_cat' order by product_price LIMIT 0,16";
$run_pro=mysqli_query($con,$get_pro);
$count=mysqli_num_rows($run_pro);

if($count==0)
{
	echo "<p style='text-align:center'>NO PRODUCTS AVAILABLE</p>";
}
while($row_pro=mysqli_fetch_array($run_pro))
{
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
echo "
<div id='single_product'>
<img width='180' height='180' src='admin_area/product_images/$pro_image' />

<h4>$pro_title</h4>
<p>&#8377 $pro_price</p>
<a href='details.php?pro_id=$pro_id' style='float:left; padding-top:5px;'>Details</a>

<a href='index.php?car_id=$pro_id'><button type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button>
      </a>
</div>";


}
}



else if(isset($_GET['brand_id']))
{$product_brand=$_GET['brand_id'];

	$get_pro="select * from products where product_brand='$product_brand' order by product_price LIMIT 0,16";
$run_pro=mysqli_query($con,$get_pro);
$count=mysqli_num_rows($run_pro);

if($count==0)
{
	echo "<p style='text-align:center'>NO PRODUCTS AVAILABLE</p>";
}

while($row_pro=mysqli_fetch_array($run_pro))
{
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
echo "
<div id='single_product'>
<img width='180' height='180' src='admin_area/product_images/$pro_image' />

<h4>$pro_title</h4>
<p>&#8377 $pro_price</p>
<a href='details.php?pro_id=$pro_id' style='float:left; padding-top:5px;'>Details</a>

<a href='index.php?car_id=$pro_id'><button type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button>
      </a>
</div>";


}
}





else
{
$get_pro="select * from products order by RAND() LIMIT 0,16";
$run_pro=mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro))
{
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
echo "
<div id='single_product'>
<img width='180' height='180' src='admin_area/product_images/$pro_image' />

<h4>$pro_title</h4>
<p>&#8377 $pro_price</p>
<a href='details.php?pro_id=$pro_id' style='float:left; padding-top:5px;'>Details</a>

<a href='index.php?car_id=$pro_id'><button type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button>
      </a>
</div>";


}
}
}
function getDetails()
{
if(isset($_GET['pro_id']))
{
	$product_id=$_GET['pro_id'];
global $con;
$get_pro="select * from products where product_id='$product_id'";
$run_pro=mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro))
{

$pro_id=$row_pro['product_id'];

$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
$pro_desc=$row_pro['product_desc'];
echo "

<div id='single_product' style='width:600px;margin-left:250px'>
<h4>$pro_title</h4>
<img width='300' height='300' src='admin_area/product_images/$pro_image' />


<p>&#8377 $pro_price</p>

<div style='text-align:left;'>$pro_desc</div>
<a href='index.php' style='float:left; padding-top:5px;'>Go back</a>

<a href='index.php?car_id=$pro_id'><button type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button>
      </a>
      
</div>";


}




}




}
function getAllPro()
{global $con;

$get_pro="select * from products order by product_price";
$run_pro=mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro))
{
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
echo "
<div id='single_product'>
<img width='180' height='180' src='admin_area/product_images/$pro_image' />

<h4>$pro_title</h4>
<p>&#8377 $pro_price</p>
<a href='details.php?pro_id=$pro_id' style='float:left; padding-top:5px;'>Details</a>

<a href='index.php?car_id=$pro_id'><button type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button>
      </a>
</div>";


}


}
function getResults()
{global $con;
if(isset($_GET['user_query']))
{
	
$search=$_GET['user_query'];

$get_pro="select * from products where product_keywords like '%$search%'";
$run_pro=mysqli_query($con,$get_pro);
$count=mysqli_num_rows($run_pro);

if($count==0)
{
	echo "<p style='text-align:center'>NO ITEMS FOUND</p>";
}
while($row_pro=mysqli_fetch_array($run_pro))
{
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
echo "
<div id='single_product'>
<img width='180' height='180' src='admin_area/product_images/$pro_image' />

<h4>$pro_title</h4>
<p>&#8377 $pro_price</p>
<a href='details.php?pro_id=$pro_id' style='float:left; padding-top:5px;'>Details</a>

<a href='index.php?car_id=$pro_id'><button type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
        </button>
      </a>
</div>";


}

}
}
function getProfile()
{
if(isset($_SESSION['customer_email']))
{
	$customer_name=$_SESSION['customer_email'];
global $con;
$get_cus="select * from customers where customer_name='$customer_name'";
$run_cus=mysqli_query($con,$get_cus);
while($row_cus=mysqli_fetch_array($run_cus))
{

$cus_email=$row_cus['customer_email'];

$cus_country=$row_cus['customer_country'];
$cus_city=$row_cus['customer_city'];
$cus_image=$row_cus['customer_image'];
$cus_no=$row_cus['customer_no'];
$cus_add=$row_cus['customer_add'];
echo "

<div id='single_product' style='width:800px;margin-left:160px'>

<img style='padding-bottom:10px;' width='150' height='150' src='customer_images/$cus_image' /><a style='text-decoration:none' href='edit.php?pic'><button style='display:block; margin:auto;' type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-edit'></span> edit
        </button>
      </a>
      <a style='text-decoration:none' href='edit.php?pass'><button style='display:block; margin:auto; margin-top:10; ' type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-edit'></span> edit password
          </button>
      </a>
<h4>$customer_name</h4>

<div style='text-align:left;'><b>EMAIL</b>:$cus_email</div>
<div style='text-align:left;'><b>COUNTRY</b>:$cus_country  <a style='text-decoration:none' href='edit.php?count'><button style='display:inline; ' type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-edit'></span> edit
        </button>
      </a></div>
<div style='text-align:left;'><b>CITY</b>:$cus_city  <a style='text-decoration:none' href='edit.php?city'><button style='display:inline; ' type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-edit'></span> edit
        </button>
      </a></div>
<div style='text-align:left;'><b>MOBILE</b>:$cus_no  <a style='text-decoration:none' href='edit.php?no'><button style='display:inline;' type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-edit'></span> edit
        </button>
      </a></div>

<div style='text-align:left;'><b>ADDRESS</b>: <a style='text-decoration:none' href='edit.php?add'><button style='display:inline; ' type='button' class='btn btn-default btn-sm'style='float:right'>
          <span class='glyphicon glyphicon-edit'></span> edit
        </button>
      </a>$cus_add </div>
      <a style='text-decoration:none' href='my_orders.php'><button style='display:inline; ' type='button' class='btn btn-default btn-sm'style='float:right'>
         MY ORDERS
        </button>
      </a>
      <br>
      <br>
 <form method='post' action='my_account.php' enctype='multipart/form-data'> 
     <input type='submit' class='btn btn-warning' name='delete_acc' value='DELETE ACCOUNT'/> 
     </form>
</div>
";
if(isset($_POST['delete_acc']))
{
$del_cus="delete from customers where customer_no='$cus_no'";
$run_cus=mysqli_query($con,$del_cus);
if($run_cus)
{echo "<script>alert('ACCOUNT DELETED')</script>";
session_destroy();

echo "<script>window.open('index.php','_self')</script>";
}
}


}



}




}
function editProfile()
{$customer_name=$_SESSION['customer_email'];

global $con;
if(isset($_GET['no']))
{
echo "<div id='single_product' style='width:800px;margin-left:160px'>
<form method='post' action='edit.php?no' enctype='multipart/form-data'> 

NEW MOBILE:-<input type='text' name='customer_no' required/>
		
		
     <input type='submit' class='btn btn-warning' name='update_no' value='UPDATE'/> 
    

     </form></div>";

if(isset($_POST['update_no']))
{
$customer_no=$_POST['customer_no'];
$get_no="select * from customers where customer_no='$customer_no'";
$run_no=mysqli_query($con,$get_no);
$countno=mysqli_num_rows($run_no);



if($countno==0)
{$update_no="update customers set customer_no='$customer_no' where customer_name='$customer_name'";
$run_update=mysqli_query($con,$update_no);
	echo "<script>alert('NUMBER UPDATED')</script>";


echo "<script>window.open('my_account.php','_self')</script>";
}
else
{
echo "<script>alert('NUMBER ALREADY PRESENT')</script>";


echo "<script>window.open('edit.php?no','_self')</script>";

}


}

}
if(isset($_GET['add']))
{
echo "<div id='single_product' style='width:800px;margin-left:160px'>
<form method='post' action='edit.php?add' enctype='multipart/form-data'> 

<td>NEW ADDRESS:-</td><td><textarea name='customer_add' cols='10' rows='10'> </textarea></td>
		
     <input type='submit' class='btn btn-warning' name='update_add' value='UPDATE'/> 
    

     </form></div>";

if(isset($_POST['update_add']))
{
$customer_add=$_POST['customer_add'];
$update_add="update customers set customer_add='$customer_add' where customer_name='$customer_name'";
$run_update=mysqli_query($con,$update_add);


if($run_update)
{echo "<script>alert('ADDRESS UPDATED')</script>";


echo "<script>window.open('my_account.php','_self')</script>";
}


}

}
if(isset($_GET['count']))
{
echo "<div id='single_product' style='width:800px;margin-left:160px'>
<form method='post' action='edit.php?count' enctype='multipart/form-data'> 

NEW COUNTRY:-<input type='text' name='customer_country' required/>
		
		
     <input type='submit' class='btn btn-warning' name='update_count' value='UPDATE'/> 
    

     </form></div>";

if(isset($_POST['update_count']))
{
$customer_country=$_POST['customer_country'];
$update_count="update customers set customer_country='$customer_country' where customer_name='$customer_name'";
$run_update=mysqli_query($con,$update_count);


if($run_update)
{echo "<script>alert('COUNTRY UPDATED')</script>";


echo "<script>window.open('my_account.php','_self')</script>";
}


}

}
if(isset($_GET['city']))
{
echo "<div id='single_product' style='width:800px;margin-left:160px'>
<form method='post' action='edit.php?city' enctype='multipart/form-data'> 

NEW CITY:-<input type='text' name='customer_city' required/>
		
		
     <input type='submit' class='btn btn-warning' name='update_city' value='UPDATE'/> 
    

     </form></div>";

if(isset($_POST['update_city']))
{
$customer_city=$_POST['customer_city'];
$update_city="update customers set customer_city='$customer_city' where customer_name='$customer_name'";
$run_update=mysqli_query($con,$update_city);


if($run_update)
{echo "<script>alert('CITY UPDATED')</script>";


echo "<script>window.open('my_account.php','_self')</script>";
}


}

}
if(isset($_GET['pic']))
{
echo "<div id='single_product' style='width:800px;margin-left:160px'>
<form method='post' action='edit.php?pic' enctype='multipart/form-data'> 

NEW IMAGE:-<input type='file' name='customer_image' required/>
		
		
     <input type='submit' class='btn btn-warning' name='update_pic' value='UPDATE'/> 
    

     </form></div>";

if(isset($_POST['update_pic']))
{
$customer_image=$_FILES['customer_image']['name'];
$customer_image_temp=$_FILES['customer_image']['tmp_name'];
move_uploaded_file($customer_image_temp, "customer_images/$customer_image");
$update_image="update customers set customer_image='$customer_image' where customer_name='$customer_name'";
$run_update=mysqli_query($con,$update_image);


if($run_update)
{echo "<script>alert('IMAGE UPDATED')</script>";


echo "<script>window.open('my_account.php','_self')</script>";
}


}

}
if(isset($_GET['pass']))
{
echo "<div id='single_product' style='width:800px;margin-left:160px'>
<form method='post' action='edit.php?pass' enctype='multipart/form-data'> 
OLD PASSWORD:-<input type='password' name='customer_passo' required/><br><br>

NEW PASSWORD:-<input type='password' name='customer_pass' required/><br><br>
		
		
     <input type='submit' class='btn btn-warning' name='update_pass' value='UPDATE'/> 
    

     </form></div>";

if(isset($_POST['update_pass']))
{$customer_passo=$_POST['customer_passo'];
$get_no="select * from customers where customer_name='$customer_name' AND customer_pass='$customer_passo'";
$run_no=mysqli_query($con,$get_no);
$countno=mysqli_num_rows($run_no);
$customer_pass=$_POST['customer_pass'];
$update_pass="update customers set customer_pass='$customer_pass' where customer_name='$customer_name' AND customer_pass='$customer_passo'";
$run_update=mysqli_query($con,$update_pass);



if($countno!=0)
{echo "<script>alert('PASSWORD UPDATED')</script>";


echo "<script>window.open('my_account.php','_self')</script>";
}
else{echo "<script>alert('WRONG PASSWORD')</script>";


echo "<script>window.open('edit.php?pass','_self')</script>";
}


}

}





}






