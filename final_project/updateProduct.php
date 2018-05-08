<?php
    include '../dbConnection.php';
    
    $connection = getDatabaseConnection("davidmart");
    
    include 'inc/header.php';
    
    function getCategories($catId) {
        global $connection;
        
        $sql = "SELECT catId, catName from dm_category ORDER BY catName";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option  ";
            echo ($record["catId"] == $catId)? "selected": ""; 
            echo " value='".$record["catId"] ."'>". $record['catName'] ." </option>";
    }
}
    
    function getProductInfo()
    {
        global $connection;
        $sql = "SELECT * FROM dm_product WHERE prodId = " . $_GET['productId'];
    
        //echo $_GET["productId"];
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    
    if (isset($_GET['updateProduct'])) {
        
        //echo "Trying to update the product!";
        
        $sql = "UPDATE dm_product
                SET prodName = :productName,
                    prodDescription = :productDescription,
                    prodImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE prodId = :productId";
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
                
        $statement = $connection->prepare($sql);
        $statement->execute($np);        

        
    }
    
    
    if(isset ($_GET['productId']))
    {
        $product = getProductInfo();
    }
    
    //print_r($product);
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Product</title>
        
    </head>
    <body>
        <h1>Update Product</h1>
        
        <form>
            <input type="hidden" name="productId" value= "<?=$product['prodId']?>"/>
            Product name: <input type="text" value = "<?=$product['prodName']?>" name="productName"><br>
            Description: <textarea name="description" cols = 50 rows = 4><?=$product['prodDescription']?></textarea><br>
            Price: <input type="text" name="price" value = "<?=$product['price']?>"><br>
    
            Category: <select name="catId">
                <option>Select One</option>
                <?php getCategories( $product['catId'] ); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "productImage" value = "<?=$product['prodImage']?>"><br>
            <input type="submit" name="updateProduct" value="Update Product">
            <br> <br>
            <a href="admin.php">Back to admin page.</a>
            
        </form>
    </body>
</html>