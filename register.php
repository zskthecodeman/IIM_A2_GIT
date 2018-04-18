<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username'])) {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(isUsernameAvailable($db, $username)) {
            if(isEmailAvailable($db, $email)) {
                userRegistration($db, $username, $email, $password);
                header('Location: dashboard.php');
            } else {
                $error = "Email indisponible";
            }
        } else {
            $error = "Username indisponible";
        }



    } else {
        $error = 'Champs requis !';
    }
}

include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
