<?php

 include '../dbConnection.php';
    
 $connection = getDatabaseConnection("davidmart");
    
 $sql = "DELETE FROM dm_product WHERE prodId =" . $_GET['deleted'];
 $statement = $connection->prepare($sql);
 $statement->execute();
 
 header("Location: admin.php");
?>