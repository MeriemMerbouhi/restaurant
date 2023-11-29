<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_menu = $_POST["id_menu"];
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];

    // Vérifier si une photo a été téléchargée
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_destination = 'upload/' . $photo_name;

        // Déplacer le fichier téléchargé vers le dossier de destination
        move_uploaded_file($photo_tmp_name, $photo_destination);
    } else {
        $photo_name = ''; // Si aucune photo n'a été téléchargée, laisser le champ vide
    }

    // Requête pour insérer le nouveau menu dans la base de données avec le nom de la photo
    $sql = "INSERT INTO menu (menu_id, titre, description, prix, image) VALUES ('$id_menu', '$titre', '$description', '$prix', '$photo_name')";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page d'accueil après l'ajout du menu
        header("Location: creationMenu.php");
    } else {
        ?><script>alert("<?php echo "Erreur lors de l'ajout du menu : " . $conn->error;?>")</script><?php
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
