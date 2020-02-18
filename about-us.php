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
        <title>About | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <div class="inner-wrapper">
                    <?php include 'assets/include/header-content.php'; ?>
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__sub-title">About Us</h2>
                    </div>
                </div>
            </header>
            <div class="content">
                <div class="inner-wrapper">
                    <div class="content-row">   
                        <div class="col-sma-6">
                            <div class="content__text">
                                <h3>About Mike's Fire-Roasted Pizza</h3>
                                <p>We opened our first store in SE Portland in 2005.  We've since expanded to 3 other locations- 
                                    Happy Valley, Tigard, and Milwaukie.  Come see why we are one of the area's best pizza shops and 
                                    why our customers keep coming back to order more of Mike's Fire-Roasted Pizza all the time.</p>
                            </div>
                        </div>
                        <div class="col-sma-6">
                            <div class="content-background-container">
                                <div class="content__content-image about-one"></div>
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
                setCurrentPage(1, "mobileNav");
                setCurrentPage(1, "desktopNav");
            });
        </script>     
    </body>
</html>

<?php ob_end_flush(); ?>