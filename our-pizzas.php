<?php declare(strict_types = 1);
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Excellent custom hand-made pizza." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="pizza, fire-roasted, Portland, Oregon" />
        <title>Our Pizzas | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <?php include 'assets/include/header-content.php'; ?> 
                <div class="subtitle-container">
                    <h2 class="subtitle-container__sub-title">Our Pizzas</h2>
                </div>
            </header>
            <div class="content">
                <div class="content-row">   
                    <div class="col-sma-6">
                        <div class="content__text">
                            <h3>Our Pizza Selection</h3>
                            <p>Made with fresh ingredients daily- satisfy the need for good pizza!</p>
                        </div>
                        <?php include 'assets/include/pizza-info-content.php'; ?>
                        <div class="content-row">
                            <div class="col-lar-6">
                                <div class="content__content-image--small our-pizzas-one"></div>
                            </div>
                            <div class="col-lar-6">
                                <div class="content__content-image--small our-pizzas-two"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sma-6">
                        <div class="pizza-order-content"></div>
                    </div>
                </div>
                <?php include 'assets/include/footer-content.php'; ?>
            </div>
            <script type="text/javascript" src="assets/javascript/javascript-functions.js?mod=01132020"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    setCurrentPage(2, "mobileNav");
                    setCurrentPage(2, "desktopNav");
                });
            </script>
            <?php include 'assets/include/main-react-content.php'; ?>
    </body>
</html>

<?php ob_end_flush(); ?>