<?php
// Check if the form is submitted
if (isset($_POST['reset_password'])) {
    // User input
    $email = $_POST['email'];

    // Database connection parameters (modify as needed)
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hawks';

    // Create a database connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve user data by email
    $query = "SELECT Username FROM hawkers WHERE Email = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the provided email exists
    if ($result->num_rows == 1) {
        // Generate a unique token for password reset (you can use a library for better token generation)
        $token = md5(uniqid());

        // Store the token and email in a "PasswordReset" table with an expiration time (e.g., 1 hour)
        $expirationTime = time() + 3600; // 1 hour from now
        $insertQuery = "INSERT INTO PasswordReset (Email, Token, ExpirationTime) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssi", $email, $token, $expirationTime);
        $stmt->execute();

        // Send an email to the user with a link to reset their password
        $resetLink = "http://yourwebsite.com/reset_password.php?token=$token";
        $emailSubject = "Password Reset Request";
        $emailMessage = "Click the following link to reset your password: $resetLink";
        mail($email, $emailSubject, $emailMessage);

        // Display a confirmation message to the user
        echo "An email with instructions to reset your password has been sent to your email address.";

        // Close the database connection
        $conn->close();
        exit;
    } else {
        // User with the provided email doesn't exist, display an error message
        echo 'User with this email does not exist.';
    }

    // Close the database connection
    $conn->close();
}
?>
