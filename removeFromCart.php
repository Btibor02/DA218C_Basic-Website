<?php
session_start();

if (isset($_POST['bookID'])) {
    $book_id_to_remove = $_POST['bookID'];

    if (isset($_SESSION['cart'][$book_id_to_remove])) {
        unset($_SESSION['cart'][$book_id_to_remove]);
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>