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
        input{
            color: black;
            font-family: cursive;
        }
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
        select{
            width: 400px;
            padding: 10px;
            margin-bottom: 20px;
            color: black;
        }
        option{
            color: black;
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
            color: white;
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
            <li><a href="gestionPlat.php">gestion des plats</a></li>
            <li><a href="pageAdmin.php">Accueil</a></li>
            <button class="btn btn-danger" ><a href="logout.php">Déconnexion</a></button>
        </ul>
    </div>
    </nav>
    <div class="container">
        <!-- Formulaire pour ajouter une table -->
        <!-- Formulaire pour ajouter une table -->
<div class="menu-form">
    <form method="POST" action="process_table.php">
        <h2>Ajouter une table</h2>
        <label>Numéro :</label>
        <input type="text" name="numero" required>
        <label>Capacité :</label>
        <input type="text" name="capacite" required>
        <label>Statut :</label>
        <select name="statut" required>
            <option value="">--choisisez statue de table--</option>
            <option value="Libre">Libre</option>
            <option value="Réservée">Réservée</option>
        </select>
        <input type="submit" value="Ajouter" class="btn btn-primary">
    </form>
</div>


        <!-- Liste des tables existantes -->
        <div class="menu-list">
            <h2>Liste des tables</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro</th>
                        <th>Capacité</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Inclure le fichier de configuration de la base de données
                    include 'connexion.php';

                    // Requête pour récupérer les tables depuis la base de données
                    $sql = "SELECT * FROM table_restaurant";
                    $result = $conn->query($sql);

                    // Vérifier s'il y a des tables
                    if ($result->num_rows > 0) {
                        // Afficher chaque table dans la liste
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['table_id'] . "</td>";
                            echo "<td>" . $row['numero_table'] . "</td>";
                            echo "<td>" . $row['capacite'] . "</td>";
                            echo "<td>" . $row['statut'] . "</td>";
                            echo "<td>";
                            echo  "<a href='editTable.php?id=" . $row['table_id'] . "' class='btn btn-primary'>Modifier</a>";
                            echo "<a href='deleteTable.php?id=" . $row['table_id'] . "' class='btn btn-danger' onclick='return confirm(\"Voulez-vous vraiment supprimer cette table ?\")'>Supprimer</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucune table trouvée.</td></tr>";
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
