<?php
session_start();

// Sprawdzenie, czy sesja koszyka jest pusta
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: index.php'); // Przekierowanie do strony głównej, jeśli brak zamówienia
    exit;
}

// Opróżnienie koszyka po złożeniu zamówienia
$_SESSION['cart'] = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Ścieżka do pliku CSS -->
    <title>Thank You</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
        <h2>Thank You for Your Order!</h2>
        <p>Your order has been successfully placed. We appreciate your business!</p>
        <p>We will send you an email confirmation shortly.</p>

        <div class="buttons">
            <a href="index.php" class="button">Return to Home</a>
            <a href="orders.php" class="button">View Orders</a> <!-- Link do przeglądania zamówień -->
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
