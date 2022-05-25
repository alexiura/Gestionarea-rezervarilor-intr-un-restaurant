<?php
error_reporting(E_ALL );
ini_set("display_errors", 1);
include_once "Db.php";
//include "src/Session.php";
include_once "functions.php";
//$db = Db::getInstance();
//$user =  $db->select("login" , ['idLogin'=>'2']);
//var_dump($user);
//$session = new Session();
//$session->start();

session_start();
redirectIfNotAuthenticated();


include_once "head.php";

include_once "home.php";

include_once "about.php";

include_once "menu.php";

include_once "reservation.php";

include_once "bottom.php";
