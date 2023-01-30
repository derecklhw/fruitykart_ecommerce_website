<?php
require __DIR__ . '/../../vendor/autoload.php';
// $upper_directory = realpath(dirname(__DIR__) . '/..');
// require $upper_directory . '\vendor\autoload.php';

$client = new MongoDB\Client;
$db = $client->ecomerce;
$collection = $db->products;
$cursor = $collection->find();
$data = array();
foreach ($cursor as $document) {
    $data[] = $document;
}
echo json_encode($data);
?>