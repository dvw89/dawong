<?php

session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:login.php");
}
include '../dbConnection.php';
$conn = getDatabaseConnection("davidmart");

include 'inc/header.php';

function displayAllProducts(){
    global $conn;
    $sql="SELECT * FROM dm_product";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);

    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            
            form {
                display: inline;
            }
            
        </style>
        
        <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete it?");
                
            }
            
        </script>
        
    </head>
    <body>


        
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
        
        <br />
        <h4><a href="statistics.php">Some vital statistics</a></h4>
        
        <br />
        <form action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        
        <form action="logout.php">
            <input type="submit"  value="Logout"/>
        </form>
        
        <br /> <br />
        <strong> Products: </strong> <br />
        
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                echo "[<a href='updateProduct.php?productId=".$record['prodId']."'>Update</a>]";
                //echo "[<a href='deleteProduct.php?productId=".$record['prodId']."'>Delete</a>]";
                
                echo "<form method='GET' action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='deleted' value=". $record['prodId'] ."  />";
                echo "<input type='submit' value='Remove'>";
                echo "</form>";
                
                echo $record['prodName'];
                echo " $" . $record['price'];
                echo '<br>';
            }
        
        ?>
        
        

    </body>
</html>