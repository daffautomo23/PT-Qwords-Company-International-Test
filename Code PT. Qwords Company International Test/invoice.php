<?php
// invoice.php (unchanged)
session_start();
require_once 'config.php';
require_once 'functions.php';

if (!isset($_SESSION['invoice_number']) || !isset($_SESSION['user_id']) || !isset($_SESSION['domain'])) {
    header('Location: index.php');
    exit;
}

$invoiceNumber = $_SESSION['invoice_number'];
$userId = $_SESSION['user_id'];
$domain = $_SESSION['domain'];

// Send email notification
sendEmailNotification($userId, $invoiceNumber);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- Font -->
<link rel="stylesheet" type="text/css" href="css/font.css">

<link rel="stylesheet" type="text/css" href="css/general.css">
<link rel="stylesheet" type="text/css" href="css/invoice.css">
    <title>Invoice</title>
</head>
<body>
<div class="container">
    <h1>Invoice</h1>
    <p>Invoice Number: <?php echo $invoiceNumber; ?></p>
    <br>
    <p>Domain: <?php echo $domain; ?></p>
    <br>
    <p>Duration : 1 Years</p>
    <br>
    <p>Price : Rp.100.000</p>
    <br>
    <p>User ID: <?php echo $userId; ?></p>
    <br>
    <h1>Unpaid</h1>
    </div>
    <br>

    <p>Please pay to the account : 12345678 A.N PT Qwords Company Internasional</p>
    <p>"An email notification has been sent to your registered email address."</p>
    <br>
    <p class="login-button" class="btn"><a class="login-button" class="btn" href="#" onclick="window.print();">Export Invoice as PDF</a></p>
</body>
</html>