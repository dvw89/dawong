<?php

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("midterm");
    
    function question1(){
        global $conn;
        
        $sql = "SELECT firstName, lastName FROM celebrity WHERE gender = 'F' AND country_of_birth != 'USA' ORDER BY lastName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        print_r($records);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>