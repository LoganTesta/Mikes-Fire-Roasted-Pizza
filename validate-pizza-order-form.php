<?php declare(strict_types = 1);
 ob_start();
session_start();

$ValidationResponse = "";


$NumberOfPizzasTotal = "";
$SizeOfPizza = "";
$TypeOfPizza = "";
$StorePickup = "";

$UserName = "";
$UserEmail = "";
$UserPhone = "";
$UserComments = "";

$OrderTotalCost = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $NumberOfPizzasTotal = htmlspecialchars(strip_tags(trim($_POST['numberOfPizzasTotal'])));
    $SizeOfPizza = htmlspecialchars(strip_tags(trim($_POST['sizeOfPizza'])));
    $TypeOfPizza = htmlspecialchars(strip_tags(trim($_POST['typeOfPizza'])));
    $StorePickup = htmlspecialchars(strip_tags(trim($_POST['storePickup'])));

    $UserName = htmlspecialchars(strip_tags(trim($_POST['orderName'])));
    $UserEmail = htmlspecialchars(strip_tags(trim($_POST['orderEmail'])));
    $UserPhone = htmlspecialchars(strip_tags(trim($_POST['orderPhone'])));
    $UserComments = htmlspecialchars(strip_tags(trim($_POST['orderComments'])));

    $OrderTotalCost = htmlspecialchars(strip_tags(trim($_POST['orderTotalCost'])));

    $SendEmailTo = "logan.testa@outlook.com";
    $Subject = "Mike's Fire-Roasted Pizza: Pizza order.";

    /* Validation time */
    $PassedValidation = true;
    if (Trim($NumberOfPizzasTotal) === "") {
        $PassedValidation = false;
    } else if (Trim($SizeOfPizza) === "") {
        $PassedValidation = false;
    } else if (Trim($TypeOfPizza) === "") {
        $PassedValidation = false;
    } else if (Trim($StorePickup) === "") {
        $PassedValidation = false;
    } else if (Trim($UserName) === "") {
        $PassedValidation = false;
    } else if (Trim($UserEmail) === "") {
        $PassedValidation = false;
    } else if (Trim($UserPhone) === "") {
        $PassedValidation = false;
    } else if (Trim($OrderTotalCost) === "") {
        $PassedValidation = false;
    }


    /* More advanced e-mail validation */
    if ($UserEmail !== "" && !filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
        $PassedValidation = false;
    }

    /* Telephone Validation */
    $UserPhoneNoDashesString = str_replace("-", "", (string) $UserPhone); //remove any dashes present, and convert to a string to validate length.

    if (strlen($UserPhoneNoDashesString) !== 10) {
        $PassedValidation = false;
        $ValidationResponse .= "Please enter a 10 digit phone number.<br />";
    }


    if ($PassedValidation === false) {
        $ValidationResponse .= "Sorry validation failed.  Please check all fields again.<br />";
    }

    if ($PassedValidation) {
        /* Create the e-mail body. */
        $Body = "";
        $Body .= "Customer Name: " . $UserName . "\n";
        $Body .= "Customer Email: " . $UserEmail . "\n";
        $Body .= "Customer Phone: " . $UserPhone . "\n";
        $Body .= "Subject: " . $Subject . "\n";
        $Body .= "Order: " . $NumberOfPizzasTotal . " " . $SizeOfPizza . " " . $TypeOfPizza . " pizza/pizzas.\n";
        $Body .= "Location: " . $StorePickup . "\n";
        $Body .= "User Comments: " . $UserComments . "\n";
        $Body .= "Order Total: $" . $OrderTotalCost . "\n";

        /* Send the e-mail. */
        $SuccessfulSubmission = mail($SendEmailTo, $Subject, $Body, "From: <$UserEmail>");
        if ($SuccessfulSubmission) {
            $ValidationResponse .= "Success!<br />";
            $ValidationResponse .= "Thank you <strong>" . $UserName . "</strong>.<br />";
            $ValidationResponse .= "Please pick up your order at the <strong>" . $StorePickup . "</strong> store.<br />";
            $ValidationResponse .= "<strong>Your order: " . $NumberOfPizzasTotal . " " . $SizeOfPizza . " " . $TypeOfPizza . " pizza/pizzas.</strong><br />";
            $ValidationResponse .= "Comments: " . $UserComments . "<br />";
            $ValidationResponse .= "<strong>Total cost</strong> (pay in store): <strong>$" . $OrderTotalCost . "</strong>.<br />";
        } else if ($SuccessfulSubmission === false) {
            $ValidationResponse .= "Submission failed. Please try again.";
        }
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
        <title>Sending Order | Mike's Fire-Roasted Pizza</title>
        <?php include 'assets/include/document-head-components.php'; ?>
    </head>
    <body>
        <div class="body-wrapper">
            <?php include 'assets/include/navigation-content.php'; ?>
            <header class="header">
                <?php include 'assets/include/header-content.php'; ?>
                <div class="subtitle-container">
                    <h2 class="subtitle-container__sub-title">Your Order</h2>
                </div>
            </header>
            <div class="content">
                <div class="content-row">
                    <div class="col-sma-6">
                        <h3>Sending Order</h3>
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
               // setCurrentPage(-1, "desktopNav");               
            });
        </script>
        <script type="text/babel" src="assets/javascript/main-react-functions.jsx"></script>
    </body>
</html>

<?php ob_end_flush(); ?>