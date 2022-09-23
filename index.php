<?php 
include 'assets/php/site_info.php';
include 'assets/php/header.php';
include 'assets/php/products.php';

# Get all products
$sql = "
SELECT 
    * 
FROM
    products
ORDER BY
    book_title ASC
";
$result = $mysqli->query($sql);
$products = $result->fetch_all(MYSQLI_ASSOC);
$result->free();
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo SITE_NAME; ?></title>

        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="title" content="<?php echo SITE_NAME; ?>">
        <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta name="theme-color" content="<?php echo SITE_COLOUR; ?>">
        <meta property="twitter:card" content="summary">
        <meta property="twitter:title" content="<?php echo SITE_NAME; ?>">
        <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
        <meta property="twitter:description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo SITE_URL; ?>">
        <meta property="og:description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta property="og:title" content="<?php echo SITE_NAME; ?>">
    </head>
    <body>

        
        <div class="container">
            <div class="row">
                <!-- Page Title & Description -->
                <div class="text-center" style="margin-top: 30px; margin-bottom: 100px;">
                    <h1 class="display-4"><?php echo SITE_NAME ?></h1>
                    <lead><?php echo SITE_DESCRIPTION; ?></lead>
                </div>
            </div>
            <div class="row text-center">
                <?php
                    foreach ($products as $product) {
                        echo '
                        <div class="col-md-4 d-flex" style="margin-bottom: 60px;">
                            <div class="card">
                                <p id="book_link" style="display: none;">'. $product['book_link']. '</p>
                                <img alt="Book Cover for '.$product['book_title'].'" class="card-img w-100 d-block" src="'. $product['book_cover'] .'">
                                <div class="card-body">
                                    <h4 class="card-title">'. $product['book_title'] .'</h4>
                                    <p class="card-text">'. $product['book_description'] .'</p>   
                                    <a class="btn btn-primary" href="'. $product['book_link'] .'" target="_blank">View</a>                   
                                </div>
                            </div>
                        </div>';
                        }
                ?>
            </div>
        </div>
    </body>
</html>