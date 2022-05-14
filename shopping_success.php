<?php
include("header.php");
?>
<div class="container">
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>

<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
   <form method="POST"> Your Shopping is success. You can receive your products as soon as possible. Continue Shopping By Clicking this link.<input type="submit"  value="Home Page" name="submit1">
<?php
if(isset($_POST["submit1"])) 
{ 
	unset($_SESSION["cart"]);
	header('Location:index.php');
} 
?>
</form>
  </div>
</div>
</div>
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
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p style="font-size:30px;">Aww yeah, you receive your orders in <?php 
        $date = new DateTime('now');
        date_add($date, date_interval_create_from_date_string('5 days'));
    echo date_format($date, 'd-m-Y');
   ?>!</p>
</div>
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
					<th>GRAND TOTAL</th>
					<th>DOWNLOAD INVOICE</th>
				</tr>
 </thead>
	
	<tbody>
		<?php
$total=0;
		$sno=1;
		foreach($_SESSION['cart'] as $keys=>$values)
		{
			$name=$values["name"];
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
						<td>{$gt}</td>
						</tr>

					
			";
			$sno++;
		}
		echo "
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Net Amount</td>
												<td>{$total}</td>";
												
    $query="SELECT * from orders ";
    $s=1;
    $query_run=mysqli_query($connect,$query);
    if(mysqli_num_rows($query_run)> 0){
    while($row = mysqli_fetch_assoc($query_run)){
        $id=$row['id'];
echo"

      <form method='POST' action='bill.php'>
    <input type='hidden' name='id' value='$id'>
      <td rowspan='2'><button class='btn'><input type='submit' value='Download' class='btn'><img src='images/download.png' style='font-size:66px'></button></td>
      </form>
   
	  ";	

$s++;
    }
}
echo"
												
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


