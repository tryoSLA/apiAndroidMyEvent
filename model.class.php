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

        $requete = "SELECT count(*) as nb, pseudo, id_personne, role FROM utilisateur WHERE email='".$email."' AND mot_de_passe='".$mdp."' group by id_personne;";
        $select = Modele:: $pdo->prepare($requete);

        $select->execute();

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

    public static function updateMesEvenements($particpation, $idUser, $idEvenement)
    {
        Modele:: connexion();

        if ($particpation == "participe")
        {
            $tab = "'".Date("Y-m-d")."',$idUser , $idEvenement";
            $requete = "INSERT INTO Inscrire VALUES (".$tab.");";
            $select = Modele:: $pdo->prepare($requete);
            $select->execute();
        }elseif ($particpation == "non_participe"){
            $where = " WHERE id_personne = ".$idUser." AND id_event = ".$idEvenement;
            $requete = "DELETE FROM Inscrire ".$where.";";
            $select = Modele:: $pdo->prepare($requete);
            $select->execute();
        }
    }
}

?>