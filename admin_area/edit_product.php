<!DOCTYPE>
<html>
<head>
	<title>INSERTING PRODUCT</title>
	
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nl7f1ceqvxqbzrybr358plda3lgdi6u85rwqzybk64jzb0ht"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">
<form action="insert_product.php" method="post" enctype="multipart/form-data">
	<table align="center" width="700" height="500" border="2" bgcolor="yellow" style="background-color: #ffc107">
		<tr align="center">
			<td colspan="5"><h1 style="text-align:center">INSERT NEW POST HERE</h1></td>
		</tr>

<tr>
			<td align="right">Product Title</td>
			<td><input type="text" name="product_title" required></td>
		</tr>
		<tr>
			<td align="right">Product Category</td>
			<td><select name="product_cat">

          <option>Select a Category</option>
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
     <option>Select a Brand</option>

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
			<td><input type="file" name="product_image" required></td>
		</tr>
		<tr>
			<td align="right">Product Price</td>
			<td><input type="text" name="product_price" required></td>
		</tr>
		<tr>
			<td align="right">Product Description</td>
			<td><textarea name="product_desc" cols="20" rows="15"> </textarea></td>
		</tr>
		<tr>
			<td align="right">Product Keywords</td>
			<td><input type="text" name="product_keywords" required></td>
		</tr>
		<tr align="center">
			<td colspan="5"><input type="submit" name="insert_post" value="Insert Now"/></td>
		</tr>




	</table>
</form>


</body>



</html>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['insert_post']))
{
$product_title=$_POST['product_title'];
$product_cat=$_POST['product_cat'];
$product_brand=$_POST['product_brand'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];
$product_keywords=$_POST['product_keywords'];
$product_image=$_FILES['product_image']['name'];
$product_image_temp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_temp, "product_images/$product_image");
$insert_product="insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

$insert_pro= mysqli_query($con, $insert_product);

if($insert_pro)
{
	echo "<script>alert('THE PRODUCT HAS BEEN INSERTED!')</script>";
	echo "<script>window.open('insert_product.php','_self')</script>";
}


}
?>