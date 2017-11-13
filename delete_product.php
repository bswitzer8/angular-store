
<?php
require('./config.php');

$postdata = file_get_contents("php://input");
$t = json_decode($postdata);
$id = $t->id;


$stmt = $db->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("d", $id);


if($stmt->execute())
    echo 'removed';
else
    echo 'denied';

?>