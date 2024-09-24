<?php
// configure.php
session_start();
require_once 'config.php';
require_once 'functions.php';

if (!isset($_SESSION['domain']) || !isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $invoiceNumber = createInvoice($_SESSION['domain'], $_SESSION['user_id']);
    $_SESSION['invoice_number'] = $invoiceNumber;
    header('Location: invoice.php');
    exit;
}
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
    <title>Configure Domain</title>
</head>
<body>
<div class="container">
    <h1>Configure Domain</h1>
    <p>Domain: <?php echo $_SESSION['domain']; ?></p>
    <br>
    <p>Duration : 1 Years</p>
    <br>
    <P>Price : Rp. 100.000</P>
    <br>
    <p>User: <?php echo $_SESSION['user_id']; ?></p>
    <br>
    
    <form method="POST" class="form">
        <button class="login-button" class="btn" type="submit">Proceed to Checkout</button>
    </form>
    </div>
</body>
</html>
