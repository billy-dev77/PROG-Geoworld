<?php
require_once 'header.php'
?>

<?php

if(!empty($_POST)){

    $errors = array();

    if(empty($_POST['username']) || !preg_match("/^[a-z0-9_]+$/",$_POST['username'])){
        $errors['username'] = "Votre nom n'est pas valide (alphanumerique)";

    }
    if(empty($_POST['email'])){
    }
}

?>

<html>

<h1>S'inscrire</h1>


<form action="" method="post">

    <div class="form-group">

        <label for="">Nom</label>

        <input type="text" name="usernam" class="form-control"/>

    </div>

    <div class="form-group">

        <label for="">Prenom</label>
        <input type="text" name="usernam" class="form-control"/>
    </div>

    <div class="form-group">

        <label for="">Service</label>
        <input type="text" name="service" class="form-control"/>
    </div>

    <div class="form-group">

        <label for="">Login</label>
        <input type="text" name="login" class="form-control"/>
    </div>

    <div class="form-group">

        <label for="">Mot de passe </label>
        <input type="password" name="pwd" class="form-control"/>
    </div>

    <div class="form-group">

        <label for="">Confirmez votre mot de passe </label>
        <input type="password" name="pwd_confirm" class="form-control"/>
    </div>

    <div class="form-group">

        <label for="">Role</label>
        <input type="text" name="role" class="form-control"/>
    </div>


    <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>



</html>