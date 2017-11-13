<?php
require('./config.php');

	
$postdata = file_get_contents("php://input");
$q = json_decode($postdata);


$t = $q->data;
//echo "reaching";




$stmt = $db->prepare("INSERT INTO products (name, status, description, picture, category_id, quantity, price, shipping) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");


$stmt->bind_param("ssssiidb", $name, $status, $description, $picture, $category_id, $quantity, $price, $shipping);

$name = $t->name;
$category_id = $t->category_id;
$quantity = $t->quantity;
$price = $t->price;
$shipping = $t->shipping;
$picture = $t->picture;
$description = $t->description;
$status = $t->status;

if($stmt->execute()) 
    echo 'added';
else
   echo 'denied';

?>