<!DOCTYPE html>
<html>
<head>
    <title>My Pizza - Restaurant</title>
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
            color:white; /* Couleur noire */
            font-size: 18px;
            text-decoration: none;
            font-family: cursive;
        }
        
        .navbar-menu li a:hover {
            color: #FF0000; /* Couleur rouge au survol */
            border-bottom: 3px solid #FF0000;
            padding: 23px;
        }
        
        .container {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        
        .welcome-message {
            text-align: center;
            font-size: 40px;
            font-family: cursive;
            font-weight: bold;
            margin-bottom: 20px;
            backdrop-filter: contrast(0.5);
            color: white;
            width: 100%;
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
            <ul class="navbar-menu navbar-right">
                <li><a href="menu.php">Voir les menus</a></li>
                <li><a href="reservation.php">Faire une réservation</a></li>
            </ul>
        </div>
    </nav>
    <div class="container" >
        <!-- <div class="slideshow-container">
            <img src="image1.jpeg" alt="Image 1">
            <img src="image2.jpeg" alt="Image 2">
            <img src="image3.jpeg" alt="Image 3">
            <img src="image4.jpeg" alt="Image 4">
            <img src="image5.jpeg" alt="Image 5">
            <img src="image6.jpeg" alt="Image 6">
        </div> -->
        <div class="welcome-message">
            <span id="welcomeText">Bienvenue chez My Pizza !</span>
        </div>
    </div>

</body>
</html>
