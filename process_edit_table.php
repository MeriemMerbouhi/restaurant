<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont remplis
    if (isset($_POST["table_id"]) && isset($_POST["numero"]) && isset($_POST["capacite"]) && isset($_POST["statut"])) {
        // Récupérer les données du formulaire
        $table_id = $_POST["table_id"];
        $numero = $_POST["numero"];
        $capacite = $_POST["capacite"];
        $statut = $_POST["statut"];

        // Inclure le fichier de configuration de la base de données
        include 'connexion.php';

        // Requête pour mettre à jour les données de la table dans la base de données
        $sql = "UPDATE table_restaurant SET numero_table = ?, capacite = ?, statut = ? WHERE table_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $numero, $capacite, $statut, $table_id);

        // Exécuter la requête
        if ($stmt->execute()) {
            // Rediriger vers la page de gestion des tables avec un message de succès
            header("Location: gestionTable.php?message=success");
        } else {
            // Rediriger vers la page de gestion des tables avec un message d'erreur
            header("Location: gestionTable.php?message=error");
        }

        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        // Rediriger vers la page de gestion des tables avec un message d'erreur
        header("Location: gestionTable.php?message=error");
    }
} else {
    // Rediriger vers la page de gestion des tables si le formulaire n'a pas été soumis directement
    header("Location: gestionTable.php");
}
?>
