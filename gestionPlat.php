<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        img{
            width: inherit;
        }
        .navbar {
            background-color: #ffa50042;
        }
        
        .navbar-brand {
            color: #FFF; /* Couleur blanche */
            font-size: 32px;
            font-weight: bold;
            display: flex;
            align-items: center;
            font-family: cursive;
        }
        
        .navbar-brand img {
            width: 86px; /* Largeur du logo */
            height: 86px; /* Hauteur du logo */
            margin-right: 10px; /* Marge à droite du logo */
            vertical-align: middle;
        }
        
        .navbar-menu {
            margin-top: 10px; /* Marge supérieure de la liste de menu */
        }
        
        .navbar-menu li {
            display: inline-block;
            margin-right: 10px; /* Marge entre les éléments de la liste */
        }
        
        .navbar-menu li a {
            color: #FFF; /* Couleur blanche */
            font-size: 18px;
            text-decoration: none;
            font-family: cursive;
            padding-bottom: 18px;
        }
        
        .container {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        .welcome-message {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        
        .navbar-menu li a:hover {
            color: red;
            border-bottom: red solid 3px;
        }
        
        .navbar-menu button  {
            background-color: red;
        }
        
        .navbar-menu button a {
            text-decoration: none;
            color:white;
        }
        
        .navbar-menu button a:hover {
            color: red;
        }
        
        .navbar-menu button:hover {
            background-color: transparent;
            border: red solid 2px;
            font-size: bold;
        }
        
        .menu-form input[type="text"],
        .menu-form input[type="file"] {
            width: 400px;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        .menu-form input[type="submit"] {
            display: block;
            width: 400px;
            padding: 10px;
            background-color: #FFA500;
            color: #FFF;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }
        .menu-form input[type="submit"]:hover{
            background-color: red;
            transition: 1s;

        }
        
        .menu-list th {
            background-color: #FFA500;
            color: #FFF;
            font-weight: bold;
            text-align: center;
        }
        
        .menu-list td {
            text-align: center;
        }
        
        .menu-list a.btn {
            margin-right: 5px;
        }
        form{
            margin-left: 15%;
            backdrop-filter: contrast(0.5);
            padding: 30px 100px 35px;
            color: white;
            width: 666px;
        }
        input{
            color: black;
            font-family: cursive;
        }
        input,select,textarea{
            background-color: transparent;
            border-bottom: 3px solid orange;
            color: white;
        }
        table tr:nth-of-type(n){
            background-color: #ff000045;
            color: white;
        }
        table tr:nth-of-type(2n){
            background-color: #ffe6e663;
            color: white;
        }
    </style>
</head>
<body style="background-image: url('image5.jpeg'); background-size: cover;">
    <nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="My Pizza">
            <span>Administration my pizza</span>
        </a>
        <ul class="navbar-menu navbar-right">
            <li><a href="modification.php">Modification profil</a></li>
            <li><a href="reservationList.php">Réservations</a></li>
            <li><a href="creationMenu.php">gestion des Menus</a></li>
            <li><a href="gestionTable.php">gestion des tables</a></li>
            <li><a href="pageAdmin.php">Accueil</a></li>
            <button class="btn btn-danger" ><a href="logout.php">Déconnexion</a></button>
        </ul>
    </div>
    </nav>

    <div class="container">
        <!-- Formulaire pour ajouter un plat -->
        <div class="menu-form">
            <form method="POST" action="process_plat.php" enctype="multipart/form-data">
                <h2>Ajouter un plat</h2>
                <label>Nom :</label>
                <input type="text" name="nom" required>
                <label>Description :</label>
                <input type="text" name="description" required>
                <label>Prix :</label>
                <input type="text" name="prix" required>
                <label>Ingrédients :</label>
                <input type="text" name="ingredients" required>
                <label>Photo :</label>
                <input type="file" name="photo" accept="image/*">
                <input type="submit" value="Ajouter" class="btn btn-primary">
            </form>
        </div>

        <!-- Liste des plats existants -->
        <div class="menu-list">
            <h2>Liste des plats</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Ingrédients</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inclure le fichier de configuration de la base de données
                    include 'connexion.php';

                    // Requête pour récupérer les plats depuis la base de données
                    $sql = "SELECT * FROM plat";
                    $result = $conn->query($sql);

                    // Vérifier s'il y a des plats
                    if ($result->num_rows > 0) {
                        // Afficher chaque plat dans la liste
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['plat_id'] . "</td>";
                            echo "<td>" . $row['nom_plat'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['prix'] . "</td>";
                            echo "<td>" . $row['ingredients'] . "</td>";
                            echo "<td><img src='upload_plats/" . $row['image'] . "' style='width: 100px;'></td>";
                            echo "<td>";
                            echo "<a href='editPlat.php?id=" . $row['plat_id'] . "' class='btn btn-primary'>Modifier</a>";
                            echo "<a href='deletePlat.php?id=" . $row['plat_id'] . "' class='btn btn-danger' onclick='return confirm(\"Voulez-vous vraiment supprimer ce plat ?\")'>Supprimer</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Aucun plat trouvé.</td></tr>";
                    }

                    // Fermer la connexion à la base de données
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
