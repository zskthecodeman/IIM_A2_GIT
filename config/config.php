<?php
/**
 * Created by PhpStorm.
 * User: zskpa
 * Date: 18/04/2018
 * Time: 16:29
 */
$host = 'localhost';
$dbname = 'IIM_Git_SoundCloud';
$user = 'root';
$pass = '';


try{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}