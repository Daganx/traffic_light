<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=light_traffic;charset=utf8', 'root', 'root');
var_dump($_SESSION);
