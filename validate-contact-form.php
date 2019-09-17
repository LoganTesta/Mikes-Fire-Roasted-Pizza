<?php declare(strict_types = 1);
ob_start();
session_start();


$ValidationResponse = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $UserName = htmlspecialchars(strip_tags(trim($_POST['userName'])));
    $UserEmail = htmlspecialchars(strip_tags(trim($_POST['userEmail'])));
    $UserSubject = htmlspecialchars(strip_tags(trim($_POST['userSubject'])));
    $UserComments = htmlspecialchars(strip_tags(trim($_POST['userComments'])));


    $SendEmailTo = "logan.testa@outlook.com";

    /* Validation time */
    $PassedValidation = true;
    if (Trim($UserName) === "") {
        $PassedValidation = false;
    }
    if (Trim($UserEmail) === "") {
        $PassedValidation = false;
    }
    if (Trim($UserComments) === "") {
        $PassedValidation = false;
    }

    /* More advanced e-mail validation */
    if (!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
        $PassedValidation = false;
    }
    if ($PassedValidation === false) {
        $ValidationResponse .= "Sorry validation failed.  Please check all fields again.<br />";
    }

    /* Create the e-mail body. */
    $Body = "";
    $Body .= "User Name: " . $UserName . "\n";
    $Body .= "User Email: " . $UserEmail . "\n";
    $Body .= "Subject: " . $UserSubject . "\n";
    $Body .= "User Comments: " . $UserComments . "\n";

    /* Send the e-mail. */
    $SuccessfulSubmission = mail($SendEmailTo, "Mike's Fire-Roasted Pizza: " . $UserSubject, $Body, "From: <$UserEmail>");
    if ($SuccessfulSubmission) {
        $ValidationResponse .= "Your form was successfully submitted.  Thanks for contacting us!<br />";
    } else if ($SuccessfulSubmission === false) {
        $ValidationResponse .= "Submission failed. Please try again.<br />";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Excellent custom hand-made pizza." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="pizza" />
        <title>Sending Contact Form | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <?php include 'assets/include/header-content.php'; ?>
                <div class="subtitle-container">
                    <h2 class="subtitle-container__sub-title">Sending Contact Form</h2>
                </div>
            </header>
            <div class="content">
                <div class="content-row">
                    <div class="col-sma-6">
                        <h3>Sending Message</h3>
                        <?php if(!empty($ValidationResponse)) { echo "<p>$ValidationResponse</p>"; } ?>
                    </div>
                    <div class="col-sma-6">
                    </div>
                </div>
            </div>
            <?php include 'assets/include/footer-content.php'; ?>
        </div>
        <script type="text/javascript" src="assets/javascript/javascript-functions.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
               // setCurrentPage(-1, "mobileNav");
              //  setCurrentPage(-1, "desktopNav");               
            });
        </script>
        <script type="text/babel" src="assets/javascript/main-react-functions.jsx"></script>
    </body>
</html>

<?php ob_end_flush(); ?>