<?php

require_once 'model.class.php';

if (isset($_REQUEST['id_user'])) {
    $idUser = $_REQUEST['id_user'];
} else {
    exit('{"error":"id User non renseigné"}');
}

$res = Modele:: voirMesEvenements($idUser);
echo json_encode($res);