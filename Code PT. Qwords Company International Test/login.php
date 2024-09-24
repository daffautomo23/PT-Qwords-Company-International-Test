<?php
// login.php
session_start();
require_once 'config.php';
require_once 'functions.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (loginUser($email, $password)) {
        $_SESSION['user_id'] = $email; // Use email as user ID for simplicity
        if (isset($_SESSION['domain'])) {
            header('Location: configure.php');
        } else {
            header('Location: index.php');
        }
        exit;
    } else {
        $error = "Invalid email or password.";
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
    <title>Login</title>
</head>
<body>

<div class="container">
    <h1>Login</h1>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" class="form">
        <input class="input" type="email" name="email" placeholder="Email" required>
        <input class="input" type="password" name="password" placeholder="Password" required>
        <br>
        <div>
        <button class="login-button" class="btn" type="submit">Login</button>
        </div>
    </form>
    </div>

</body>
</html>
