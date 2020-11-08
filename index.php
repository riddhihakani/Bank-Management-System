<?php 

include('./includes/header.php');

?>
      <head>
        <link rel="stylesheet" href="css/main.css">
      </head>
      <!--main page-->
      <!--carousel-->
      <div id="carousel">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 350px;">
            <img src="assets/images/insurance.jpg" class="d-block w-100" alt="..." style="height: 350px;">
          </div>
          <div class="carousel-item" style="height: 350px;">
            <img src="assets/images/loan1.jpg" class="d-block w-100" alt="..." style="height: 350px;">
          </div>
          <div class="carousel-item" style="height: 350px;">
            <img src="assets/images/saving.jpg" class="d-block w-100" alt="..." style="height: 350px;">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <!--firstrow-->
    <!-- <div class="container justify-content-center m-3"> -->
      <div class="row justify-content-center mt-3">
            <div class="col-md-5">
              <h4>Calculators</h4>
              <div class="card mb-3" style="max-width: 540px;border: 0.5px solid darkgray">
                <div class="row m-2" style="border: 1px solid darkgray;"  id="calc">
                  <h3 class="mt-4 ml-2">Personal Loan EMI Calculator</h3>
                </div>
                <div class="row m-2" style="border: 1px solid darkgray;"  id="calc">
                  <h3 class="mt-4 ml-2">SIP Calculator</h3>
                </div>
                <div class="row m-2" style="border: 1px solid darkgray;"  id="calc">
                  <h3 class="mt-4 ml-2">RD Calculator</h3>
                </div>
                <div class="row m-2" style="border: 1px solid darkgray;"  id="calc">
                  <h3 class="mt-4 ml-2">SME Calculators</h3>
                </div>
              </div>
            </div>
            <div class="col-md-3" >
            <h4>Treasure your savings</h4>
              <div class="card" style="width: 18rem;border: 0.5px solid darkgray">
                <img src="assets/images/savings.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Interest Rates upto 10%</h5>
                  <p class="card-text">Some quick example text to build on the card title </p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-3" >
              <h4>Offers for you</h4>
              <ul class="list-group list-group-flush justify-content-center" style="border: 0.5px solid darkgray">
                <li class="list-group-item "><i class="fas fa-plane fa-2x"></i>Cras justo odio</li>
                <li class="list-group-item "><i class="fas fa-heartbeat fa-2x"></i>Dapibus ac facilisis in</li>
                <li class="list-group-item"><i class="fas fa-piggy-bank fa-2x"></i>10% interest on your savings</li>
                <li class="list-group-item"><i class="fab fa-cc-amazon-pay fa-2x"></i>% interest on your savings</li>
                <li class="list-group-item"><i class="fas fa-car-crash fa-2x"></i>% interest on your savings</li>
              </ul>
              <div class="card-footer">
                <a href=""><h6>VIEW ALL</h6></a>
              </div>
            </div>
      </div>
    <!-- </div> -->
    <!--ROW2-->
    <div class="row mt-3 justify-content-center">
      <div class="col-md-7 mr-4" style="background-color: white; border: 0.5px solid darkgray">

      </div>
      <div class="col-md-3 ml-4" style="background-color: white; border: 0.5px solid darkgray">
          <h4 class="mb-5 mt-2 justify-content-center">Need Help? | Contact Us</h4>
          <hr>
          <h5>Loan Restructuring FAQs</h5>
          <hr>
          <h5>Interest Rates</h5>
          <hr>
          <h5>Forms Center</h5>
          <hr>
          <h5>Forms center</h5>
          <hr>
          

      </div>
    </div>
    <!--row3-->
  <div class="row row-cols-1 row-cols-md-3 m-5">
  <div class="col mb-4">
    <div class="card h-100">
      <img src="assets/images/eduloan.png" class="card-img-top" alt="..." style="height: 310px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card h-100">
      <img src="assets/images/home.jpg" class="card-img-top" alt="..." style="height: 310px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a short card.</p>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card h-100">
      <img src="assets/images/business.png" class="card-img-top" alt="..." style="height: 310px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  
</div>
    

    <!-- Footer -->
<?php 
  include('./includes/footer.php');
?>