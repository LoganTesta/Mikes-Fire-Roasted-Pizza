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
    
    
    $ValidNumberOfPizzasTotal = true;
    if (Trim($NumberOfPizzasTotal) === "") {
        $ValidNumberOfPizzasTotal = false;
    } 
    if(ctype_digit($NumberOfPizzasTotal) === false){
        $ValidNumberOfPizzasTotal = false;
    }
    if($NumberOfPizzasTotal < 0 || $NumberOfPizzasTotal > 10) {
        $ValidNumberOfPizzasTotal = false;
    }
    if($ValidNumberOfPizzasTotal === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Order must have at least 1 pizza.  Orders over 10 pizzas: please call us 3+ days in advance.</p>";
    }
     
    
    $ValidSizeOfPizza = true;
    if (Trim($SizeOfPizza) === "") {
        $ValidSizeOfPizza = false;
    } 
    if($ValidSizeOfPizza === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Please select your pizza size.</p>";
    }
      
    
    $ValidTypeOfPizza = true;
    if (Trim($TypeOfPizza) === "") {
        $ValidTypeOfPizza = false;
    } 
    if($ValidTypeOfPizza === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Please select your pizza type.</p>";
    }
    
    
    $ValidStorePickup = true;
    if (Trim($StorePickup) === "") {
        $ValidStorePickup = false;
    } 
    if($ValidStorePickup === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Please select your store to pickup the pizza at.</p>";
    }
    
    
    $ValidUserName = true;
    if (Trim($UserName) === "") {
        $ValidUserName = false;
    } 
    if($ValidUserName === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Please enter your name.</p>";
    }
    
    
    $ValidUserEmail = true;
    if (Trim($UserEmail) === "") {
        $ValidUserEmail = false;
    }   
    /* More advanced e-mail validation */
    if ($UserEmail !== "" && !filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
        $ValidUserEmail = false;
    }
    if($ValidUserEmail === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Please enter a valid email.</p>";
    }
    
        
    $ValidUserPhone = true;
    if (Trim($UserPhone) === "") {
        $ValidUserPhone = false;
    } 
    /* More phone validation */
    $UserPhoneNoDashesString = str_replace("-", "", (string) $UserPhone); //remove any dashes present, and convert to a string to validate length.
    if (strlen($UserPhoneNoDashesString) !== 10) {
        $ValidUserPhone = false;
    } 
    if (ctype_digit($UserPhoneNoDashesString) === false) {
        $ValidUserPhone = false;
    }
    if($ValidUserPhone === false){
        $PassedValidation = false;
        $ValidationResponse .= "<p>Please enter a 10 digit phone number.</p>";
    }
   

    
    if ($PassedValidation === false) {
        $ValidationResponse .= "<p>Sorry validation failed.  Please check all fields again.</p>";
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
            });
        </script>
        <script type="text/babel" src="assets/javascript/main-react-functions.jsx"></script>
    </body>
</html>

<?php ob_end_flush(); ?>