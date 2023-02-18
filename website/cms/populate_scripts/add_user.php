<?php
require __DIR__ . '/../../vendor/autoload.php';
$client = new MongoDB\Client;
$db = $client->ecomerce;
$collection = $db->users;
$data = [
    'Name' => 'Damien',
    'Surname' => 'Maujean',
    'Email' => 'damienmaujean@gmail.com',
    'Password' => '12345678',
    'Phone' => '57684567',
    'Address' => 'Tamarin',
    'Category' => 'admin'
];
$Result = $collection->insertOne($data);
if ($Result->getInsertedCount() > 0) {
    echo "Data Inserted";
    echo ' New document id: ' . $Result->getInsertedId();
} else {
    echo "Data Not Inserted";
}