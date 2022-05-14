<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tanisq Gold</title>
  <style>
#qty{
	border-radius: 10px;
	outline: none;
	border: none;
	padding: 10px 0;
	width:6em;
	text-align: center;
	font:  890px;
	color: black;
	background: transparent;
	box-shadow: inset -2px -2px 2px rgba(255,255,255,.2),
				inset 2px 5px 15px rgba(0,0,0,.5);

}
    </style>
</head>
<body>
  

 <?php include("header.php")?>  

<div class="container">
<?php 
include("connection.php");

if(isset($_POST["addcart"])) {
$id= $_GET['id'];
if(isset($_SESSION['cart'][$id])){
  $previous= $_SESSION['cart'][$id]['qty'];
  $_SESSION['cart'][$id] = array("id"=>$id, "qty"=> $previous+=$_POST['qty']);
}else{
  $_SESSION['cart'][$id] = array("id"=>$id, "qty"=> $_POST['qty']);
}
}

?>

<?Php
 $query="SELECT * from dbangle where id='{$_GET["id"]}'";
 $query_run=mysqli_query($connect,$query);
 if(mysqli_num_rows($query_run)> 0){
?>
 
  
        <div>
        <?php
      while($row = mysqli_fetch_assoc($query_run)){
        ?>
  
  
   <form action="dbangleviewcart.php?action=add&id=<?php echo $row['id']?> " method="post">
   <div class="container-fluid mt-3">    
  <div class="row">
  <div class="col text-center ">
  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"  class="img-fluid mw-100 h-100 img-thumbnail"> '?>
     </div>
     <div class="col">
     <p class="h5"><?php echo $row['name'] ?></p>
     <h4 class="text-danger"> Rs.<?php echo $row['price']?></h4><br>
     <p class="h5">
     <?php echo $row['description']?>
      </p></br>
  
     <div><p style="font-size:15px;display:inline;">Weight (grams): </p><h4 style="border:1px solid black; padding:5px; display:inline;" class="text-dark"><?php echo $row['weight']?></h4></div>
    

	<p style="font-size:15px;margin-top:15px;"> Quantity:
  <input type="number"  name="qty" id="qty" value="1" min="1" max="10" required>
  </p>

	<p><input type="hidden"  name="name" value="<?php echo $row['name'] ?>" class="form-control"></p>
	<p><input type="hidden"  name="price" value="<?php echo $row['price'] ?>" class="form-control"></p>
  <p><input type="hidden"  name="gst" value="<?php echo $row['gst'] ?>" class="form-control"></p>
	<p><input type="submit" name="addcart" class="btn btn-outline-success mt-2"  value="Add to Cart"></p>
  </div>
  </div>
  </form>

   

    <?php
 }
 ?>
    </div>
  <?php
}
 else{
   echo "No record found";
 }
?>
</div>

</body>
</html>


