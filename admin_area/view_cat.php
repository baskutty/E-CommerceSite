<div id="products">

           <form action="" method="post" enctype="multipart/form-data">
<table  style="background-color:rgb(5, 197, 228);" align="center" width="700"  border="2" >

<tr align="center">
  <th>S.N</th>
  <th>NAME</th>
 
  <th>EDIT</th>
  <th>DELETE</th>
</tr>

<?php



$con=mysqli_connect("localhost","root","","ecommerce");


$i=1;

  
  $price="select * from categories order by cat_id";
  $run_pro=mysqli_query($con,$price);
  while($row_pro=mysqli_fetch_array($run_pro))
  {
    

    $pro_id=$row_pro['cat_id'];

$pro_title=$row_pro['cat_title'];



     echo "<tr align='center'>
  <td>$i.</td>
  
  
  <td> $pro_title</td>
  <td><a href='edit.php?cat_id=$pro_id'>edit</a></td>
  <td><a href='delete.php?cat_id=$pro_id'>delete</a></td>
</tr>";

$i=$i+1;

  }


  

?>
</table>
</form>
</div>