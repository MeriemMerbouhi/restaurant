<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de réservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('image5.jpeg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }

        .container {
            margin-top: 30px;
            text-align: center;
        }

        .navbar {
            background-color: #ffa50042;
        }

        .navbar-brand {
            color: #FFF;
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
            0% { color: #FFF; }
            50% { color: #FF0000; }
            100% { color: #FFF; }
        }

        .navbar-brand img {
            width: 86px;
            height: 86px;
            margin-right: 10px;
            vertical-align: middle;
        }

        h1 {
            font-size: 40px;
            font-weight: bold;
            font-family: cursive;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .back-link {
            margin-top: 30px;
        }

        .back-link a {
            color: #FF0000;
            text-decoration: none;
            font-size: 18px;
        }
        #btnPrint,#btnDownload{
            background-color: red;
            margin-top: 30px;
        }
        #btnPrint
        {
            margin-right: 25px;
        }
        .form{
            margin-left: 103px;
            padding-left: 170px;
            height: 567px;
            width: 829px;
            padding-right: 170px;
            backdrop-filter: contrast(0.3);
            padding: 70px;
            color:white;
        }
        .form img{
            width: 65px;
            display: none;
        }
        .form span{
            font-size: 28px;
            display: none;
        }
        @media print{
            .back-link,#btnPrint,#btnDownload{
                display: none;
            }
            .print-header {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 20px;
            }
            .print-header img {
                width: 86px;
                height: 86px;
                margin-right: 10px;
            }

            .print-header h1 {
                font-size: 32px;
                font-weight: bold;
                font-family: cursive;
                margin: 0;
            }
            .form{
                margin-left: 0;
            }
            .form img{
            width: 65px;
            display: inline-block;
            }
            .form span{
                font-size: 28px;
                display: inline-block;
            }
        }
        @font-face {
            font-family: 'Roboto-Medium';
            src: url('../fonts/Roboto-Medium.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
            
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="print-header">
                <a class="navbar-brand" href="#">
                    <img src="logo.png" alt="My Pizza">
                    <span>My Pizza</span>
                </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        // Vérifie si l'utilisateur a été redirigé depuis la page de réservation avec les données de réservation
        if (isset($_GET["reservation_id"])) {
            // Récupérer l'ID de la réservation à partir de l'URL
            $reservation_id = $_GET["reservation_id"];

            // Connexion à la base de données
            $conn = mysqli_connect("localhost", "root", "", "restaurant");

            // Vérifier la connexion
            if (!$conn) {
                die("La connexion à la base de données a échoué: " . mysqli_connect_error());
            }

            // Récupérer les détails de la réservation depuis la base de données
            $sql = "SELECT u.nom_utilisateur, r.nombre_personnes, m.titre AS nom_menu, t.numero_table, r.date_reservation
                    FROM reservation r
                    INNER JOIN utilisateur u ON u.utilisateur_id = r.utilisateur_id
                    INNER JOIN menu m ON m.menu_id = r.menu_id
                    INNER JOIN table_restaurant t ON t.table_id = r.table_id
                    WHERE r.reservation_id = '$reservation_id'";

            $result = mysqli_query($conn, $sql);

            // Vérifier s'il y a des résultats
            if (mysqli_num_rows($result) > 0) {
                // Afficher les détails de la réservation
                $row = mysqli_fetch_assoc($result);
                echo "<div class='form'><img src='logo.png' alt='My Pizza'>
                <span>My Pizza</span>";
                echo "<h1>Confirmation de réservation</h1>";
                echo "<ul>";
                echo "<li>Nom d'utilisateur : " . $row['nom_utilisateur'] . "</li>";
                echo "<li>Nombre de personnes : " . $row['nombre_personnes'] . "</li>";
                echo "<li>Menu : " . $row['nom_menu'] . "</li>";
                echo "<li>Numéro de table réservée : " . $row['numero_table'] . "</li>";
                echo "<li>Date et heure de réservation :<br> " . $row['date_reservation'] . "</li>";
                echo "</ul>";
                echo "<button id='btnPrint'>Enregistrer pdf</button>
                </div>";
            } else {
                echo "<p>Aucune réservation trouvée.</p>";
            }
// <button id='btnDownload'>Télécharger le PDF</button>
            // Fermer la connexion à la base de données
            mysqli_close($conn);
        } else {
            echo "<p>Aucune réservation trouvée.</p>";
        }
        ?>
        <div class="back-link">
            <a href="index.php">Retour à la page d'accueil</a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ajouter un événement de clic pour le bouton d'impression
        document.getElementById("btnPrint")
        .addEventListener("click", function() {
            window.print();
        });
    });
</script>
</body>
</html>
