
<?php
include("connection.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jwellery Home Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="bootstrap/css/all.min.css">
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    

    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
   body {
     font-family: 'Raleway', sans-serif;
     letter-spacing: 2px;
     font-size: 12px;
     font-weight: 700;
     text-decoration: none;
     height: auto;
     color:black;
  } 
  .column {
    float: left;
    width: 33.33%;
    padding: 5px;
  }
  
  /* Clearfix (clear floats) */
  .row::after {
    content: "";
    clear: both;
    display: table;
  }
  .column {
    position: relative;
    
  }
  
  .image {
    display: block;
    width: 100%;
    height: auto;
  }
  
  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
  }
  
  .column:hover .overlay {
    opacity: 2;
  
  }
  .column:hover .image {
    filter: blur(8px);
  -webkit-filter: blur(8px);
  
  }
  
  .text {
    color:white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }
  .container-fluid{
    margin-top: 30px;
  }

  .responsive {
  width: 100%;
  height: auto;
  }
  .container-fluid h1{
    font: 25px "Playfair Display",sans-serif;
    font-weight: 400;
      text-align: center;
      margin-bottom: 20px;
  }
  div.gallery {
    margin: 5px;
    border: 1px ;
    float: left;
    width: 269px;
 
  }
  
  div.gallery:hover {
    border: 1px solid #ccc;
    padding:20px;
  }
  
  div.gallery img {
    width: 100%;
    height:200px;
  }
  
  div.desc {
    padding: 12px;
    text-align: center;
  }
  div.desc1:hover {
font-size:20px;
  }
  /* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

  /* Full-width input fields */
  input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 10%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
  margin-bottom:5px;
}

/* The Modal (background) */
.modals {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modals-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 400px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 40%;
  }
}

/* for carousal animations*/
.header-text {
      position: absolute;
      font-size: 3vw;
      top: 40%;
      left: 15.8%;
      right: auto;
      width: 20.66666666666666%;
      color: #fff;
    }

    #h1 {
      position: relative;
      font-size:3vw;
      color: #39383e;
      -webkit-text-stroke: 0.1vw rgb(78, 74, 74);
      font-family: 'Brush Script MT', cursive;
      margin-left: 0%;

    }

    #h1::before {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 100%;
      color: white;
      -webkit-text-stroke: 0vw rgb(78, 74, 74);
      border-right: 2px solid white;
      overflow: hidden;
      animation: animate 6s linear infinite;

    }

    @keyframes animate {

      0%,
      10%,
      100% {
        width: 0;
      }

      70%,
      90% {
        width: 100%;
      }
    }
    .button {
  display: inline-block;
  border-radius: 4px;
 
  border: solid 1px white ;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  padding-left: 10px;
  margin-left: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;

}

.button:hover span {
  padding-right: 25px;

}

.button:hover span:after {

  opacity: 1;
  right: 0;
}

      </style>

</head>
<body>
<nav class="navbar sticky-top navbar-light bg-light navbar-expand-lg navigation-wrap" style="margin-top:0px;">
        <div class="container-fluid">
          <a class="navbar-brand " href="index.php" style="margin-left:30px;">
            <img  src="tanishq_logo.png"
              alt="" width="100" height="64" class="d-inline-block align-text-top">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!---For collapse--->
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav  me-auto" style="--bs-scroll-height: 100px;">
              <li class="nav-item me-2">
                <a class="nav-link" aria-current="page" href="index.php">HOME</a>
              </li>
              <div class="dropdown nav-item me-3">
    <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" style="text-decoration:none;cursor:pointer;">GOLD</a>
    <div class="dropdown-menu">
        <a class="nav-link" href="gold.php" class="dropdown-item">Necklace</a>
        <a class="nav-link" href="gbangle.php" class="dropdown-item">Bangle</a>
    </div>
</div>
<div class="dropdown nav-item me-3">
    <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" style="text-decoration:none;cursor:pointer;">DIAMOND</a>
    <div class="dropdown-menu">
        <a class="nav-link" href="diamond.php" class="dropdown-item">Necklace</a>
        <a class="nav-link" href="dbangle.php" class="dropdown-item">Bangle</a>
    </div>
</div>
<div class="dropdown nav-item me-3">
    <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" style="text-decoration:none;cursor:pointer;">PLATINUM</a>
    <div class="dropdown-menu">
        <a class="nav-link" href="erings.php" class="dropdown-item">Engagement Rings</a>
        <a class="nav-link" href="ependants.php" class="dropdown-item">Pendants</a>
    </div>
</div>
              <li class="nav-item me-3">
                <a class="nav-link" href="collections.php">COLLECTIONS</a>
              </li>
              <li class="nav-item me-3">
             
             <a class="nav-link" href="about.php" style="cursor:pointer;"> ABOUT US</a>
                         
             </li>
              <li class="nav-item me-3">
             
<a class="nav-link" href="contact.php" style="cursor:pointer;"> CONTACT US</a>
            
</li>
      
       <li>
        <a href="viewcart.php" role="button" class="btn btn-white position-relative" title="Shopping Cart" id="cart-popover" >
        <!-- <span class="fa fa-shopping-cart" style="font-size:20px;"></span> -->
        <img src="images/cart1.png">
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

  
<?php

    if(isset($_SESSION['cart'])){
      echo count($_SESSION['cart']); 
    }
else{
  echo 0;
}
?>
  </span>
</a>
       </li>
            </ul>

          </div>
        </div>
        <div>
        <a type="button" class="btn " href="adminpage.php">
<img src="images/admin.png" style="width:90px;">
</a>

</div>
      </nav>
   <div id="popover_contnet_wrapper" style="display:none;">
<span id="cart_details">
<div align="right">
     <a href="#" class="btn btn-primary" id="check_out_cart">
     <span class="glyphicon glyphicon-shopping-cart"></span> Check out
     </a>
     <a href="#" class="btn btn-default" id="clear_cart">
     <span class="glyphicon glyphicon-trash"></span> Clear
     </a>
    </div>
</span>
   </div> 



      
<body>

      </div>
     
    </div>
  </div>
</div>
   

      <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
      <script type="text/javascript" src="jquery/js/jquery.validate.min.js"></script>
</body>
</html>