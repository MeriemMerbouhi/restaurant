<!DOCTYPE html>
<html>
<head>
    <title>Authentification Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        h1 {
            text-align: center;
            font-size: 35px;
            font-weight: bold;
            color: red;
            margin-bottom: 62px;
            font-family: cursive;
        }
        
        label {
            font-size: 18px;
            font-weight: bold;
        }
        
        input[type="email"],
        input[type="password"] {
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
        .navbar {
            background-color: #ffa50042; /* Couleur orange */
        }
        
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
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 400px;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        input[type="submit"] {
            display: block;
            width: 400px;
            padding: 10px;
            background-color: #FFA500;

            color: #FFF;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            transition: 1s;
            background-color: red;
        }
        form{
            margin-left: 280px;
            margin-top: 50px;
            padding-left: 170px;
            height: 550px;
            width: 600px;
            padding-right: 170px;
            backdrop-filter: contrast(0.3);
            padding: 70px;
            padding-top: 20px;
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
                <span>My Pizza</span>
            </a>
        </div>
    </nav>
    <div class="container">
        

        <?php
        // Inclure le fichier de configuration de la base de données
        include 'connexion.php';

        // Vérifier si l'ID du plat est passé en paramètre dans l'URL
        if (isset($_GET['id'])) {
            $plat_id = $_GET['id'];

            // Requête pour récupérer les données du plat depuis la base de données
            $sql = "SELECT * FROM plat WHERE plat_id = '$plat_id'";
            $result = $conn->query($sql);

            // Vérifier si le plat existe
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Afficher le formulaire de modification avec les données du plat
                echo '
                    <form method="POST" action="process_edit_plat.php" enctype="multipart/form-data">
                    <h2>Modifier un plat</h2>
                    <input type="hidden" name="plat_id" value="' . $row['plat_id'] . '">
                        <label>Nom :</label>
                        <input type="text" name="nom" value="' . $row['nom_plat'] . '" required>
                        <label>Description :</label>
                        <input type="text" name="description" value="' . $row['description'] . '" required>
                        <label>Prix :</label>
                        <input type="text" name="prix" value="' . $row['prix'] . '" required>
                        <label>Ingrédients :</label>
                        <input type="text" name="ingredients" value="' . $row['ingredients'] . '" required>
                        <label>Photo :</label>
                        <input type="file" name="photo" accept="image/*">
                        <input type="submit" value="Enregistrer les modifications" class="btn btn-primary">
                    </form>
                ';
            } else {
                echo '<p>Aucun plat trouvé avec cet ID.</p>';
            }
        } else {
            echo '<p>ID du plat non spécifié.</p>';
        }

        // Fermer la connexion à la base de données
        $conn->close();
        ?>

    </div>
</body>
</html>
