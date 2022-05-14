
 <?php include("header.php")?> 

 <div id="container">
<div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel" style="height:70vh">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slider/1.png" class="d-block w-100" alt="..." style="height:70vh">
      <div class="header-text">
          <h1 id="h1" data-text="A Floral affair">A Floral affair</h1>
          <button class="button btn btn-outline-dark" style="vertical-align:middle" ><span><a href="gold.php" style="text-decoration:none; color:white;"> Explore More</a></span>
        </div>
    </div>
    <div class="carousel-item">
      <img src="images/slider/2.jpg" class="d-block w-100" alt="..." style="height:70vh">
      <div class="header-text">
      <h1 id="h1" data-text="Stunning Collections!">Stunning Collections!</h1>
          <button class="button btn btn-outline-dark" style="vertical-align:middle"><span><a href="collections.php" style="text-decoration:none;color:white;"> Explore More</a></span>   
        </div>
    </div>
    <div class="carousel-item">
      <img src="images/slider/3.jpg" class="d-block w-100" alt="..." style="height:70vh">
      <div class="header-text">
      <h1 id="h1" data-text="Engagement Rings">Engagement Rings</h1>
          <button class="button btn btn-outline-dark" style="vertical-align:middle" href="erings.php"><span><a href="erings.php" style="text-decoration:none;color:white;"> Explore More</a></span>
        </div>
    </div>
  </div>
</div> 


<div id="container-fluid">
    <div class="container-fluid">
        <h1>Shop By Gender</h1>
      <div class="row">
        <div class="column">
          <a href=""> <img src="images/men.jpg" alt="MEN" style="width:100%" class="image responsive"></a>
          <div class="overlay">
            <div class="text">MEN</div>
          </div>
        </div>
        <div class="column">
          <a href=""><img src="images/women.jpg" alt="WOMEN" style="width:100%" class="image responsive"></a>
          <div class="overlay">
            <div class="text">WOMEN</div>
          </div>
        </div>
        <div class="column">
         <a href=""> <img src="images/kids.jpg" alt="KIDS" style="width:100%" class="image responsive {
          width: 100%;
          height: auto;
        }"></a>
          <div class="overlay">
            <div class="text">KIDS</div>
          </div>
        </div>
      </div>
    </div> 
    </div>
    <!---video--->
    <div style="height:50%" class="mt-2 mb-2">
<video autoplay loop muted playsinline style="width:100%;height:20%;display:block;">
  <source src="2.mp4" type="video/mp4" style="width:70%">
</video> 
</div>

<div class="text-center mt-4  mb-4">
<div class="btn-group" role="group" aria-label="Basic ">
<input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
  <label class="btn btn-outline-dark " for="btnradio1" onclick="loadDoc()">FEATURED</label>
  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
  <label class="btn btn-outline-dark" for="btnradio2" onclick="loadDoc1()">ON SALE</label>
  <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
  <label class="btn btn-outline-dark" for="btnradio3" onclick="loadDoc11()">EXCLUSIVE</label>
</div>
</div>
<div class="text-center container">
<img src="images/ajax1logo.jpg" style="width:170px;height:100px;margin-bottom:10px;">
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row " id="demo">
        <div class="col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card ">
                <img src="images/heroine2.jpg" class="card-img-top h-50" alt="...">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title" style=" font-family: 'Brush Script MT', cursive; font-size:20px;"><b>RIVAAH </b></br> A jewel for every tradition.</h5>
              
                </div>
              </div>
        </div>
        <div class="col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card ">
                <img src="1.jpg" class="card-img-top h-50" alt="...">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title" style=" font-family: 'Brush Script MT', cursive; font-size:20px;"><b>VIRASAT </b></br> Range starting from Rs. 35,000 only.</h5>
                
                </div>
              </div>
        </div>
        <div class="col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card ">
                <img src="2.jpg" class="card-img-top h-50" alt="...">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title" style=" font-family: 'Brush Script MT', cursive; font-size:20px;"><b>PREEN </b></br> Party Diamond starting form Rs.30,000</h5>
                 
                </div>
              </div>
        </div>
        <div class="col-lg-3 mb-4 d-flex align-items-stretch">
            <div class="card">
                <img src="3.jpg" class="card-img-top h-50" alt="...">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title" style=" font-family: 'Brush Script MT', cursive; font-size:20px;"><b>GLITERATI</b> </br> Diamond starting from Rs.55,000.</h5>

                </div>
              </div>
        </div>
    </div>
</div>
<div id="demo" class="container"></div>


<script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax1.php");
  xhttp.send();
}
function loadDoc1() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax2.php");
  xhttp.send();
}
function loadDoc11() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax3.php");
  xhttp.send();
}
</script>

