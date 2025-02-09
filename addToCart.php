<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['bookID'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1; // Add as new item with quantity 1
    } else {
        $_SESSION['cart'][$id]++; // Increase quantity if already in cart
    }
}


header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
