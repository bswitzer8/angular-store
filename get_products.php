
<?php
require('./config.php');



// it will print whole json string, which you access after json_decocde in php
 $query = "SELECT * FROM products";

$sth = mysqli_query($db, $query);
$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}


echo(json_encode($rows, true));
?>