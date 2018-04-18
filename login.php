<?php session_start();

/********************************
	 DATABASE & FUNCTIONS
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/


if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) &&
    !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (isUsernameAvailable($db, $username) && isEmailAvailable($db, $email)){
        userRegistration($db, $username, $email, $password);
        userConnection($db, $email, $password);
        header('Location: dashboard.php');
    }elseif(!isEmailAvailable($db, $email)){
        $_SESSION['message'] = "Email indisponible";
        header('Location: register.php');
    }else{
        $_SESSION['message'] = "Username indisponible";
        header('Location: register.php');
    }
}else{
    $_SESSION['message'] = 'Erreur : Formulaire incomplet';
    header('Location: register.php');
}


/********************************
			VIEW
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';