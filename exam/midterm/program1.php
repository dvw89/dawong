<?php
    function displayItinerary() {
        
        $months_days = array("november"=>30, "december"=>31, "january"=>31, "february"=>28);
        $num_days = $months_days[$_POST['month']];
        
        $france_images = array('bordeaux', 'le_havre', 'lyon', 'montpellier', 'paris', 'strasbourg');
        $mexico_images = array('acapulco', 'cabos', 'cancun', 'chichenitza', 'huatulco', 'mexico_city');
        $usa_images = array('chicago', 'hollywood', 'las_vegas', 'ny', 'washington_dc', 'yosemite');
        
        $france_locations = array('bordeaux'=>'Bordeaux', 'le_havre'=>"Le Havre", 'lyon'=>"Lyon", 'montpellier'=>"Montpellier", 'paris'=>"Paris", 'strasbourg'=>"Strasbourg");
        $mexico_locations = array('acapulco'=>"Acapulco", 'cabos'=>"Cabos", 'cancun'=>"Cancun", 'chichenitza'=>"Chicenitza", 'huatulco'=>"Huatulco", 'mexico_city'=>"Mexico City");
        $usa_locations = array('chicago'=>"Chicago", 'hollywood'=>"Hollywood", 'las_vegas'=>"Las Vegas", 'ny'=>"New York", 'washington_dc'=>"Washington DC", 'yosemite'=>"Yosemite");
        
        $current_locations = array();
        $current_images = array();
        
        if ($_POST['country'] == 'usa') {
            $current_locations = $usa_locations;
            $current_images = $usa_images;
        }
        if ($_POST['country'] == 'mexico') {
            $current_locations = $mexico_locations;
            $current_images = $mexico_images;
        }
        if ($_POST['country'] == 'france') {
            $current_locations = $france_locations;
            $current_images = $france_images;
        }
        
        shuffle($current_images);
        
        
        
        for ($i = 5 - $_POST['num_locations']; $i > 0; $i--) {
            array_pop($current_images);
        }
        
        if ($_POST['alphabetical'] == 'A-Z') {
            sort($current_images);
        }
        else if ($_POST['alphabetical'] == 'Z-A') {
            rsort($current_images);
        }
        
        $trip_dates = array();
        
        for ($num_visits = $_POST['num_locations']; $num_visits > 0; $num_visits--) {
            $new_date = rand(1, $num_days);
            while (in_array($new_date, $trip_dates)) {
                $new_date = rand(1, $num_days);
            }
            $trip_dates[] = $new_date;
        }
        
        sort($trip_dates);
        
        $schedule_month = ucfirst($_POST['month']);
        
        echo "<div id='itinerary_header'/>";
        echo "<h1> " . $schedule_month . " Itinerary <h1><br/>";
        echo "Visiting " . $_POST['num_locations'] . " places in Mexico";
        echo "</div>";
        
        
        
        $current_day = 1;
        $num_rows = ceil($num_days / 7.0);
        echo "<table border='1' style='margin:0 auto' cellpadding=7>";
        for ($rows = 1; $rows <= $num_rows; $rows++) {
            echo "<tr>";
            for ($i = 0; $i < 7; $i++) {
                if ($current_day <= $num_days && !in_array($current_day, $trip_dates)) {
                    echo '<td>' . $current_day . "</td>";
                }
                else if (current_day <= $num_days && in_array($current_day, $trip_dates)) {
                    $days_image = $current_images[0];
                    echo "<td>";
                    echo $current_day . "<br/>";
                    echo "<img src=img/" . $_POST['country'] . "/" . $days_image . ".png>";
                    echo "<strong>" . $current_locations[$days_image] . "</strong>";
                    echo "</td>";
                    array_shift($current_images);
                }
                $current_day += 1;
            }
            echo "</tr>";
        }
        
        
    }



?>
<!DOCTYPE html>
<html>
    <head>
        <title> Winter Vacation Planner </title>
    </head>
    <body>
          
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:##99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Errors are displayed if month or number of locations are not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>Header and Subheader are displayed with info submitted. </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#99E999">
      <td>4</td>
      <td>A table with days and weeks is displayed when submitting the form</td>
      <td align="center">5</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>5</td>
      <td>The number of days in the table correspond to the month selected</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>6</td>
      <td>Random images are displayed in random days</td>
      <td align="center">5</td>
    </tr>       
    <tr style="background-color:#99E999">
      <td>7</td>
      <td>The number of random images correspond to the number of locations and country submitted</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>8</td>
      <td>The proper name of the location is displayed below the image 
      		(e.g. "New York", "Las Vegas")</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
      <td align="center">15</td>
    </tr>    
    <tr style="background-color:#99E999">
      <td>10</td>
      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
      <td align="center">15</td>
    </tr>        
    <tr style="background-color:#FFC0C0">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

        
        <h1> Winter Vacation Planner </h1>
        <form method="POST">
            Select Month: <select name="month">
                <option value="none"> Select </option>
                <option value="november"> November </option>
                <option value="december"> December </option>
                <option value="january"> January </option>
                <option value="february"> February </option>
            </select>
            
            <br />
            
            Number of locations: <strong><input type="radio" name="num_locations" value=3 id="3">
            <label for="3"> Three </label>
            <input type="radio" name="num_locations" value=4 id="4">
            <label for="4"> Four </label>
            <input type="radio" name="num_locations" value=5 id="5">
            <label for="5"> Five </label></strong>
            
            <br />
            
            Select Month: <select name="country">
                <option value="usa"> USA </option>
                <option value="mexico"> Mexico </option>
                <option value="france"> France </option>
            </select>
            
            <br />
            
            Visit loactions in alphabetical order:
            <strong>
            <input type="radio" name="alphabetical" value="A-Z" id="A-Z">
            <label for="A-Z"> A-Z </label>
            <input type="radio" name="alphabetical" value="Z-A" id="Z-A">
            <label for="Z-A"> Z-A </label>
            </strong>
            
            <br />
            
            <input type="submit" value="Create Itinerary" />
            
            <br />
            <hr>
            
            <?php 
                if ($_POST['month'] != 'none' && isset($_POST['num_locations']) && isset($_POST['country']) && isset($_POST['alphabetical'])) {
                    displayItinerary();
                }
                else if ($_POST['month'] == 'none' || !isset($_POST['num_locations']) || !isset($_POST['country']) || !isset($_POST['alphabetical'])) {
                    echo "<h3> Please enter all the necessary information to create the itinerary! </h3>";
                }
            ?>
            
        </form>
        <br />
    </body>
</html>