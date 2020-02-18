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
        <title>Locations | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <div class="inner-wrapper">
                    <?php include 'assets/include/header-content.php'; ?>
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__sub-title">Locations</h2>
                    </div>
                </div>
            </header>
            <div class="content">
                <div class="inner-wrapper">
                    <div class="content-row">   
                        <div class="col-sma-5">
                            <div class="content__text">
                                <h3>Places to Get Great Pizza</h3>
                                <p>SE Portland (flagship store), Happy Valley, Tigard, Milwaukie.</h3>
                                <p>At all of our stores you will get great pizza and friendly customer service.</p>
                                <p>Our hours Monday-Saturday are 11:00am-11:00pm, on Sundays 11:00am-10:00pm.</p>
                                <p>You can <a href="our-pizzas.php">order a pizza here online</a>, or give us a call at 503-999-9999.  
                                    Please allow approximately 30 min to bake ordered pizzas,
                                    depending on time of day, business, and the number of pizzas ordered.</p>
                                <p>We don't do deliveries, and we include tips in the price to pay our employees fairly and simplify your payment for 
                                    our superb pizza.</p>
                            </div>
                        </div>
                        <div class="col-sma-7">
                            <div class="content-background-container">
                                <div class="content__content-image locations-one"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'assets/include/footer-content.php'; ?>
        </div>
        <?php include 'assets/include/javascript-content.php'; ?>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setCurrentPage(3, "mobileNav");
                setCurrentPage(3, "desktopNav");
            });
        </script>
    </body>
</html>

<?php ob_end_flush(); ?>