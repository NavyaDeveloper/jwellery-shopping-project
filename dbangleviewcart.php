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
		$total+=$gt;
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
						<td><a role='button'class='btn btn-white btn-sm' href='dbangleviewcart.php?del={$values["id"]}'><img src='images/delete.png'></a></td>
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
												
												<td colspan=3><a href='signupform.php'  role='button' class='btn btn-dark btn-lg text-center mt-2 '>Proceed To Buy</a></td>
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

</body>
</html>
