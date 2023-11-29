<?php
include 'connexion.php';
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: admin.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the modified data from the form
    $newNom = $_POST["nom"];
    $newEmail = $_POST["email"];
    $newPassword = $_POST["password"];

    // SQL query to update user information
    $updateQuery = "UPDATE admin SET nom = '$newNom', email = '$newEmail', password = '$newPassword' WHERE email = '{$_SESSION["email"]}'";

    if (mysqli_query($conn, $updateQuery)) {
        // Update successful
        header("Location: pageAdmin.php");
        exit;
    } else {
        // Update failed
        echo "Error updating user information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
