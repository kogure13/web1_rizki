<?php
session_start();
include '../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

if(!isset($_SESSION['user_login'])){
    if(isset($_POST['submitLogin'])) {
        $user = new User($connString);
        $user->cekLogin($_POST['username'], $_POST['password']);
    }
    include 'model/login.php';
} else {
    include 'model/main.php';
}