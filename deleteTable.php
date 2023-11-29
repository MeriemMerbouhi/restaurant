<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si l'ID de la table est passé en paramètre (via la méthode GET)
if (isset($_GET['id'])) {
    $id_table = $_GET['id'];

    // Requête SQL pour supprimer la table de la base de données
    $sql = "DELETE FROM table_restaurant WHERE table_id = $id_table";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page gestionTable.php après la suppression réussie
        header('Location: gestionTable.php');
        exit;
    } else {
        echo "Erreur lors de la suppression de la table : " . $conn->error;
    }
} else {
    // Rediriger vers la page gestionTable.php si l'ID n'est pas passé en paramètre
    header('Location: gestionTable.php');
    exit;
}

// Fermer la connexion à la base de données
$conn->close();
?>
