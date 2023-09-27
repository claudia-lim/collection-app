<?php
require_once 'fetchdb.php';
require_once 'classes/Paints.php';
require_once 'functions-process-new-item.php';

//function alreadyInCollection (array $paints, Paints $newPaint){
//    foreach ($paints as $paint) {
//        if ($newPaint->getBrandName() == $paint->getBrandname()
//            && $newPaint->getColourName() == $paint->getColourName()
//            && $newPaint->getNeedReplacing() == $paint->getNeedReplacing()) {
//            return true;
//        }
//    }
//    return false;
//}
//
//function validImageInput(string $imageFormInput) {
//    if (!$imageFormInput){
//        return true;
//    }
//    else {
//        if (filter_var ($imageFormInput, FILTER_VALIDATE_URL)) {
//            return true;
//        }
//        else {
//            return false;
//        }
//    }
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add New Paint</title>

    <meta name="description" content="Paint Collection App">
    <meta name="author" content="Claudia Lim">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/form.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bebas+Neue&family=Cutive+Mono&display=swap"
          rel="stylesheet">

    <link rel="icon" href="images/paint-svgrepo-com.svg" sizes="192x192">
    <link rel="shortcut icon" href="images/paint-svgrepo-com.svg">
    <link rel="apple-touch-icon" href="images/paint-svgrepo-com.svg">

    <!-- <script defer src="js/index.js"></script> -->
</head>

<body>

<header>
    <h1>Paint Collection App</h1>
</header>

<nav>
    <a href="index.php"><i class="fa-solid fa-paintbrush"></i> Home</a>
    <a href="add-new-item-form.php"><i class="fa-solid fa-plus"></i> Add New Paint</a>
</nav>

<?php
$brandFormInput = $_POST['brand-input'];
$colourFormInput = $_POST['colour-input'];
$needReplacingFormInput = $_POST['need-replacing'];
$imageFormInput = $_POST['image-url'];


echo '<div class = "new-item">'
    . '<h2>New Item</h2>'
    . '<p>Brand: ' . $brandFormInput . '</p>'
    . '<p>Colour: ' . $colourFormInput . '</p>'
    . '<p>Need Replacing? ' . $needReplacingFormInput . '</p>'
    . '<p>Image URL: ' . $imageFormInput . '</p>';

if (in_array($brandFormInput, $brandList)) {
    $brandInputId = array_search($brandFormInput, $brandList);
} else {
    $sqlInsertBrand = "INSERT INTO `brands`(`name`) VALUES (:name);";

    $queryBrand = $pdo->prepare($sqlInsertBrand);
    $queryBrand->bindParam(":name", $brandFormInput);
    $queryBrand->execute();

    $sqlGetId = "SELECT `id` FROM `brands` WHERE `name`= :name";

    $queryColourId = $pdo->prepare($sqlGetId);
    $queryColourId->bindParam(":name", $brandFormInput);
    $queryColourId->execute();
    $newBrandIdArray = $queryColourId->fetchAll(PDO::FETCH_ASSOC);

    $brandInputId = $newBrandIdArray['id'];
}

if (in_array($colourFormInput, $colourList)) {
    $colourInputId = array_search($colourFormInput, $colourList);
} else {
    $sqlInsertColour = "INSERT INTO `colours`(`name`) VALUES (:name);";

    $queryColour = $pdo->prepare($sqlInsertColour);
    $queryColour->bindParam(":name", $colourFormInput);
    $queryColour->execute();

    $sqlGetId = "SELECT `id` FROM `colours` WHERE `name`= :name";

    $queryColourId = $pdo->prepare($sqlGetId);
    $queryColourId->bindParam(":name", $brandFormInput);
    $queryColourId->execute();
    $newColourIdArray = $queryColourId->fetchAll(PDO::FETCH_ASSOC);

    $colourInputId = $newColourIdArray['id'];
}

if ($needReplacingFormInput == 'Yes') {
    $needReplacingInputBool = 1;
} else {
    $needReplacingInputBool = 0;
}

$newPaint = new Paints;
$newPaint->setBrandName($brandFormInput);
$newPaint->setColourName($colourFormInput);
$newPaint->setNeedReplacing($needReplacingInputBool);
$newPaint->setImage($imageFormInput);


$alreadyInCollection = alreadyInCollection($paints, $newPaint);
$validImageInput = validImageInput($imageFormInput);

if ($alreadyInCollection) {
    echo '<h3 class="form-feedback">Already in Collection - Not added</h3>';
}
elseif (!$validImageInput) {
    echo '<h3 class="form-feedback">Invalid image input - try again</h3>';
}
else {
        $sqlInsertPaint = 'INSERT INTO `paints` (`brand_id`, `colour_id`, `needs_replacing`, `image`)
VALUES (:brand_id, :colour_id, :needs_replacing, :image)';

        $queryNewPaint = $pdo->prepare($sqlInsertPaint);
        $queryNewPaint->bindParam(":brand_id", $brandInputId);
        $queryNewPaint->bindParam(":colour_id", $colourInputId);
        $queryNewPaint->bindParam(":needs_replacing", $needReplacingInputBool);
        $queryNewPaint->bindParam(":image", $imageFormInput);
        $queryNewPaint->execute();
        echo "<h3 class='form-feedback'>New paint added to collection.</h3>";
    }

echo '</div>';
?>

<footer>
    Claudia Lim 2023
</footer>

</body>
</html>
