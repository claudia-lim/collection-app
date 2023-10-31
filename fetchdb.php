<?php
require_once 'classes/Paints.php';
require_once 'classes/Colour.php';
require_once 'classes/Brand.php';
require_once 'classes/PaintsHydrator.php';
require_once 'classes/ColourHydrator.php';
require_once 'classes/BrandHydrator.php';
$host = 'db';
$db = 'collection_app';
$user = 'root';
$password = 'password';

$dsn = "mysql:host=$host;dbname=$db;";

$pdo = new PDO($dsn, $user, $password);

$paints = PaintsHydrator::fetchActiveCollection($pdo);

$colours = ColourHydrator::fetchAllColours($pdo);
foreach ($colours as $colour) {
    $colourList[$colour->getColourId()] = $colour->getColour();
}

$brands = BrandHydrator::fetchAllBrands($pdo);
foreach ($brands as $brand) {
    $brandList[$brand->getBrandId()] = $brand->getBrand();
}

$paintsArchive = PaintsHydrator::fetchArchivedPaints($pdo);