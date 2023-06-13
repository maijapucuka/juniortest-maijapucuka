<?php

//start session and require all necessary files
session_start();

require_once '../models/DatabaseConnection.php';
require_once '../models/Product.php';

//create new DatabaseConnection instance and call function to connect to the database
$db = new DatabaseConnection();
$db_connection = $db->connect();

//
if(isset($_POST['multiple-delete-product-btn'])) {
    $all_SKU = $_POST['prod_delete_sku']; //return an array of all SKU for the products to be mass deleted
    if(empty($all_SKU)) {
        header("location: ../view/index.php");//if MASS DELETE button is pressed when no products is checked exit the function
    } else {      
        $product = new Product($db_connection);// create new Product class instance and call function to delete checked products
        $product->deleteProduct($all_SKU);// $product->deleteProduct($deletedProductsSKU);
    }
    
} 




?>