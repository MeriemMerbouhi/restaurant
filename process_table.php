<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si le formulaire d'ajout a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_table = $_POST['id_table'];
    $numero = $_POST['numero'];
    $capacite = $_POST['capacite'];
    $statut = $_POST['statut'];

    // Requête SQL pour ajouter la table dans la base de données
    $sql = "INSERT INTO table_restaurant (table_id, numero_table, capacite, statut) VALUES ('$id_table', '$numero', '$capacite', '$statut')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page gestionTable.php après l'ajout réussi
        header('Location: gestionTable.php');
        exit;
    } else {
        echo "Erreur lors de l'ajout de la table : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
