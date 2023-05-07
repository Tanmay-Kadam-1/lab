<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel='icon' type='image/png' href='https://s2.googleusercontent.com/s2/favicons?domain=www.thriftbooks.com'>
    <title>Book Haven</title>
</head>

<body>
    <nav>
        <ul>
            <li><a class="active" href="./catalogue.php">Catalogue</a></li>
            <li><a href="./registration.php">Registration</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </nav>
    <main>
        <section class="all-books">
            <h2>All Books</h2>
            <div class="book-list">
                <?php
                // Select all books from the books_table
                $limit = mt_rand(20, 30);
                $sql = "SELECT * FROM books_table LIMIT $limit, 50";
                $result = mysqli_query($conn, $sql);

                // Output each book as a card
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="book-item">';
                        echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                        echo '<h3>' . $row['name'] . '</h3>';
                        echo '<p>Author: ' . $row['author'] . '</p>';
                        echo '<p>Price: $' . $row['price'] . '</p>';
                        echo '<button>Add to Cart</button>';
                        echo '</div>';
                    }
                } else {
                    echo "No books found";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Book Store</p>
    </footer>
</body>

</html>