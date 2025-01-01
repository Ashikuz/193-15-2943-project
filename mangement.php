<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        $item = $_POST['item'];
        $sql = "INSERT INTO items (name) VALUES ('$item')";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM items WHERE id=$id";
        $conn->query($sql);
    }
}

$result = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Website</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <header>
        <div class="navbar">
            <h1>BookEasy</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home" class="hero">
        <h2>Your Easy Booking Solution</h2>
        <p>Book appointments and services effortlessly.</p>
        <a href="#services" class="btn">Get Started</a>
    </section>

    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="service-card">
            <h3>Hair Salon</h3>
            <p>Book professional hairstyling services.</p>
        </div>
        <div class="service-card">
            <h3>Fitness Training</h3>
            <p>Schedule personal training sessions with experts.</p>
        </div>
        <div class="service-card">
            <h3>Spa Treatments</h3>
            <p>Relax with our premium spa services.</p>
        </div>
    </section>

    <section id="about" class="about">
        <h2>About Us</h2>
        <p>We provide an online platform for booking a variety of services at your convenience.</p>
    </section>

    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <form action="submit_form.php" method="POST">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
            <button type="submit">Send</button>
        </form>
    </section>

    <section id="management" class="management">
        <h2>Manage Items</h2>
        <form method="POST">
            <input type="text" name="item" placeholder="Enter Item" required>
            <button type="submit" name="save">Save</button>
        </form>

        <h2>Saved Items</h2>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <?php echo htmlspecialchars($row['name']); ?>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <footer>
        <p>&copy; 2024 BookEasy. All Rights Reserved.</p>
    </footer>

</body>

</html>

<?php $conn->close(); ?>