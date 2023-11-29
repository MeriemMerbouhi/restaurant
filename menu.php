<!DOCTYPE html>
<html>
<head>
    <title>Menus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* ... Styles CSS existants ... */
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
        .navbar-menu {
            margin-top: 10px; /* Marge supérieure de la liste de menu */
        }
        
        .navbar-menu li {
            display: inline-block;
            margin-right: 10px; /* Marge entre les éléments de la liste */
        }
        
        .navbar-menu li a {
            color: white; /* Couleur noire */
            font-size: 18px;
            text-decoration: none;
            font-family: cursive;
        }
        
        .navbar-menu li a:hover {
            color: #FF0000; /* Couleur rouge au survol */
            border-bottom: 3px solid #FF0000;
            padding: 23px;
        }
        /* Ajout de styles pour le contenu complet de la description */
        .description-full {
            display: none;
        }

        .show-more {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .menu-container {
            margin-bottom: 20px;
            padding: 10px;
            border: 2px solid #FFA500;
            border-radius: 10px;
            display: flex;
            align-items: center;
            backdrop-filter: contrast(0.5);
        }

        .menu-image {
            width: 40%;
            height: 440px;
            border-radius: 10px;
        }

        .menu-details {
            width: 60%;
            padding-left: 20px;
        }

        .menu-title {
            font-size: 64px;
            font-weight: bold;
            color: #FFF;
            text-shadow: 2px 2px #FF0000;
            margin-bottom: 10px;
        }

        .menu-price {
            font-size: 20px;
            font-weight: bold;
            color: #FF0000;
            text-align: end;
        }

        .menu-description {
            font-size: 18px;
            color: #FFF;
            text-align:start;
            margin-bottom: 10px;
            max-height: 100px;
            overflow: hidden;
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
    <!-- ... La barre de navigation et le reste du contenu existant ... -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="My Pizza">
                <span>My Pizza</span>
            </a>
            <ul class="navbar-menu navbar-right">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="reservation.php">Faire une réservation</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h1>Menus</h1>
        <?php
        // Connexion à la base de données
        $conn = mysqli_connect("localhost", "root", "", "restaurant");

        // Récupération des menus depuis la base de données
        $query = "SELECT * FROM Menu";
        $result = mysqli_query($conn, $query);

        // Affichage des menus
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='menu-container'>";
            echo "<img src='upload/".$row['image']."' alt='".$row['titre']."' class='menu-image'>";
            echo "<div class='menu-details'>";
            echo "<div class='menu-title'>".$row['titre']."</div>";
            
            // Affichage du texte complet de la description avec lien "Voir plus"
            echo "<div class='menu-description'>".$row['description']." ";
            if (strlen($row['description']) > 100) {
                echo "<span class='show-more'>Voir plus</span>";
                echo "<span class='description-full'>".$row['description']." <span class='show-less'>Voir moins</span></span>";
            }
            echo "</div>";
                        echo "<div class='menu-price'>Prix : ".$row['prix']." €</div>";

            echo "</div>";
            echo "</div>";
        }

        // Fermeture de la connexion à la base de données
        mysqli_close($conn);
        ?>

        <!-- Script pour afficher/masquer le texte complet de la description -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const showMoreButtons = document.querySelectorAll(".show-more");
                const descriptionFulls = document.querySelectorAll(".description-full");
                const showLessButtons = document.querySelectorAll(".show-less");

                showMoreButtons.forEach((button, index) => {
                    button.addEventListener("click", () => {
                        descriptionFulls[index].style.display = "inline";
                        button.style.display = "none";
                    });
                });

                showLessButtons.forEach((button, index) => {
                    button.addEventListener("click", () => {
                        descriptionFulls[index].style.display = "none";
                        document.querySelectorAll(".show-more")[index].style.display = "inline";
                    });
                });
            });
        </script>
    </div>
</body>
</html>
