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
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bookstore";

                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT author, title, category, summary, price FROM books";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card'>
                                <img class='cardImg' src='placeholder.png' alt='Book Cover' />
                                <div class='cardData'>
                                    <h4> " . $row["author"]. ": " . $row["title"]. "</h4>
                                    <p> Category: " . $row["category"]." </p>
                                    <p> " . $row["summary"]." </p>
                                    <p> " . $row["price"]." SEK</p>
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