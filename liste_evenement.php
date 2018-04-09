<?php

header('Content-Type: application/json');

require_once 'model.class.php';

$res[] = array(Modele :: listerevenements());


echo json_encode(array_values($res));
?>