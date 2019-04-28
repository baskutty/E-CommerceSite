<div>

<p style="text-align:center"><img src="paypal.png" width="200" height="150"></p>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" align="center" >

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value=" bastian-buisiness@gmail.com.">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="Hot Sauce-12oz. Bottle">
  <input type="hidden" name="amount" value=<?php 

$tp=total_amount();

  echo "$tp";?>>
  <input type="hidden" name="currency_code" value="USD">

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
  alt="Buy Now">
  <img alt="buy now" border="0" width="1" height="1" 
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>



</div>