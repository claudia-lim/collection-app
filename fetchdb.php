<?php
require_once 'classes/Paints.php';
require_once 'classes/Colour.php';
require_once 'classes/Brand.php';
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
    WHERE `deleted` = 0
    ORDER BY `paints`.`id`;'
);

$query->execute();

$paints = $query->fetchAll(PDO::FETCH_CLASS, 'Paints');

$query2 = $pdo->prepare(
'SELECT `name` AS "colour_name", `id` AS "colour_id"
FROM `colours`
ORDER BY `name`;'
);

$query2->execute();

$colours = $query2->fetchAll(PDO::FETCH_CLASS, 'Colour');

foreach ($colours as $colour) {
    $colourList[$colour->getColourId()] = $colour->getColour();
}

$query3 = $pdo->prepare ('SELECT `name` AS "brand_name", `id` AS "brand_id"
FROM `brands`
ORDER BY `name`;'
);

$query3->execute();

$brands = $query3->fetchAll(PDO::FETCH_CLASS, 'Brand');

foreach ($brands as $brand) {
    $brandList[$brand->getBrandId()] = $brand->getBrand();
}

