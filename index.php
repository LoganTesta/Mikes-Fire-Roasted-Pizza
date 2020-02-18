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
        <title>Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <div class="inner-wrapper">
                    <?php include 'assets/include/header-content.php'; ?>
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__sub-title">Fresh Custom Pizza For the Whole Party!</h2>
                    </div>
                </div>
            </header>
            <div class="content">
                <div class="inner-wrapper">
                    <div class="content-row">
                        <div class="col-sma-6">
                            <div class="content__text">
                                <h3>Affordable and Tasty Pizzas</h3>
                                <p>Mike's Fire-Roasted Pizza makes quality and affordable pizzas.  We make every kind of pizza, from
                                    small personal pizzas to a classic large pizza to enough pizzas
                                    for an entire party.  We are one of the top pizza shops in the Portland area for catering, call us 
                                    at 503-999-9999 or <a href="contact-us.php">contact us</a> at least 3 days in advance.</p>
                            </div>
                            <?php include 'assets/include/pizza-info-content.php'; ?>
                            <div class="content-row">
                                <div class="col-lar-6">
                                    <div class="content__content-image--small index-one"></div>
                                </div>
                                <div class="col-lar-6">
                                    <div class="content__content-image--small index-two"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sma-6">
                            <div class="pizza-order-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'assets/include/footer-content.php'; ?>
        </div>
        <?php include 'assets/include/javascript-content.php'; ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setCurrentPage(0, "mobileNav");
                setCurrentPage(0, "desktopNav");
            });
        </script>
    </body>
</html>

<?php ob_end_flush(); ?>