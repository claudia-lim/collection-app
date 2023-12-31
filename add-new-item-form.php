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
    <a href="add-new-item-form.php"><i class="fa-solid fa-plus"></i> Add New Paint</a>
    <a href="archive.php"><i class="fa-solid fa-eraser"></i> Archive</a>
</nav>
<div class="form-layout">
    <h2>Add New Paint</h2>

    <form method="post" action="process-new-item.php">
        <div class="form-input">
            <label for="brand-input">Brand Name: </label>
            <input list="brand-options" id="brand-input" name="brand-input" required>
            <datalist id="brand-options">
                <?php
                foreach ($brands as $brand) {
                    echo '<option value="' . $brand->getBrand() . '">';
                }
                ?>
            </datalist>
        </div>

        <div class="form-input">
            <label for="colour-input">Colour:</label>
            <input list="colours-options" id="colour-input" name="colour-input" required>

            <datalist id="colours-options">
                <?php
                foreach ($colours as $colour) {
                    echo '<option value="' . $colour->getColour() . '">';
                }
                ?>
            </datalist>
        </div>

        <div class="form-input">
            <label for="need-replacing">Does it need replacing?</label>
            <select id="need-replacing" name="need-replacing" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>

        <div class="form-input">
            <label for="image-url">Image URL:</label>
            <input type="text" id="image-url" name="image-url">
        </div>
        <div class="button">
            <button type="submit"><i class="fa-solid fa-plus"></i> Add</button>
        </div>

    </form>

</div>
<footer>
    Claudia Lim 2023
</footer>

</body>
</html>
