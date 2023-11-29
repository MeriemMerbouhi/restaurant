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
        .navbar {
            background-color: #ffa50042;        }
        
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
        .navbar-menu li a:hover {
            color: red;
            border-bottom: red solid 3px;
        }
        .navbar-menu button  {
            background-color: red;
        }
        .navbar-menu button a{
            text-decoration: none;
            color:white;
        }
        .navbar-menu button a:hover{
            color: red;
        }
        .navbar-menu button:hover {
            background-color: transparent;
            border: red solid 2px;
            font-size: bold;
        }
        
        table {
            width: 100%;
            margin-top: 50px;
            color: #FFF;
            font-weight: bold;
            text-align: center;
            border-collapse: collapse;
        }
        
        table th, table td {
            padding: 15px;
            border-bottom: 1px solid #FFF;
        }
        
        table th {
            background-color: #FFA500;
        }
        
        table tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        th{
            text-align: center;
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
            <a class="navbar-brand" >
                <img src="logo.png" alt="My Pizza">
                <span>Administration my pizza</span>
            </a>
            <ul class="navbar-menu navbar-right">
                <li><a href="pageAdmin.php">Accueil</a></li>
                <li><a href="modification.php">modification</a></li>
                <li><a href="creationMenu.php">gestion des Menu</a></li>
                <li><a href="gestionTable.php">gestion des tables</a></li>
                <li><a href="gestionPlat.php">gestion des plats</a></li>
                <button class="btn btn-danger" ><a href="logout.php">Déconnexion</a></button>
            </ul>
            
        </div>
    </nav>
    <div class="container">
        <div class="reservation-table">
            <table>
                <tr>
                    <th>id de la réservation</th>
                    <th>nom utilisateur</th>
                    <th>Numéro de table</th>
                    <th>titre de menu</th>
                    <th>Date et heure</th>
                    <th>Nombre de personnes</th>
                </tr>
                <tbody>
                <?php
                // Inclure le fichier de configuration de la base de données
                include 'connexion.php';

                // Requête pour récupérer les menus depuis la base de données
                $sql = "SELECT r.reservation_id, r.date_reservation, r.nombre_personnes, m.titre, t.numero_table, u.nom_utilisateur
                FROM reservation r
                INNER JOIN menu m ON m.menu_id = r.menu_id
                INNER JOIN table_restaurant t ON t.table_id = r.table_id
                INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id";
                
                $result = $conn->query($sql);

                // Vérifier s'il y a des menus
                if ($result->num_rows > 0) {
                    // Afficher chaque menu dans la liste
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['reservation_id'] . "</td>";
                        echo "<td>" . $row['nom_utilisateur'] . "</td>";
                        echo "<td>" . $row['numero_table'] . "</td>";
                        echo "<td>" . $row['titre'] . "</td>";
                        echo "<td>" . $row['date_reservation'] . "</td>";
                        echo "<td>" . $row['nombre_personnes'] . "</td>";
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
