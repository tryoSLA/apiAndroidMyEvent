<?php

require_once 'model.class.php';

if (isset($_REQUEST['id_event'])) {
    $idEvenement = $_REQUEST['id_event'];
} else {
    exit('{"error":"id Event non renseigné"}');
}

$res = Modele:: voirUnEvenements($idEvenement);
echo json_encode($res);