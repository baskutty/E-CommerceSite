<!DOCTYPE>
<html>
<head>
	<title>INSERTING CATEGORY</title>
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nl7f1ceqvxqbzrybr358plda3lgdi6u85rwqzybk64jzb0ht"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">
<form action="insert_cat.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" height="500" border="2" bgcolor="yellow" style="background-color: #ffc107">
		<tr align="center">
			<td colspan="5"><h1 style="text-align:center">INSERT NEW CATEGORY HERE</h1></td>
		</tr>

<tr>
			<td align="right">Category Title</td>
			<td><input type="text" name="cat_title" required></td>
		</tr>
		

    
		<tr align="center">
			<td colspan="5"><input type="submit" name="insert_cat" value="Insert Now"/></td>
		</tr>




	</table>
</form>


</body>



</html>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['insert_cat']))
{
$cat_title=$_POST['cat_title'];

$insert_category="insert into categories(cat_title) values ('$cat_title')";

$insert_cat= mysqli_query($con, $insert_category);

if($insert_cat)
{
	echo "<script>alert('THE CATEGORY HAS BEEN INSERTED!')</script>";
	echo "<script>window.open('index.php?cat','_self')</script>";
}


}
?>