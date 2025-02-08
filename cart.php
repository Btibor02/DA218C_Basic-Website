<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="layout">
        <div class="header">
            <?php include 'header.php'; ?>
        </div>
        <div class="mainMenu">
        </div>
        <div class="mainContent">
        <?php
            session_start();
            if (empty($_SESSION['cart'])) {
                echo "Cart is empty." ;
            } else {
                echo "Books in cart: " . implode(", ", $_SESSION['cart']);
            }
        ?>
        </div>
        <div class="footer">

        </div>

    </div>
    
</body>
</html>