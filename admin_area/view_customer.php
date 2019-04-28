<div id="products">

           <form action="" method="post" enctype="multipart/form-data">
<table  style="background-color:rgb(5, 197, 228);" align="center" width="700"  border="2" >

<tr align="center">
  <th>S.N</th>
  <th>USERNAME</th>
  <th>IMAGE</th>
  <th>EMAIL</th>
  <th>MOBILE</th>
  
  
  <th>DELETE</th>
</tr>

<?php



$con=mysqli_connect("localhost","root","","ecommerce");
  $ip=getIp();

$i=1;

  
  $price="select * from customers order by customer_id";
  $run_pro=mysqli_query($con,$price);
  while($row_pro=mysqli_fetch_array($run_pro))
  {
    

    $pro_id=$row_pro['customer_id'];

$pro_name=$row_pro['customer_name'];
$pro_no=$row_pro['customer_no'];
$pro_email=$row_pro['customer_email'];
$pro_image=$row_pro['customer_image'];


     echo "<tr align='center'>
  <td>$i.</td>
  <td>$pro_name</td>
  <td style='padding:5'><img style='padding:5' width='60' height='60' src='../customer_images/$pro_image' /></td>
  
  
  <td>$pro_email</a></td>
  <td>$pro_no</a></td>
  <td><a href='delete.php?customer_id=$pro_id'>delete</a></td>
</tr>";

$i=$i+1;

  }


  

?>
</table>
</form>
</div>