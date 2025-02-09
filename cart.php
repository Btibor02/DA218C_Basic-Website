<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="cartStyles.css">
</head>
<body>
    <div class="layout">
        <div class="header">
            <?php include 'header.php'; ?>
        </div>
        <div class="mainContent">
            <div class="cartMain">
                <h1>Cart</h1>
                <?php
                    session_start();
                    include('db.php');
                    if (empty($_SESSION['cart'])) {
                        echo "Cart is empty.";
                    } else {
                        foreach ($_SESSION['cart'] as $book_id => $quanity) {
                            $sql = "SELECT author, title, price FROM books WHERE id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $book_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='card'>
                                            <div class='cardImage'>
                                                <img src='placeholder.png' alt='Book Cover' />
                                            </div>
                                            <div class='cardInfo'>
                                                <h3><b> ". $row["title"]. "</b></h3>
                                                <p>". $row["author"]. "</p>
                                                <p>Quantity: 
                                                    <form action='updateQuantity.php' method='POST' style='display:inline;'>
                                                        <input type='hidden' name='bookID' value='" . $book_id . "'/>
                                                        <button type='submit' name='action' value='decrease'>-</button>
                                                    </form>
                                                " . $quanity. "
                                                    <form action='updateQuantity.php' method='POST' style='display:inline;'>
                                                        <input type='hidden' name='bookID' value='" . $book_id . "'/>
                                                        <button type='submit' name='action' value='increase'>+</button>
                                                    </form>
                                                </p>
                                            </div>
                                            <div class='cardPrice'>
                                                <p style='font-size: 1.2rem;'><b> " . $row["price"] * $quanity." SEK </b></p>
                                            </div>
                                            <div class='cardRemove'>
                                                <form action='removeFromCart.php' method='POST'>
                                                    <input type='hidden' name='bookID' value='" . $book_id . "'/>
                                                    <button type='submit'>Remove</button>
                                                </form>
                                            </div>
                                        </div>";
                                }
                            } else {
                                echo "Book with ID $book_id not found.<br>";
                            }
                        }
                    }
                    
                    $conn->close();
                ?>

            </div>
        </div>
        <div class="footer">
            <?php include 'footer.php'; ?>
        </div>

    </div>
</body>
</html>