<?php

    session_start();

    function displayAllProducts() {
        
        $conn = getDatabaseConnection("product");
        
        $sql = "SELECT productName, productDescription, price FROM 'om_product' ORDER BY productName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        foreach ($record as $item) {
            echo $item['productName'] . " " . $item["productDescription"] . " $" . $record['price'] . "<br/>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
    </head>
    <body>

        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?> </h3>
        
        <br />
        
        <strong> Products: </strong>
        
        <?=displayAllProducts()?>
        
    </body>
</html>