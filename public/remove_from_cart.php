<?php
session_start(); // Rozpoczęcie sesji

// Sprawdzenie, czy przesłano ID produktu do usunięcia
if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Sprawdzenie, czy koszyk istnieje w sesji
    if (isset($_SESSION['cart'][$productId])) {
        // Usuwanie produktu z koszyka
        unset($_SESSION['cart'][$productId]);
    }

    // Przekierowanie do strony koszyka
    header('Location: cart.php');
    exit();
} else {
    // Jeśli nie podano ID produktu, przekierowanie na stronę główną
    header('Location: index.php');
    exit();
}
?>
