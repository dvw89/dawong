<?php
    session_start();
    if(!isset($_SESSION['adminName'])) {
        header('Location:index.php');
    }
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("ottermart");
    
    function getCategories() {
        global $conn;
        
        $sql = 'SELECT catName, catId FROM om_category';
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }
if (isset($_GET['$submitProduct'])) {
    $name = $_GET['productName'];
    $description = $_GET['description'];
    $image = $_GET['productImage'];
    $price = $_GET['price'];
    $categoryID = $_GET['catId'];
    
    $sql = "INSERT INTO om_product 
    ( 'productName', 'productDescription', 'productImage', 'price', 'catId') 
    VALUES ( :productName, :productDescription, :productImage, :productPrice, :catID)";
    
    $np = array();
    $np[':productName'] = $name;
    $np[':productDescription'] = $description;
    $np[':productImage'] = $image;
    $np[':productPrice'] = $price;
    $np[':catID'] = $categoryID;
    
    $statement = $conn->prepare($sql);
    $statement->execute($np);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Add a Product </title>
    </head>
    <body>
        <h1> Add a Product </h1>
        
        <form>
            Product Name: <input type='text' name='productName'> <br>
            Description: <textarea cols='50' rows='4' name='description'> </textarea><br>
            Price: <input type='text'  name='price'> <br>
            Set image url: <input type='text' name='productImage'><br>
            Category: 
            <select name='catId'>
                <option value=''>Select One</option>
                <?=
                $categories = getCategories();
                foreach($categories as $category) {
                    echo "<option value='" . $category['catId'] . "' > " . $category['catName'] . " </option>";
                }
                ?>
            </select>
            <input type='submit' name='submitProduct'>
        </form>

    </body>
</html>