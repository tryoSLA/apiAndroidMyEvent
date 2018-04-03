<?php

class Modele
{
    private static $pdo;

    public static function connexion()
    {
        try {
            Modele:: $pdo = new PDO("mysql:host=localhost;dbname=paris_2024", "user_paris2024", "123");
        } catch (exception $e) {
            echo $e . '</br />';
        }
    }

    public static function verifConnexion($email, $mdp)
    {
        Modele:: connexion();
        $mdp = md5($mdp);

        $requete = "SELECT count(*) as nb, pseudo, id_personne, role FROM utilisteur WHERE email =:email AND mdp = :mdp group by id_personne;";

        $select = Modele:: $pdo->prepare($requete);
        $donnes = array(":email" => $email, ":mdp" => $mdp);

        $select->execute($donnes);

        $res = $select->fetch();

        return $res;
    }

    public static function listerevenements()
    {
        Modele:: connexion();

        $requete = "SELECT * FROM evenement";

        $select = Modele:: $pdo->prepare($requete);
        $select->execute();
        $resultats = $select->fetchAll();
        return $resultats;
    }

    public static function voirUnEvenements($idEvenement)
    {
        Modele:: connexion();
        $requete = "SELECT * FROM evenement WHERE id_event =:idEvenement;";
        $select = Modele:: $pdo->prepare($requete);
        $donnes = array(":idEvenement" => $idEvenement);
        $select->execute($donnes);
        $resultats = $select->fetchAll();
        return $resultats;
    }

    public static function voirMesEvenements($idUser)
    {
        Modele:: connexion();
        $requete = "SELECT * FROM my_events WHERE id_personne =:idUser;";
        $select = Modele:: $pdo->prepare($requete);
        $donnes = array(":idUser" => $idUser);
        $select->execute($donnes);
        $resultats = $select->fetchAll();
        return $resultats;
    }


}

?>