<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si le formulaire d'ajout a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    // $id_plat = $_POST['id_plat'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $ingredients = $_POST['ingredients'];

    // Vérifier si une image a été téléchargée
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['photo']['name'];
        $image_tmp = $_FILES['photo']['tmp_name'];

        // Déplacer l'image téléchargée vers le dossier de destination
        $upload_dir = 'upload_plats/';
        move_uploaded_file($image_tmp, $upload_dir . $image);
    } else {
        // Utiliser une image par défaut si aucune image n'a été téléchargée
        $image = 'default.jpg';
    }

    // Requête SQL pour ajouter le plat dans la base de données
    $sql = "INSERT INTO plat ( nom_plat, description, prix, ingredients, image) VALUES ( '$nom', '$description', '$prix', '$ingredients', '$image')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page gestionPlat.php après l'ajout réussi
        header('Location: gestionPlat.php');
        exit;
    } else {
        echo "Erreur lors de l'ajout du plat : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
