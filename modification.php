<?php
include 'connexion.php';
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: admin.php");
    exit;
}
$email = $_SESSION["email"];
echo $email;
$query = "SELECT nom FROM admin WHERE email = '$email'";
$result1 = mysqli_query($conn, $query);
$query = "SELECT email FROM admin WHERE email = '$email'";
$result2 = mysqli_query($conn, $query);


if ($result1 && mysqli_num_rows($result1) > 0) {
    $row = mysqli_fetch_assoc($result1);
    $nom = $row["nom"];
} else {
    $nom = "Not found"; // Set a default value if the user's data is not found
}
if ($result2 && mysqli_num_rows($result2) > 0) {
    $row = mysqli_fetch_assoc($result2);
    $email = $row["email"];
} else {
    $email = "Not found"; // Set a default value if the user's data is not found
}

// Close the database connection
mysqli_close($conn);
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
        .container {
            margin-top: 10px;
            margin-bottom: 10px;
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
            background-color: transparent;
            border-bottom: 3px solid orange;
            color: white;
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
        form{
            margin-left: 280px;
            margin-top: 50px;
            padding-left: 170px;
            height: 550px;
            width: 600px;
            padding-right: 170px;
            backdrop-filter: contrast(0.3);
            padding: 70px;
        }
    
    </style>
</head>
<body style="background-image: url('image5.jpeg'); background-size: cover;" >
    <nav  class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="My Pizza">
                <span>Administration my pizza</span>
            </a>
            <ul class="navbar-menu navbar-right">
                <li><a href="pageAdmin.php">Accueil</a></li>
                <li><a href="reservationList.php">Réservations</a></li>
                <li><a href="creationMenu.php">gestion des Menu</a></li>
                <li><a href="gestionTable.php">gestion des tables</a></li>
                <li><a href="gestionPlat.php">gestion des plats</a></li>
                <button class="btn btn-danger" ><a href="logout.php">Déconnexion</a></button>
            </ul>
            
        </div>
    </nav>
    <div class="container">
            <form action="process_modification.php" method="post">
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" id="nom" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="pass">Mot de passe :</label>
                    <input type="password" name="password"  class="form-control" id="pass" placeholder="mot de passe">
                </div>
                <input type="submit" class="btn btn-danger" value="enregistrer la modification">
            </form>
        
    </div>
    
</body>
</html>
