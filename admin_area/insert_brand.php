<!DOCTYPE>
<html>
<head>
	<title>INSERTING BRAND</title>
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nl7f1ceqvxqbzrybr358plda3lgdi6u85rwqzybk64jzb0ht"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">
<form action="insert_brand.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" height="500" border="2" bgcolor="yellow" style="background-color: #ffc107">
		<tr align="center">
			<td colspan="5"><h1 style="text-align:center">INSERT NEW BRAND HERE</h1></td>
		</tr>

<tr>
			<td align="right">Brand Title</td>
			<td><input type="text" name="brand_title" required></td>
		</tr>
		

    
		<tr align="center">
			<td colspan="5"><input type="submit" name="insert_bra" value="Insert Now"/></td>
		</tr>




	</table>
</form>


</body>



</html>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['insert_bra']))
{
$brand_title=$_POST['brand_title'];

$insert_brand="insert into brands(brand_title) values ('$brand_title')";

$insert_bra= mysqli_query($con, $insert_brand);

if($insert_bra)
{
	echo "<script>alert('THE BRAND HAS BEEN INSERTED!')</script>";
	echo "<script>window.open('index.php?brand','_self')</script>";
}


}
?>