<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si l'ID du menu est passé en paramètre (via la méthode GET)
if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];

    // Requête SQL pour supprimer le menu de la base de données
    $sql = "DELETE FROM menu WHERE menu_id = $id_menu";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page des menus après la suppression
        header('Location: creationMenu.php');
        exit;
    } else {
        echo "Erreur lors de la suppression du menu : " . $conn->error;
    }
} else {
    // Rediriger vers la page des menus si l'ID n'est pas passé en paramètre
    header('Location: creationMenu.php');
    exit;
}

// Fermer la connexion à la base de données
$conn->close();
?>
