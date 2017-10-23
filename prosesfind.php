<?php 
$books = [];
$search = $_REQUEST['q'];
$json = json_decode(file_get_contents("http://mcc-ws-odd1718.herokuapp.com/books.php?q=$search"));
$books = $json;
header('content-type: application/json');
print json_encode($books); ?>
