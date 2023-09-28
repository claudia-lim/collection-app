<?php
require_once 'fetchdb.php';
require_once 'classes/Paints.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paint Collection App</title>

    <meta name="description" content="Paint Collection App">
    <meta name="author" content="Claudia Lim">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bebas+Neue&family=Cutive+Mono&display=swap" rel="stylesheet">

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

    <div class="grid">
        <h2>Deleted Paint</h2>
    <?php
    $paintSelectedId = $_POST['delete'];
    $sqlFetchSelectedPaint = 'SELECT `paints`.`id`, `brands`.`name` AS "brand_name", 
    `colours`.`name` AS "colour_name", 
    `paints`.`needs_replacing` AS "need_replacing", 
    `paints`.`image`
    FROM `paints`
    INNER JOIN `colours`
    ON `paints`.`colour_id` = `colours`.`id`
    INNER JOIN `brands`
    ON `paints`.`brand_id` = `brands`.`id`
	WHERE `deleted` = 0 AND`paints`.`id`= :id
    ORDER BY `paints`.`id`;';

    $querySelectedPaint = $pdo->prepare($sqlFetchSelectedPaint);
    $querySelectedPaint->bindParam(":id", $paintSelectedId);
    $querySelectedPaint->execute();
    $selectedPaint = $querySelectedPaint->fetchAll(PDO::FETCH_CLASS, 'Paints');


        echo '<section class="paint-container">
                 <div class="image-container">';
        if ($selectedPaint[0]->getImage() == "No Image") {
            echo '<p>No Image Available</p>';
        } else {
            echo '<img alt="Image of paint" src=' . $selectedPaint[0]->getImage() . '>';
        }
        echo '</div>
                    <div class="paint-info">
            <table>
                <tr>
                    <td class="attribute">Brand:</td>
                    <td class="info">' . $selectedPaint[0]->getBrandName() . '</td>
                </tr>
                <tr>
                    <td class="attribute">Colour:</td>
                    <td class="info">' . $selectedPaint[0]->getColourName() . '</td>
                </tr>
                <tr>
                    <td class="attribute">Needs replacing?</td>
                    <td class="info">' . $selectedPaint[0]->getNeedReplacing() . '</td>
                </tr>
            </table>

        </div>
    </section>';
    ?>
</div>
    <footer>
        Claudia Lim 2023
    </footer>

</body>
</html>
