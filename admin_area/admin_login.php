<?php



date_default_timezone_set('Asia/Kolkata');
$name='KOTTEKUDY SHOPPING';
?>


<div>
<form action="index.php" method="post" enctype="multipart/form-data">
	<table align="center" width="550" height="300" style="background-color:  yellow">
		<tr align="center">
			<td colspan="5"><h1 style="text-align:center">ADMIN</h1></td>
		</tr>

<tr>
			<td style="padding-right:5" align="right">ADMIN:</td>
			<td style="padding-left:5"><input type="text" name="admin_name" placeholder="ADMIN" required></td>
		</tr>
		
<tr>
			<td style="padding-right:5" align="right">PASSWORD:</td>
			<td style="padding-left:5"><input type="password" name="admin_pass" placeholder="password" required></td>
		</tr>
		
<tr>
			<td></td>
			<td  style="float:left;"  ><input type="submit" name="login" value="LOGIN"/></td>
			
		</tr>

	</table>
</form>


</div>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['login']))
{
$admin_name=mysql_real_escape_string($_POST['admin_name']);
$admin_pass=mysql_real_escape_string($_POST['admin_pass']);

$get_admin="select * from admins where admin_name='$admin_name' AND admin_pass='$admin_pass'";
$run_admin=mysqli_query($con,$get_admin);



if($row_admin=mysqli_fetch_array($run_admin))
{


$admin_names=$row_admin['admin_name'];

$_SESSION['customer_email']=$admin_names;
echo "<script>alert('LOGIN SUCCESSFULL')</script>";
echo "<script>window.open('index.php','_self')</script>";

}





else
{echo "<script>alert('LOGIN UNSUCCESSFULL')</script>";
echo "<script>window.open('admin_login.php','_self')</script>";

}

}
?>