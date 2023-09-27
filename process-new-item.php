<?php
require_once 'fetchdb.php';
require_once 'classes/Paints.php';
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
</nav>

    <h2>Add New Paint</h2>

<?php
$brandFormInput = $_POST['brand-input'];

$colourFormInput = $_POST['colour-input'];

$needReplacingFormInput = $_POST['need-replacing'];

$imageFormInput = $_POST['image-url'];

echo '<p>New Item</p>'
. '<p>Brand: ' . $brandFormInput . '</p>'
. '<p>Colour: ' . $colourFormInput . '</p>'
. '<p>Need Replacing? ' . $needReplacingFormInput . '</p>'
. '<p>Image URL: ' . $imageFormInput . '</p>';

echo '<pre>';
print_r($brandList);
echo '</pre>';

if (in_array($brandFormInput, $brandList)) {
    echo 'Brand already in Brands table';
$brandInputId = array_search($brandFormInput, $brandList);
echo '<p>Brand ID: ' . $brandInputId . '</p>';

}
else {
    echo 'Brand needs to be added to Brands table';
}


echo '<pre>';
print_r($colourList);
echo '</pre>';

if (in_array($colourFormInput, $colourList)) {
    echo 'Colour already in Colours table';
    $colourInputId = array_search($colourFormInput, $colourList);
    echo '<p>Brand ID: ' . $colourInputId . '</p>';
}
else {
    echo 'Colour needs to be added to Colours table';
    $sqlInsertColour = "INSERT INTO `colours`(`name`) VALUES (:name);";

    $queryColour = $pdo->prepare($sqlInsertColour);
    $queryColour->bindParam(":name", $colourFormInput);
    $queryColour->execute();
}


if ($needReplacingFormInput == 'Yes') {
    $needReplacingInputBool = 1;
}
else {
    $needReplacingInputBool = 0;
}

echo '<p>Need replacing bool: ' . $needReplacingInputBool . '</p>';

?>




<footer>
    Claudia Lim 2023
</footer>

</body>
</html>
