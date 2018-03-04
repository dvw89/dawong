<?php
  
  $backgroundImage = "img/sea.jpg";
  
  if (isset($_GET['keyword'])) {
    include "api/pixabayAPI.php";
    
    if (!empty($_GET['category'])) {
      echo "<h3 class='headerText'>You searched for " . $_GET['category'] . "</h3>";
    }
    else if (!empty($_GET['keyword'])) {
      echo "<h3 class='headerText'>You searched for " . $_GET['keyword'] . "</h3>";
    }
    
    $orientation = 'horizontal';
    $keyword = $_GET['keyword'];
    
    if (isset($_GET['layout'])) {
      $orientation = $_GET['layout'];
    }
    
    if (!empty($_GET['category'])) {
      $keyword = $_GET['category'];
    }
    
    $imageURLs = getImageURLs($keyword, $orientation);
    
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
  }
  
  function checkCategory($category) {
      if ($category == $_GET['category']) {
        echo " selected";
      }
    }

?>


<!DOCTYPE html>
<html>
  <head>
    <title> Lab 4: Pixabay Carousel </title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  </head>
  <style>
    @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    @import url("css/styles.css");
    body { 
      background-image: url(<?=$backgroundImage?>);
      background-size: 100% 100%;
      background-attachment: fixed;
    }
  
    #carouselExampleIndicators {
      width: 500px;
      margin: 0 auto; /*centers a div container*/
    }
    
  </style>
  <body>
    
    
    <?php
      if (!isset($_GET['keyword'])) {
        echo "<h2 class='headerText'> You must type a keyword or select a category </h2>";
      }
    ?>
    
    <form method="GET">
      <input type="text" size="20" name="keyword" placeholder="Keyword to search for" value="<?=$_GET['keyword']?>"/>
      
      <div class="btn-group-vertical">
        <input type="radio" name="layout" value="horizontal" id="hlayout"  <?=($_GET['layout']=="horizontal")?"checked":"" ?>>
        <label for="hlayout" class="radioButton"> Horizontal </label>
        <input type="radio" name="layout" value="vertical" id="vlayout" <?=($_GET['layout']=="vertical")?"checked":"" ?>> 
        <label for="vlayout" class="radioButton"> Vertical </label>
      </div>
      
      
      <select name="category">
        <option value="">  Select One </option>
        <option <?=checkCategory('Ocean')?>> Ocean </option>
        <option <?=checkCategory('Forest')?>> Forest </option>
        <option <?=checkCategory('Sky')?>> Sky </option>
      </select>
      
      <input type="submit" value="Submit"/>
    </form>
    
    <?php
      if (isset($_GET['keyword'])) {
    ?>
  
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="Fifth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="Sixth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="<?=$imageURLs[array_rand($imageURLs)]?>" alt="Seventh slide">
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
    
    <?php
      }
    ?>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
  
</html>