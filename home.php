<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="homeStyles.css">
</head>
<body>
    <div class="layout">
        <div class="header">
            <?php include 'header.php'; ?>
        </div>
        <div class="mainMenu">
            <h1>Categories</h1>
            <?php
                session_start();

                include('db.php');
                $sql = "SELECT DISTINCT category FROM books";
                $result = $conn->query($sql);
                
                echo "<div class='categories'>";
                    echo "<form method='GET' action=''>";
                        echo "<button id='categories' class='category-btn' data-category='all'>All</button>";
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<ul>
                                        <li>
                                            <button id='categories' type='submit' name='category' value='" . $row["category"] . "'>" . $row["category"] . "</button>
                                        </li>
                                    </ul>";
                            }
                    echo "</form>";
                echo "</div>";
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </div>
        <div class="mainContent">
            <?php
                session_start();

                include('db.php');
                $category = isset($_GET['category']) ? $_GET['category'] : 'all';
                $sql = "SELECT id, author, title, category, summary, price FROM books";
                if ($category !== 'all') {
                    $sql .= " WHERE category = ?";
                }

                $stmt = $conn->prepare($sql);
                if ($category !== 'all') {
                    $stmt->bind_param("s", $category);
                }

                $stmt->execute();
                $result = $stmt->get_result();

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
                                        <button id='addToCart' type='submit'>Add to cart</button>
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