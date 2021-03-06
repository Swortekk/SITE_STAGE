<?php

include_once "bd_connexion.php";

function getUtilisateurs()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMailU($mailU)
{


    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where mailUtilisateur=:mailU");
        $req->bindValue(':mailU', $mailU);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByIdProf($id)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where idProfesseur= :id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function insertUtilisateur($mail, $mdp, $droit, $idProf)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO utilisateur VALUES (:mail, :mdp, :droit, :idProf)");
        $req->bindValue('mail', $mail);
        $req->bindValue('mdp', $mdp);
        $req->bindValue('droit', $droit);
        $req->bindValue('idProf', $idProf);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function updateMdptUtilisateur($mdp, $idProf)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("UPDATE utilisateur SET mdpUtilisateur = :mdp where idProfesseur = :idProf");
        $req->bindValue('mdp', $mdp);
        $req->bindValue('idProf', $idProf);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function str_to_noaccent($str)
{
    $url = $str;
    $url = preg_replace('#??#', 'C', $url);
    $url = preg_replace('#??#', 'c', $url);
    $url = preg_replace('#??|??|??|??#', 'e', $url);
    $url = preg_replace('#??|??|??|??#', 'E', $url);
    $url = preg_replace('#??|??|??|??|??|??#', 'a', $url);
    $url = preg_replace('#@|??|??|??|??|??|??#', 'A', $url);
    $url = preg_replace('#??|??|??|??#', 'i', $url);
    $url = preg_replace('#??|??|??|??#', 'I', $url);
    $url = preg_replace('#??|??|??|??|??|??#', 'o', $url);
    $url = preg_replace('#??|??|??|??|??#', 'O', $url);
    $url = preg_replace('#??|??|??|??#', 'u', $url);
    $url = preg_replace('#??|??|??|??#', 'U', $url);
    $url = preg_replace('#??|??#', 'y', $url);
    $url = preg_replace('#??#', 'Y', $url);
     
    return ($url);
}

function resetPassword($mdp,$idProf)
{
    try {
        $connex = connexionPDO();
        $req = $connex->prepare("UPDATE utilisateur SET mdpUtilisateur = :mdp where idProfesseur = :idProf");
        $req->bindValue('mdp', $mdp);
        $req->bindValue('idProf', $idProf);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getDroit(){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from droit");
    
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getDroitUtilisateur($id){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT idDroitUtilisateur FROM utilisateur WHERE idProfesseur = :id");
        $req->bindValue('id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>