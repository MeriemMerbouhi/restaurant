<!DOCTYPE html>
<html>
<head>
    <title>Réservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        h1 {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            color: white;
            font-family: cursive;
        }
        
        label {
            font-size: 18px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="datetime-local"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            background-color: #FFA500;
            color: #FFF;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #FF8000;
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
        
        .back-link a {
            color: #FF0000;
            text-decoration: none;
        }
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
        
        .navbar-brand span {
            animation: colorChange 1s infinite;
        }
        
        @keyframes colorChange {
            0% { color: #FFF; } /* Couleur blanche */
            50% { color: #FF0000; } /* Couleur rouge */
            100% { color: #FFF; } /* Couleur blanche */
        }
        
        .navbar-brand img {
            width: 86px; /* Largeur du logo */
            height: 86px; /* Hauteur du logo */
            margin-right: 10px; /* Marge à droite du logo */
            vertical-align: middle;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: white;
        }        
        input[type="submit"] {
            display: block;
            width: 460px;
            padding: 10px;
            background-color: #FFA500;
            color: #FFF;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }
        form{
            margin-left: 280px;
            padding-left: 170px;
            height: 550px;
            width: 600px;
            padding-right: 170px;
            backdrop-filter: contrast(0.3);
            padding: 70px;
        }
        select{
            width: 460px;
            height: 40px;
            margin-bottom: 20px;
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
        option{
            color: black;
        }
    </style>
</head>
<body style="background-image: url('image5.jpeg'); background-size: cover;">
<nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="My Pizza">
                <span>My Pizza</span>
            </a>
        </div>
    </nav>
    <div class="container">
        <h1>Réservation</h1>
        <form method="POST" action="process_reservation.php">
            <label>Nom :</label>
            <input type="text" name="nom" required>
            <label>Date et heure :</label>
            <input type="datetime-local" name="date_heure" 
            min="<?php echo date('Y-m-d\TH:i'); ?>" required>
            <label>Nombre de personnes :</label>
            <input type="number" name="nombre_personnes" max="9" required>
            <select name="menu" required>
                <option value="" selected>--choisissez votre menu--</option>
                <?php
                // Connexion à la base de données
                $conn = mysqli_connect("localhost", "root", "", "restaurant");

                // Récupération des noms de menus depuis la base de données
                $query = "SELECT titre FROM Menu";
                $result = mysqli_query($conn, $query);

                // Affichage des options dans la balise select
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['titre']."'>".$row['titre']."</option>";
                }

                // Fermeture de la connexion à la base de données
                mysqli_close($conn);
                ?>

            </select>
            <input type="submit" value="Réserver" class="btn btn-primary">
            <div class="back-link">
                <a href="index.php">Retour à la page d'accueil</a>
            </div>
        </form>
        
    </div>

</body>
</html>



