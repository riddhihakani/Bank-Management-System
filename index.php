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
            <img src="assets/images/insurance.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" style="height: 350px;">
            <img src="assets/images/loan1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" style="height: 350px;">
            <img src="assets/images/saving.jpg" class="d-block w-100" alt="...">
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
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <h5>Treasure your savings</h5>
              <div class="card" style="width: 18rem;">
                <img src="assets/images/savings.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Interest Rates upto 10%</h5>
                  <p class="card-text">Some quick example text to build on the card title </p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <h5>Offers for you</h5>
              <ul class="list-group list-group-flush justify-content-center">
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
    

    <!-- Footer -->
<?php 
  include('./includes/footer.php');
?>