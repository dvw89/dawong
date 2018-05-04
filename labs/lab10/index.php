<?php

    include 'inc/header.php';

?>

    <style>
    #carouselExampleIndicators {
      width: 500px;
      margin: 0 auto; /*centers a div container*/
    }
    
    #carousel-example-generic {
         margin: 0 auto;   
         width: 700px;
    }
        
    </style>
        
        
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src='img/alex.jpg' alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src='img/carl.jpg' alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src='img/charlie.jpg' alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src='img/sally.jpg' alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src='img/samantha.jpg' alt="Fifth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src='img/ted.jpg' alt="Sixth slide">
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
        
        
        <br>
        
        <a href="pets.php"  class="btn btn-outline-primary" role="button" aria-pressed="true"> Adopt Now! </a>
        
        
        <br>
        

<?php

    include 'inc/footer.php';

?>