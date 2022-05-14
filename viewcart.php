<?php include("header.php")?> 
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include("connection.php");
?> 
<!DOCTYPE html>
<html>
	<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
          max-width: 1000px; /* New width for default modal */
        }
    }
	.lh-condensed { line-height: 1.25; }
</style>

</head>
<body>
<?php 

if(isset($_GET["del"]))
				{
					foreach($_SESSION["cart"] as $keys=>$values)
					{
							if($values["id"]==$_GET["del"])
							{
								unset($_SESSION["cart"][$keys]);
							}
					}
					
				}
		
			
if(isset($_GET['action']) == "add"){
$id= $_GET['id'];
$name=$_POST['name'];
if(isset($_SESSION['cart'][$id])){
  $previous= $_SESSION['cart'][$id]['qty'];
  $_SESSION['cart'][$id] = array("id"=>$id, "qty"=> $previous+=$_POST['qty'], "name"=>$name,  "price"=>$_POST['price'],  "gst"=>$_POST['gst']);
}else{
  $_SESSION['cart'][$id] = array("id"=>$id, "qty"=> $_POST['qty'], "name"=>$name,  "price"=>$_POST['price'],  "gst"=>$_POST['gst']);
}
}

?>
<div class="container">
	
<div calss="row">
       
	   <div class="col-md-12">
	   <div class="table-responsive text-center">
			<table class='table table-striped  table-hover'>	
				<thead>
				<tr>
				<th>S.NO</th>
					<th>ITEM NAME</th>
					<th>QUANTITY</th>
					<th>PRICE</th>
					<th>TOTAL</th>
					<th>GST</th>	
					<th>GRAND TOTAL</th>
					<th>ACTIONS</th>
				</tr>
 </thead>
	
	<tbody>
		<?php
$total=0;
		$sno=1;
		foreach($_SESSION['cart'] as $keys=>$values)
		{
			$amt=$values["qty"]*$values["price"];
		$gst=$amt*18/100;
		$gt=$amt+$gst;
		$total=$total+$gt;
			echo "
					<tr>
					<td>{$sno}</td>
						<td>{$values["name"]}</td>
						<td>{$values["qty"]}
						</td>
						<td>{$values["price"]}</td>
						<td>{$amt}</td>
						<td>{$gst}</td>
						<td>{$gt}</td>
						<td><a role='button'class='btn btn-white btn-sm' href='viewcart.php?del={$values["id"]}'><img src='images/delete.png'></a></td>
						</tr>

					
			";
			$sno++;
		}
		echo "
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>Net Amount</td>
												<td>{$total}</td>
												<td></td>
												<td></td>
											</tr>";	
											
											echo "
											<tr>
												<td></td>
												<td></td>
												
												<td colspan=3><a href='signupform.php'  role='button' class='btn btn-dark btn-lg text-center mt-2 ' >Proceed To Buy</a></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>";	
		?>

	  </tbody>	
	  </table>

	  </div> 
	</div>
</div>

</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header  bg-dark bg-gradient">
        <h5 class="modal-title text-white" id="exampleModalLabel" >CHECKOUT FORM</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="h4">Your cart</span>
				<span class="badge rounded-pill bg-secondary ms-3">
					<?php

if(isset($_SESSION['cart'])){
  echo count($_SESSION['cart']); 
}
else{
echo 0;
}
?>
</span>
				<?php
$total=0;
		$sno=1;
		foreach($_SESSION['cart'] as $keys=>$values)
		{
			$amt=$values["qty"]*$values["price"];
		$gst=$amt*18/100;
		$gt=$amt+$gst;
		$total+=$gt;
			echo "
                <span class='badge badge-secondary badge-pill'>3</span>
            </h4>
            <ul class='list-group mb-3 sticky-top'>
                <li class='list-group-item d-flex justify-content-between lh-condensed'>
                    <div>
                        <h6 class='my-0'>{$values["name"]}</h6>
                        <small class='text-muted'>Brief description</small>
                    </div>
                    <span class='text-muted'>RS.$gt</span>
                </li>
            
				";
				$sno++;
			}
			?>

<?php
			echo "
			
                <li class='list-group-item d-flex justify-content-between'>
                    <span>Total (INR)</span>
                    <strong>RS.{$total}</strong>
                </li>
            </ul>

			";
		?>
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Name</label>
                        <input type="text" class="form-control" id="firstName"  value="" required="">
                        <div class="invalid-feedback"> Valid Name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" required="">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                </div>
            
              
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address"  required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" required="">
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100 h-50" id="country" required="">
                            <option value="">Choose...</option>
                            <option>United States</option>
							<option>UK</option>
							<option>France</option>
							<option>India</option>
							<option>Brazil</option>
							<option>Australia</option> 
							<option>Germany</option> 
							<option>Srilanka</option>
                        </select>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100 h-50" id="state" required="">
                            <option value="">Choose...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback"> Please provide a valid state. </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <div class="invalid-feedback"> Expiration date required </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                </div>
          
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button class="btn btn-dark btn-block" type="submit">Continue to checkout</button>
            </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>
