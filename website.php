<style>
    .notification {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 15px 20px;
        border-radius: 5px;
        color: white;
        font-family: Arial, sans-serif;
        font-size: 16px;
        z-index: 1000;
        animation: fadeOut 4s ease-in-out forwards;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 300px;
        word-wrap: break-word;
    }
    .notification.success {
        background-color: #4CAF50; /* Green for success */
    }
    .notification.error {
        background-color: #f44336; /* Red for error */
    }
    @keyframes fadeOut {
        0% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; display: none; }
    }
</style>

<?php
// Database connection
$servername = "localhost"; // Adjust if needed
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "website_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Insert data into the database with timestamp
    $sql = "INSERT INTO messages (email, name, message, timestamp) VALUES ('$email', '$name', '$message', CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="notification success">Your message has been sent successfully!</div>';
    } else {
        echo '<div class="notification error">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }
}

// Close connection
$conn->close();
?>