<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:index.php");
}
include "../dbConnection.php";

include 'inc/header.php';

$conn = getDatabaseConnection("davidmart");

$max = $conn->query('SELECT MAX(price) FROM dm_product')->fetchColumn();
$max = round($max, 2);
$average = $conn->query('SELECT AVG(price) FROM dm_product')->fetchColumn();
$average = round($average, 2);
$min = $conn->query('SELECT MIN(price) FROM dm_product')->fetchColumn();
$min = round($min, 2);
$count = $conn->query('SELECT COUNT(prodId) FROM dm_product')->fetchColumn();
$most_expensive = $conn->query('SELECT prodName FROM dm_product WHERE price = (SELECT MAX(price) FROM dm_product)')->fetchColumn();
$least_expensive = $conn->query('SELECT prodName FROM dm_product WHERE price = (SELECT MIN(price) FROM dm_product)')->fetchColumn();
$total_sales = $conn->query('SELECT SUM(unitPrice) FROM dm_purchase')->fetchColumn();
$total_sales = round($total_sales, 2);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Statistics</title>
    </head>
    <body>
        <h1>Vital Statistics</h1>
        <div>Total sales: <?php echo $total_sales ?></div>
        <hr> <br>
        <div> Average price of item: <?php echo $average ?></div>
        <hr> <br>
        <div>Number of products in store: <?php echo "" . $count . "" ?></div>
        <hr> <br>
        <div>Most expensive item: <?php echo "" . $most_expensive . " " . $max . ""?></div>
        <hr> <br>
        <div>Least expensive item: <?php echo "" . $least_expensive . " " . $min . ""?></div>
        <hr> <br>
    </body>
</html>