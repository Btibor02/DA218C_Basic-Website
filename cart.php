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
            include('db.php');
            if (empty($_SESSION['cart'])) {
                echo "Cart is empty.";
            } else {
                echo "Books in cart: <br>";
            
                foreach ($_SESSION['cart'] as $book_id) {
                    $sql = "SELECT author, title FROM books WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $book_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
            
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "Title: " . $row['title'] . ", Author: " . $row['author'] . "<br>";
                        }
                    } else {
                        echo "Book with ID $book_id not found.<br>";
                    }
                }
            }
            
            $conn->close();
        ?>
        </div>
        <div class="footer">

        </div>

    </div>
    
</body>
</html>