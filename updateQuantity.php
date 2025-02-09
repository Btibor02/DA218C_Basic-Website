<?php
session_start();

if (isset($_POST['bookID']) && isset($_POST['action'])) {
    $book_id = $_POST['bookID'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$book_id])) {
        if ($action == "increase") {
            $_SESSION['cart'][$book_id]++;
        } elseif ($action == "decrease" && $_SESSION['cart'][$book_id] > 1) {
            $_SESSION['cart'][$book_id]--;
        }
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
