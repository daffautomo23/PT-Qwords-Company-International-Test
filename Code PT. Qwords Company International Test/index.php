<?php
// index.php
session_start();
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = $_POST['domain'];
    $available = checkDomainAvailability($domain);
    
    if ($available) {
        $_SESSION['domain'] = $domain;
        if (isset($_SESSION['user_id'])) {
            header('Location: configure.php');
        } else {
            header('Location: login.php');
        }
        exit;
    } else {
        $error = "Domain is not available.";
    }
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
    <title>Domain Search</title>
</head>
<body>
<div class="container">
    <h1>Domain Search</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" class="form">
        <input class="input" type="text" name="domain" placeholder="Enter domain name" required>
        <button class="login-button" class="btn" type="submit">Search</button>
    </form>
    <?php if (!isset($_SESSION['user_id'])) : ?>
        <p><a href="login.php">Login</a></p>
    <?php else : ?>
        <p>Logged in as: <?php echo $_SESSION['user_id']; ?> | <a href="logout.php">Logout</a></p>
    <?php endif; ?>
    </div>
</body>
</html>