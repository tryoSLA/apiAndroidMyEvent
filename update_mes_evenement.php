<?php

require_once 'model.class.php';

if (isset($_REQUEST['id_user'])) {
    $idUser = $_REQUEST['id_user'];
} else {
    exit('{"error":"id User non renseigné"}');
}

if (isset($_REQUEST['particpation'])) {
    $particpation = $_REQUEST['particpation'];
} else {
    exit('{"error":"particpation non renseigné"}');
}

if (isset($_REQUEST['id_event'])) {
    $idEvenement = $_REQUEST['id_event'];
} else {
    exit('{"error":"id Event non renseigné"}');
}

Modele:: updateMesEvenements($particpation, $idUser, $idEvenement);