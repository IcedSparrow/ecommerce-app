<?php
session_start(); // Rozpoczęcie sesji

// Sprawdzenie, czy przesłano dane
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Sprawdzenie, czy koszyk już istnieje w sesji
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Sprawdzenie, czy produkt już istnieje w koszyku
    if (isset($_SESSION['cart'][$productId])) {
        // Aktualizacja ilości
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        // Dodanie nowego produktu do koszyka
        $_SESSION['cart'][$productId] = $quantity;
    }

    // Przekierowanie do strony głównej lub koszyka
    header('Location: index.php'); // lub 'Location: cart.php';
    exit();
} else {
    // Jeśli dane nie zostały przesłane, przekierowanie na stronę główną
    header('Location: index.php');
    exit();
}
?>
