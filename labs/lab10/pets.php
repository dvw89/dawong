<?php

    include 'inc/header.php';
    
    include '../../dbConnection.php';
    
    function getAllPets(){
        
      $conn = getDatabaseConnection('pets');
      
      $sql = "SELECT id, name, type FROM pets ORDER BY name";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $records;  
    }
    
?>

<script>
    
    $(document).ready(function(){
        
            $(".petLink").click(function(){
                
                //alert(  );
                $.ajax({

                    type: "GET",
                    url: "api/getPetInfo.php",
                    dataType: "json",
                    data: { "id": $(this).attr("id")},
                    success: function(data,status) {
                       //alert(data.breed);
                       //log.console(data.pictureURL);
                       
                       $("#petInfo").html("<h2>" + data.name +"</h2>");
                       $("#petInfo").append(data.breed + "<br>");
                       $("#petInfo").append(data.description + "<br>");
                       $("#petInfo").append("<img src='img/" + data.pictureURL +"' width='150'>");
                       
                    
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                });//ajax
                
                
            });
        
        
    }); //document ready
    
    
</script>


<?php
    $petList = getAllPets();
    
    //print_r($petList);
    
    foreach ($petList as $pet) {
        
        echo "Name: <a href='#' class='petLink' id='".$pet['id']."'  > " . $pet['name'] . " </a> <br>";
        echo "Type: " . $pet['type'] . "<br><br>";
        
    }

?>


<div id="petInfo"></div>


<?php

    include 'inc/footer.php';

?>