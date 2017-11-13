<?php
require('./config.php');

	
$postdata = file_get_contents("php://input");
$q = json_decode($postdata);


$t = $q->data;

$stmt = $db->prepare("UPDATE products SET name=?, price=?, category_id=?, quantity=?, description=?, picture=?, status=?, shipping=? WHERE id = ?");

$stmt->bind_param("sdiisssbd", $name, $price, $category_id, $quantity, $description, $picture, $status, $shipping, $id);

$id = $t->id;
$name = $t->name;
$category_id = $t->category_id;
$quantity = $t->quantity;
$price = $t->price;
$shipping = $t->shipping;
$picture = $t->picture;
$description = $t->description;
$status = $t->status;

if($stmt->execute()) 
    echo 'updated';
else
   echo 'denied';

?>