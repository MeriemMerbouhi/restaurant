<?php
session_start();

// Database configuration
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restaurant";

try {
    // Connect to the database using PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";  // No need to print this message
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Prepare and execute a SQL query to check user credentials
    $sql = "SELECT email FROM admin WHERE email = :email ";
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':email', $email);
    // $stmt->bindParam(':password', $password);  // Note: Password should be hashed in a real scenario
     $stmt->execute(
        array(':email' => $email)
    );
    // $stmt->execute();

    // Get the number of rows returned by the query
    $numRows = $stmt->fetchColumn();
    if ($numRows > 0) {
        // Valid login, set session variables
        $_SESSION["email"] = $email;
        header("Location: pageAdmin.php");
        exit;  // Always exit after sending a Location header
    } else {
        echo "no results found";
        // Invalid login, show an error message or redirect as needed
        // header("Location: admin.php");
    }
}

// Close the database connection (no need to explicitly close PDO connections)
?>
