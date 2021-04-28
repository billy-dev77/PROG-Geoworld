<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 *
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{

    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = "SELECT * FROM Country WHERE Continent = :cont";
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);
    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}


/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}

/**
 * Obtenir la liste déroulante des continents
 *
 * @return liste d'objets
 */
function getContinents()
{
    global $pdo;
    $query = 'SELECT DISTINCT Continent FROM Country;';
    return $pdo->query($query)->fetchAll();
}
/**
 * L'autentification des utilisateur
 */
function getAuthentification($login,$pass)
{
    global $pdo;
    $query = "SELECT * FROM utilisateurs WHERE login = :login and password = :pass";
    $prep = $pdo->prepare($query);

    $prep->bindValue(':login',$login);
    $prep->bindValue(':pass',$pass);
    $prep->execute();
//On vérifie que la requête ne retourne qu'une seule ligne
    if ($prep->rowCount() == 1){
        $result = $prep->fetch();
        return $result;
    }
    else
        return 0;
}


/**Obtenir la liste des utilisateurs
 *
 */
function tabutilisateur() {
    global $pdo;
    $query = 'SELECT * FROM Utilisateurs;';
    return $pdo->query($query)->fetchAll();
}

//mise a jour
function updateSalarieRR($nom,$prenom,$login,$pwd,$id){
    global $pdo;
    $requete = "update utilisateurs set nom=:nom,prenom=:prenom,login=:login,password=:pwd where id=:id";
    $prep = $pdo->prepare($requete);
    $prep->bindValue(':id', $id);
    $prep->bindValue(':nom', $nom);
    $prep->bindValue(':prenom', $prenom);
    $prep->bindValue(':login', $login);
    $prep->bindValue(':pwd', $pwd);
    $prep->execute();
}

/**
 * @param $capital
 * @return mixed
 */
function drapeau($capital){

    global $pdo;
    $query1 = 'SELECT Code2 FROM country WHERE name = :capital;';
    $prep1 = $pdo->prepare($query1);
    $prep1->bindValue(':capital', $capital, PDO::PARAM_STR);
    $prep1->execute();
    return $prep1->fetchColumn();

}

function drapeau2($idCountry){
    //select Code2 from country where id = idCountry
    global $pdo;
    $query1 = 'SELECT Code2 FROM country WHERE id = :idCountry;';
    $prep1 = $pdo->prepare($query1);
    $prep1->bindValue(':idCountry', $idCountry, PDO::PARAM_STR);
    $prep1->execute();
    return $prep1->fetchColumn();

}


/**
 * Protection des comptes
 */
function protection_admin(){

    if (isset($_SESSION['role'])&& ($_SESSION['role']==1)) {
        return 0;
    }else{
        return 1;
    }

}

function protection_user(){

    if (isset($_SESSION['role'])&& ($_SESSION['role']==0)) {
        return 0;
    }else{
        return 1;
    }

}




/**
 * @param $vartable
 * debeugeur
 */
function debug($vartable){

    echo '<pre>' . print_r($vartable, true) . '</pre>';
}
