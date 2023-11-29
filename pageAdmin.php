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
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        .profile-form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFA500;
            color: #FFF;
            border: none;
            font-weight: bold;
            cursor: pointer;
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
<body style="background-image:url('image4.jpeg');
backdrop-filter: contrast(0.5);">
    <nav  class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="My Pizza">
                <span>Administration</span>
            </a>
            <ul class="navbar-menu navbar-right">
                <li><a href="modification.php">Modification profil</a></li>
                <li><a href="reservationList.php">Réservations</a></li>
                <li><a href="creationMenu.php">gestion des Menu</a></li>                
                <li><a href="gestionTable.php">gestion des tables</a></li>
                <li><a href="gestionPlat.php">gestion des plats</a></li>
                <button class="btn btn-danger" ><a href="admin.php">Déconnexion</a></button>
            </ul>
            
        </div>
    </nav>
    <div class="container">
        <div class="welcome-message">
            <h1 style="color:white; font-size: 50px;
            font-family: cursive;font-style: oblique;">
            Bienvenue, Meriem !</h1>
        </div>
    </div>
</body>
</html>
