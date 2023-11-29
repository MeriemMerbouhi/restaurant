<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $plat_id = $_POST['plat_id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $ingredients = $_POST['ingredients'];

    // Vérifier si une nouvelle photo a été téléchargée
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $upload_dir = 'upload_plats/';
        move_uploaded_file($tmp_name, $upload_dir . $image);
    } else {
        // Si aucune nouvelle photo n'a été téléchargée, conserver l'ancienne photo
        $sql = "SELECT image FROM plat WHERE plat_id = '$plat_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $image = $row['image'];
    }

    // Requête pour mettre à jour les données du plat dans la base de données
    $sql = "UPDATE plat SET nom_plat = '$nom', description = '$description', prix = '$prix', ingredients = '$ingredients', image = '$image' WHERE plat_id = '$plat_id'";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page de liste des plats avec un message de succès
        header("Location: gestionPlat.php?success=1");
        exit;
    } else {
        // Rediriger vers la page de liste des plats avec un message d'erreur
        header("Location: gestionPlat.php?error=1");
        exit;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
