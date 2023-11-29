<?php
    // Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $date_heure = $_POST["date_heure"];
    $nombre_personnes = $_POST["nombre_personnes"];
    $menu = $_POST["menu"];
    $date = new DateTime($date_heure);

// Format the date in a more user-friendly format (e.g., "June 29, 2023, 4:22 PM")
$Date = $date->format('Y-m-d H:i');

    // Connexion à la base de données
    $conn = mysqli_connect("localhost", "root", "", "restaurant");

    // Vérifier la connexion
    if (!$conn) {
        die("La connexion à la base de données a échoué: " . mysqli_connect_error());
    }

    // Insérer les données dans la table utilisateur
    $sql = "INSERT INTO utilisateur (nom_utilisateur) VALUES ('$nom')";
    if (mysqli_query($conn, $sql)) {
        echo "Utilisateur ajouté avec succès. ";
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur: " . mysqli_error($conn);
    }

    // Récupérer l'id de l'utilisateur ajouté
    $utilisateur_id = mysqli_insert_id($conn);

    // Insérer les données dans la table réservation avec le statut "libre"
    $sql = "INSERT INTO reservation (utilisateur_id, date_reservation, nombre_personnes, menu_id, table_id) 
            VALUES ('$utilisateur_id', '$Date', '$nombre_personnes', 
                    (SELECT menu_id FROM menu WHERE titre = '$menu'),
                    (SELECT table_id FROM table_restaurant WHERE statut = 'libre' LIMIT 1))";

if (mysqli_query($conn, $sql)) {
    // Récupérer l'ID de la réservation qui vient d'être insérée
    $reservation_id = mysqli_insert_id($conn);

    // Redirection vers la page de confirmation de réservation avec l'ID de la réservation
    header("Location: confirmation_reservation.php?reservation_id=" . $reservation_id);
} else {
    echo "Erreur lors de l'ajout de la réservation : " . mysqli_error($conn);
}

    // Fermer la connexion à la base de données
    
}
mysqli_close($conn);
?>