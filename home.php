<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="layout">
        <div class="header">
            <?php include 'header.php'; ?>
        </div>
        <div class="mainMenu">
            <h1>Teszt-----------</h1>
        </div>
        <div class="mainContent">
            <?php
                session_start();

                include('db.php');
                $sql = "SELECT id, author, title, category, summary, price FROM books";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card'>
                                <div class='cardImage'>
                                    <img src='placeholder.png' alt='Book Cover' />
                                </div>
                                <div class='cardData'>
                                    <h3><b> " . $row["author"]. ": " . $row["title"]. "</b></h3>
                                    <p> Category: " . $row["category"]." </p>
                                    <p> " . $row["summary"]." </p>
                                    <p style='font-size: 1.2rem;'><b> " . $row["price"]." SEK </b></p>
                                    <form action='addToCart.php' method='POST'>
                                        <input type='hidden' name='bookID' value='". $row["id"]. "'/>
                                        <button type='submit'>Add to cart</button>
                                    </form>
                                </div>
                            </div>";
                    }
                } else {
                echo "0 results";
                }
                $conn->close();
            ?>
        </div>
        <div class="footer">
            <?php include 'footer.php'; ?>
        </div>

    </div>  
</body>

</html>