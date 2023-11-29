<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si l'ID du plat est passé en paramètre (via la méthode GET)
if (isset($_GET['id'])) {
    $id_plat = $_GET['id'];

    // Requête SQL pour supprimer le plat de la base de données
    $sql = "DELETE FROM plat WHERE plat_id = $id_plat";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page gestionPlat.php après la suppression réussie
        header('Location: gestionPlat.php');
        exit;
    } else {
        echo "Erreur lors de la suppression du plat : " . $conn->error;
    }
} else {
    // Rediriger vers la page gestionPlat.php si l'ID n'est pas passé en paramètre
    header('Location: gestionPlat.php');
    exit;
}

// Fermer la connexion à la base de données
$conn->close();
?>
