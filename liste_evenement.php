<?php

header('Content-Type: application/json');

require_once 'model.class.php';

$res = Modele :: listerevenements();

print (json_encode($res));
?>