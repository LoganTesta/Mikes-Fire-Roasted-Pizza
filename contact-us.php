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
        <title>Contact Us | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <div class="inner-wrapper">
                    <?php include 'assets/include/header-content.php'; ?>
                    <div class="subtitle-container">
                        <h2 class="subtitle-container__sub-title">Contact Us</h2>
                    </div>
                </div>
            </header>
            <div class="content">
                <div class="inner-wrapper">
                    <div class="content-row">  
                        <div class="col-sma-6">
                            <div class="contact-form-content"></div>
                        </div>
                        <div class="col-sma-6">
                            <div class="content-background-container">
                                <div class="content__content-image contact-one"></div>
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
                setCurrentPage(4, "mobileNav");
                setCurrentPage(4, "desktopNav");               
            });
        </script>
        <?php include 'assets/include/main-react-content.php'; ?>
        <script type="text/babel" src="assets/javascript/contact-react-functions.jsx?mod=01132020"></script>
    </body>
</html>

<?php ob_end_flush(); ?>