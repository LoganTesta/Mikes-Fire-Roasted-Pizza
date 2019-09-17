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
        <title>500 | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <?php include 'assets/include/header-content.php'; ?>
                <div class="subtitle-container">
                    <h2 class="subtitle-container__sub-title">500 Internal Error</h2>
                </div>
            </header>
            <div class="content">
                <div class="content-row">   
                    <div class="col-sma-6">
                        <h3>500 Server Error | Mike's Fire-Roasted Pizza</h3>
                        <p>We're sorry, there appears to be an internal error.  Click the navbar to get back to ordering great pizza from us!</p>
                    </div>
                    <div class="col-sma-6">
                        <div class="content-background-container">
                            <div class="content__content-image five00-one"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'assets/include/footer-content.php'; ?>
        </div>
        <script type="text/javascript" src="assets/javascript/javascript-functions.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setCurrentPage(-1, "mobileNav");
                setCurrentPage(-1, "desktopNav");
            });
        </script>     
        <script type="text/babel" src="assets/javascript/main-react-functions.jsx"></script>
    </body>
</html>

<?php ob_end_flush(); ?>