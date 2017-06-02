<?php
session_start();

include 'inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$main = new Main();

$main->getMain();
