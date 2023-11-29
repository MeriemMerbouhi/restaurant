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
<nav  class="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="My Pizza">
            <span>Administration my pizza</span>
        </a>
        <ul class="navbar-menu navbar-right">
            <li><a href="modification.php">Modification profil</a></li>
            <li><a href="reservationList.php">Réservations</a></li>
            <li><a href="gestionTable.php">gestion des tables</a></li>
            <li><a href="gestionPlat.php">gestion des plats</a></li>
            <li><a href="pageAdmin.php">Accueil</a></li>
            <button class="btn btn-danger" ><a href="logout.php">Déconnexion</a></button>
        </ul>
    </div>
</nav>

<div class="container">

    <!-- Formulaire pour ajouter un menu -->
    <div class="menu-form">
        
        <form method="POST" action="process_menu.php" enctype="multipart/form-data">
            <h2>Ajouter un menu</h2>
            <label>Titre :</label>
            <input type="text" name="titre" required>
            <label>Description :</label>
            <input type="text" name="description" required>
            <label>Prix :</label>
            <input type="text" name="prix" required>
            <label>Photo :</label>
            <input type="file" name="photo" accept="image/*">
            <input type="submit" value="Ajouter" class="btn btn-primary">
        </form>
    </div>

    <!-- Liste des menus existants -->
    <div class="menu-list">
        <h2>Liste des menus</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de configuration de la base de données
                include 'connexion.php';

                // Requête pour récupérer les menus depuis la base de données
                $sql = "SELECT * FROM menu";
                $result = $conn->query($sql);

                // Vérifier s'il y a des menus
                if ($result->num_rows > 0) {
                    // Afficher chaque menu dans la liste
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['menu_id'] . "</td>";
                        echo "<td>" . $row['titre'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['prix'] . "</td>";
                        echo "<td><img src='upload/" . $row['image'] . "' style='width: 100px;'></td>";
                        echo "<td>";
                        echo "<a href='editMenu.php?id=" . $row['menu_id'] . "' class='btn btn-primary'>Modifier</a>";
                        echo"<a href='deleteMenu.php?id=" . $row['menu_id'] . "' class='btn btn-danger' onclick='return confirm(\"Voulez-vous vraiment supprimer ce menu ?\")'>Supprimer</a>";;
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun menu trouvé.</td></tr>";
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
