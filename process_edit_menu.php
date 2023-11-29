<!-- process_edit_menu.php -->
<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_menu = $_POST['id_menu'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    // Vérifier si une nouvelle photo a été téléchargée
    if ($_FILES['photo']['name']) {
        // Récupérer le nom de fichier temporaire
        $tmp_name = $_FILES['photo']['tmp_name'];

        // Générer un nom de fichier unique pour éviter les collisions de noms
        $new_filename = uniqid() . '.' . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

        // Déplacer le fichier téléchargé vers le dossier "upload" avec le nouveau nom de fichier
        move_uploaded_file($tmp_name, 'upload/' . $new_filename);

        // Mettre à jour le nom de fichier dans la base de données
        $sql = "UPDATE menu SET titre='$titre', description='$description', prix='$prix', image='$new_filename' WHERE menu_id='$id_menu'";
    } else {
        // Mettre à jour les informations du menu sans changer la photo
        $sql = "UPDATE menu SET titre='$titre', description='$description', prix='$prix' WHERE menu_id='$id_menu'";
    }

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page gestionMenu.php après la modification réussie
        header('Location: creationMenu.php');
        exit;
    } else {
        echo "Erreur lors de la modification du menu : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
