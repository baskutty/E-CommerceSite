<?php
session_start();
include("functions/functions.php");
date_default_timezone_set('Asia/Kolkata');
$name='KOTTEKUDY SHOPPING';
?>


<!DOCTYPE>
<html>
<head>
	<title>REGISTER HERE</title>
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nl7f1ceqvxqbzrybr358plda3lgdi6u85rwqzybk64jzb0ht"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">
<form action="customer_register.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" height="500" border="2" bgcolor="yellow">
		<tr align="center">
			<td colspan="5"><h1 style="text-align:center">REGISTER HERE</h1></td>
		</tr>

<tr>
			<td align="right">USERNAME</td>
			<td><input type="text" name="customer_name" required/></td>
		</tr>
	<td align="right">EMAIL</td>
			<td><input type="text" name="customer_email" required/></td>
		</tr>
			<td align="right">PASSWORD</td>
			<td><input type="password" name="customer_pass" required/></td>
		</tr>
		<tr>
			<td align="right">Country</td>
			<td><input type="text" name="customer_country" required/></td>
		</tr>
		<tr>
		<td align="right">CITY</td>
			<td><input type="text" name="customer_city" required/></td>
		</tr>
		<tr>
		<td align="right">MOBILE</td>
			<td><input type="text" name="customer_no" required/></td>
		</tr>
		<tr>
			<td align="right">Profile Image</td>
			<td><input type="file" name="customer_image" required/></td>
		</tr>
		<tr>
			<td align="right">Customer Address</td>
			<td><textarea name="customer_add" cols="10" rows="10"> </textarea></td>
		</tr>
		
			
		<tr align="center">
			<td colspan="5"><input type="submit" class="btn btn-success" name="insert_post" value="SIGN UP"/></td>
		</tr>




	</table>
</form>


</body>



</html>
<?php

$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['insert_post']))
{$customer_ip=getIp();
$customer_name=$_POST['customer_name'];
$customer_email=$_POST['customer_email'];
$customer_pass=$_POST['customer_pass'];
$customer_country=$_POST['customer_country'];
$customer_city=$_POST['customer_city'];
$customer_no=$_POST['customer_no'];
$customer_image=$_FILES['customer_image']['name'];
$customer_image_temp=$_FILES['customer_image']['tmp_name'];
move_uploaded_file($customer_image_temp, "customer_images/$customer_image");
$customer_add=$_POST['customer_add'];
$get_cus="select * from customers where customer_email='$customer_email'";
$run_cus=mysqli_query($con,$get_cus);
$count1=mysqli_num_rows($run_cus);
if($count1!=0)
{echo "<script>alert('USER ALREADY PRESENT WITH SAME EMAIL!')</script>";
	echo "<script>window.open('customer_register.php','_self')</script>";


}
$get_cus="select * from customers where customer_no='$customer_no'";
$run_cus=mysqli_query($con,$get_cus);
$count2=mysqli_num_rows($run_cus);
if($count2!=0)
{echo "<script>alert('USER ALREADY PRESENT WITH SAME MOBILE NUMBER!')</script>";
	echo "<script>window.open('customer_register.php','_self')</script>";


}
$get_cus="select * from customers where customer_name='$customer_name'";
$run_cus=mysqli_query($con,$get_cus);
$count3=mysqli_num_rows($run_cus);
if($count3!=0)
{echo "<script>alert('USER ALREADY PRESENT WITH SAME USERNAME!')</script>";
	echo "<script>window.open('customer_register.php','_self')</script>";


}
if($count1==0 && $count2==0 && $count3==0)
{

$insert_customer="insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_no,customer_image,customer_add) values ('$customer_ip','$customer_name','$customer_email','$customer_pass','$customer_country','$customer_city','$customer_no','$customer_image','$customer_add')";

$insert_cus= mysqli_query($con, $insert_customer);

$check="select * from cart where ip_add='$customer_ip'";
$run_check=mysqli_query($con,$check);


$count=mysqli_num_rows($run_check);


if($count==0)
{ $_SESSION['customer_email']=$customer_name;
	echo "<script>alert('REGISTRATION SUCCESSFULL!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
}
else
{ $_SESSION['customer_email']=$customer_name;
	echo "<script>alert('REGISTRATION SUCCESSFULL!')</script>";
	echo "<script>window.open('checkout.php','_self')</script>";
}

}
}
?>