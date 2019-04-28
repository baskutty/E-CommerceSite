<div id="products">

           <form action="" method="post" enctype="multipart/form-data">
<table  style="background-color:rgb(5, 197, 228);" align="center" width="700"  border="2" >

<tr align="center">
  <th>S.N</th>
  <th>IMAGE</th>
  <th>PRICE</th>
  <th>EDIT</th>
  <th>DELETE</th>
</tr>

<?php



$con=mysqli_connect("localhost","root","","ecommerce");
  $ip=getIp();

$i=1;

  
  $price="select * from products order by product_id";
  $run_pro=mysqli_query($con,$price);
  while($row_pro=mysqli_fetch_array($run_pro))
  {
    

    $pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];


     echo "<tr align='center'>
  <td>$i.</td>
  <td style='padding:5'><img style='padding:5' width='60' height='60' src='product_images/$pro_image' /><br>$pro_title</td>
  
  <td> &#8377 $pro_price</td>
  <td><a href='edit.php?product_id=$pro_id'>edit</a></td>
  <td><a href='delete.php?product_id=$pro_id'>delete</a></td>
</tr>";

$i=$i+1;

  }


  

?>
</table>
</form>
</div>