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
<!-- editMenu.php -->
<?php
// Inclure le fichier de configuration de la base de données
include 'connexion.php';

// Vérifier si l'ID du menu est passé en paramètre (via la méthode GET)
if (isset($_GET['id'])) {
    $id_menu = $_GET['id'];

    // Requête SQL pour récupérer les informations du menu depuis la base de données
    $sql = "SELECT * FROM menu WHERE menu_id = $id_menu";
    $result = $conn->query($sql);

    // Vérifier si le menu existe dans la base de données
    if ($result->num_rows == 1) {
        $menu = $result->fetch_assoc();
        // Les informations du menu sont stockées dans la variable $menu
    } else {
        echo "Menu non trouvé.";
    }
} else {
    echo "ID de menu non spécifié.";
}
?>

<!-- Formulaire pour modifier le menu -->
<div class="menu-form">
    <form method="POST" action="process_edit_menu.php"  enctype="multipart/form-data">
>
        <h2>Modifier le menu</h2>
        <input type="hidden" name="id_menu" value="<?php echo $menu['menu_id']; ?>">
        <label>Titre :</label>
        <input type="text" name="titre" value="<?php echo $menu['titre']; ?>" required>
        <label>Description :</label>
        <input type="text" name="description" value="<?php echo $menu['description']; ?>" required>
        <label>Prix :</label>
        <input type="text" name="prix" value="<?php echo $menu['prix']; ?>" required>
        <label>Photo actuelle :</label>
        <img src="upload/<?php echo $menu['image']; ?>" style="width: 100px;">
        <label>Nouvelle photo :</label>
        <input type="file" name="photo" accept="image/*">
        <input type="submit" value="Modifier" class="btn btn-primary">
    </form>
</div>
