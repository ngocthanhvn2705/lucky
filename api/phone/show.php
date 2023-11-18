<?php 
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json");
    include_once("../../config/db_azure.php");
    include_once("../../model/product.php");

    $db = new db();
    $connect = $db->connect();

    $product = new product($connect);
    
    $product->id = isset($_GET["id"]) ? $_GET["id"] : die();

    $product->show();

    $image_data = base64_encode($product->image);

    $product_item = array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'description' => $product->description,
        'category' => $product->category,
        'brand' => $product->brand,
        'pre_discount' => $product->pre_discount,
        'discount_percent' => $product->discount_percent,
        'image' => $image_data, 
        'color' => $product->color
    );
    print_r(json_encode($product_item));   

?>