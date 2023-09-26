<?php
require_once 'classes/paints.php';
$host = 'db';
$db = 'collection_app';
$user = 'root';
$password = 'password';

$dsn = "mysql:host=$host;dbname=$db;";

$pdo = new PDO($dsn, $user, $password);

$query = $pdo->prepare(
    'SELECT `paints`.`id`, `brands`.`name` AS "brand_name", 
    `colours`.`name` AS "colour_name", 
    `paints`.`needs_replacing` AS "need_replacing", 
    `paints`.`image`
    FROM `paints`
    INNER JOIN `colours`
    ON `paints`.`colour_id` = `colours`.`id`
    INNER JOIN `brands`
    ON `paints`.`brand_id` = `brands`.`id`
    ORDER BY `paints`.`id`;'
);

$query->execute();

$paints = $query->fetchAll(PDO::FETCH_CLASS, 'paints');

//echo '<pre>';
//print_r($paints);
//echo '</pre>';
