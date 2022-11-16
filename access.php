<?php 
    include 'php/header.php';
    require_once 'php/database.php';

    if (isset($_POST['username'], $_POST['email'], $_POST['password'])){
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT);

        $verifUsername = $pdo -> prepare("SELECT * FROM utilisateur WHERE username = '$username'");
        $verifUsername -> execute();
        if ($verifUsername){
            $verifUsername = $verifUsername -> fetch();
        }

        $verifMail = $pdo -> prepare("SELECT * FROM utilisateur WHERE email = '$email'");
        $verifMail -> execute();
        if ($verifMail){
            $verifMail = $verifMail -> fetch();
        }

        if ($username == ''){
            $errorUsername = "La case est vide !";
        }
        elseif(!is_bool($username) && $username == $verifUsername['username']){
            $errorUsername = "Le pseudo n'est pas disponible !";
        }
        elseif ($email == '') {
            $erreurEmail = "Veuillez renseigner un email !";
        } 
        elseif (!is_bool($verifMail) && $email == $verifMail['email']) {
            $erreurEmail = "Cette adresse mail existe déjà !";
        }
        elseif ($_POST['password'] == '') {
            $erreurMDP = "Veuillez renseigner un mot de passe !";
        } 
        elseif ($_POST['passwordVerif'] == '') {
            $erreurVerifMDP = "Veuillez confirmer votre mot de passe !";
        } 
        elseif ($_POST['password'] != $_POST['passwordVerif']) {
            $erreurVerifMDP = "Les mots de passe ne correspondent pas !";
        }
        else {
            $insert = $pdo->prepare('INSERT INTO utilisateur(username, email, password) VALUES(?,?,?)');
            $insert->execute(array($username, $email, $password));
            $_SESSION['role'] = 'user';
            $_SESSION['name'] = $username;
        }
    } 

    //IF THIS FILE IS SEND TO THE SERVER WITH AN INPUT, YOU CAN ACCESS TO /access.json BY MODIFYING THE URL
    //THIS FILE SHOULD NEVER BE ON PRODUCTION, BE CAREFUL
?>