<?php

header('Content-Type: application/json');

require_once 'modele.class.php';

if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
} else {
    exit('{"error":"email non renseigné"}');
}

if (isset($_REQUEST['mdp']))
{
    $mdp = $_REQUEST['mdp'];
}
else
{
    exit('{"error":"mdp non renseigné"}');
}

$result [] = Modele :: verifConnexion($email, $mdp);

print(json_encode($result));
?>