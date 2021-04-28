<?php
require_once ('inc\manager-db.php');
session_start();
// on teste si nos variables sont définies et remplies
if (isset($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['login']) && !empty($_POST['login'])){
//On appele la fonction getAuthentification en lui donnant un paramètre le login et le password
//La fonction retourne les caractéristiques de l'utilisateur si il est connu sinon elle retourne false
    $result = getAuthentification($_POST['login'],$_POST['pwd']);


// Si le resultat n'est pas false
    if ($result ){
//On démarre la session
//

//On enregistre les  paramètres de notre visiteur comme variable de session
//
        $_SESSION['nom'] = $result->nom;
        $_SESSION['prenom'] = $result->prenom;
        $_SESSION['service'] = $result->service;
        $_SESSION['login'] = $result->login;
        $_SESSION['role'] = $result->role;

//On redirige notre visiteur vers une page de notre section membre
//
        if ($_SESSION['role'] == 0) {
            ?>
            <script> location.replace("gestion_user.php"); </script>
            <?php
        }
        if ($_SESSION['role'] == 1) {
            ?>
            <script> location.replace("gestion_admin.php"); </script>
            <?php
        }

    }
    //Si le resultat est false on redirige vers la page d'authentification
    else {
       header("Location: login.php");
        echo "<br>";
        echo "Mauvais mot de passe";
    }
}
//si nos variables ne sont pas renseignées on redirige vers la pages d'authentification
else{
    header("Location: login.php");
}

?>