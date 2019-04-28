<?php



date_default_timezone_set('Asia/Kolkata');
$name='KOTTEKUDY SHOPPING';
?>


<div>
<form action="checkout.php" method="post" enctype="multipart/form-data">
	<table align="center" width="550" height="300" style="background-color:  yellow">
		<tr align="center">
			<td colspan="5"><h1 style="text-align:center">LOGIN OR REGISTER TO BUY</h1></td>
		</tr>

<tr>
			<td style="padding-right:5" align="right">EMAIL:</td>
			<td style="padding-left:5"><input type="text" name="email" placeholder="email" required></td>
		</tr>
		
<tr>
			<td style="padding-right:5" align="right">PASSWORD:</td>
			<td style="padding-left:5"><input type="password" name="pass" placeholder="password" required></td>
		</tr>
		
<tr>
			<td  style="padding-left:5" align="right" ><input type="submit" name="login" value="LOGIN"/></td>
			<td align="center"><a href="checkout.php?forgot_pass">Forgot Password</a></td>
		</tr>

	</table>
</form>
<h2 style="text-align:right;padding-right: 15px;"><a style="text-decoration:none" href="customer_register.php">NEW? REGISTER HERE</a></h2>

</div>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['login']))
{
$customer_email=$_POST['email'];
$customer_pass=$_POST['pass'];

$get_cus="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
$run_cus=mysqli_query($con,$get_cus);



if($row_cus=mysqli_fetch_array($run_cus))
{


$cus_name=$row_cus['customer_name'];

$_SESSION['customer_email']=$cus_name;
echo "<script>alert('LOGIN SUCCESSFULL')</script>";
echo "<script>window.open('checkout.php','_self')</script>";

}





else
{echo "<script>alert('LOGIN UNSUCCESSFULL')</script>";
echo "<script>window.open('checkout.php','_self')</script>";

}

}
?>