<?php
require_once 'fetchdb.php';
require_once 'classes/paints.php';
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

    <link rel="icon" href="images/paint-svgrepo-com.svg" sizes="192x192">
    <link rel="shortcut icon" href="images/paint-svgrepo-com.svg">
    <link rel="apple-touch-icon" href="images/paint-svgrepo-com.svg">

    <!-- <script defer src="js/index.js"></script> -->
</head>

<body>
<div class="grid">
    <header>
        <h1>Paint Collection App</h1>
    </header>

    <nav>
        <a href=""><i class="fa-solid fa-plus"></i>Add New Paint</a>
    </nav>

    <!--Container for each paint card - repeated for each item-->
    <?php
       foreach ($paints as $paint) {
           echo '<section class="paint-container">
                 <div class="image-container">';
           if ($paint->getImage() == "No Image") {
               echo '<p>No Image Available</p>';
           } else {
               echo '<img alt="Image of paint" src=' . $paint->getImage() . '>';
           }
           echo '</div>
                    <div class="paint-info">
            <table>
                <tr>
                    <td>Brand:</td>
                    <td>' . $paint->getBrandName() . '</td>
                </tr>
                <tr>
                    <td>Colour:</td>
                    <td>' . $paint->getColourName() . '</td>
                </tr>
                <tr>
                    <td>Needs replacing?</td>
                    <td>' . $paint->getNeedReplacing() . '</td>
                </tr>
            </table>
        </div>
    </section>';
       }
    ?>

    <footer>
        Claudia Lim 2023
    </footer>
</div>
</body>
</html>