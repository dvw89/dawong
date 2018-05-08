<?php

    include '../dbConnection.php';
    
    include 'inc/header.php';
    
    $conn = getDatabaseConnection("davidmart");

    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM `dm_category` ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            
            echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
            
        }
        
    }
    
    function displaySearchResults(){
        global $conn;
        
        if (isset($_GET['searchForm'])) { //checks whether user has submitted the form
            
            echo "<h3>Products Found: </h3>"; 
            
            //following sql works but it DOES NOT prevent SQL Injection
            //$sql = "SELECT * FROM om_product WHERE 1
            //       AND productName LIKE '%".$_GET['product']."%'";
            
            //Query below prevents SQL Injection
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM dm_product WHERE 1";
            
            if (!empty($_GET['product'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND prodName LIKE :productName";
                 $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
            }
                  
                  
            if (!empty($_GET['category'])) { //checks whether user has typed something in the "Category" text box
                 $sql .=  " AND catId = :categoryId";
                 $namedParameters[":categoryId"] =  $_GET['category'];
            }
            
            if (!empty($_GET['priceFrom'])) { //checks whether user has typed something in the "Price from" text box
                 $sql .=  " AND price >= :priceFrom";
                 $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
            }
            
            if (!empty($_GET['priceTo'])) { //checks whether user has typed something in the "Price to" text box
                 $sql .=  " AND price <= :priceTo";
                 $namedParameters[":priceTo"] =  $_GET['priceTo'];
            }
            
            if (isset($_GET['orderBy'])) { //checks whether if the user has checked the "order by" radio buttons.
                 if ($_GET['orderBy'] == "price") {
                     $sql .= " ORDER BY price";
                 }
                 
                 else if ($_GET['orderBy'] == "name") {
                     $sql .= " ORDER BY prodName";
                 }
            }
            
            //echo $sql; //for debugging purposes
            
             $stmt = $conn->prepare($sql);
             $stmt->execute($namedParameters);
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($records as $record) {
                
                echo "<a href = \"purchaseHistory.php?productId=" . $record["productId"] . "\"> History </a>";
                echo  $record["prodName"] . " $" . $record["price"] . "<br />";
            
            }
        }
        
    }

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Headshot Games Product Search </title>
        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
    </head>
    <style>
    @import url("css/styles.css");
    </style>
    <body>

        <h1> Headshot Games Product Search </h1>
        
        <form>
            
            Product: <input type="text" name="product" /><br />
            
            Category: 
                <select name="category">
                    <option value=""> Select One </option>
                    <?=displayCategories()?>
                </select>
            <br />
            
            Price:  From <input type="text" name="priceFrom" size="7"/>
                    To   <input type="text" name="priceTo" size="7"/>
                    
            <br />
            
             Order result by:<br />
             
             <input type="radio" name="orderBy" value="price"/> Price <br />
             <input type="radio" name="orderBy" value="name"/> Name
             
             <br />
             <input type="submit" value="Search" name="searchForm" />
             
        </form>
        
        <br />
        <hr>
        
        <?= displaySearchResults() ?>

    </body>
</html>