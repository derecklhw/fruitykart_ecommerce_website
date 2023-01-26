<?php   
require __DIR__ . '\vendor\autoload.php';

header("Content-Type: application/json");
$data = json_decode(file_get_contents('php://input'), true);

$_id = $data["_id"];
$name = $data["name"];
$price = $data["price"];
$stock = $data["stock"];
$season = $data["season"];
$category = $data["category"];
$image = $data["image"];

$data_modify = [
    "Name" => $name,
    "Price" => $price,
    "Stock_Available" => $stock,
    "Season" => $season,
    "Category" => $category,
    "Image_link" => $image
];

$client = new MongoDB\Client;
$db = $client->ecomerce;
$collection = $db->products;

$updateOneResult = $collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectId($_id)],
    ['$set' => $data_modify]
);

echo json_encode(["_id" => (string)$updateOneResult->getModifiedCount()]);




?>