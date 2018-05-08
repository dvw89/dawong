<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection("davidmart");
    
    include 'inc/header.php';

    $productId = $_GET['productId'];

    $sql = "SELECT * 
            FROM dm_product pr
            LEFT JOIN dm_purchase pu
            ON pr.productId = pu.productId
            WHERE pr.productId = :pId";
    
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($records);
    
    echo $records[0]['prodName'] . "<br>";
    echo "<img src='" . $records[0]['prodImage'] . "' width='200' /><br/>";
    
    if ($records[0]['purchaseDate'] != NULL) {
        foreach ($records as $record) {
            echo "Purchase Date: " . $record["purchaseDate"] . "<br />";
            echo "Unit Price: $" . $record["unitPrice"] . "<br />";
            echo "Quantity: " . $record["quantity"] . "<br />";
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <style>
    @import url("css/styles.css");
    </style>
    <body>

    </body>
</html>