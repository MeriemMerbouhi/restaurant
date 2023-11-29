<!DOCTYPE html>
<html lang="en">

<head>
    <title>Authentification Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            margin-bottom: 30px;
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
            background-color: #ffa50042;
        }

        .navbar-brand {
            color: #FFF;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            font-family: cursive;
        }

        .navbar-brand span {
            animation: colorChange 1s infinite;
            text-decoration: none;
        }

        @keyframes colorChange {
            0% {
                color: #FFF;
            }

            50% {
                color: #FF0000;
            }

            100% {
                color: #FFF;
            }
        }

        .navbar-brand img {
            width: 60px;
            height: 60px;
            margin-right: 10px;
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
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFA500;
            color: #FFF;
            border: none;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            transition: 1s;
            background-color: red;
        }

        form {
            margin: 50px auto;
            max-width: 600px;
            padding: 20px;
            backdrop-filter: contrast(0.3);
        }

        input,
        select,
        textarea {
            background-color: transparent;
            border-bottom: 3px solid orange;
            color: white;
        }

        table tr:nth-of-type(n) {
            background-color: #ff000045;
            color: white;
        }

        table tr:nth-of-type(2n) {
            background-color: #ffe6e663;
            color: white;
        }

        @media (max-width: 767px) {
            .navbar-brand {
                font-size: 20px;
            }

            .navbar-brand img {
                width: 40px;
                height: 40px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            form {
                padding: 10px;
            }
        }
    </style>
</head>

<body style="background-image: url('image5.jpeg'); background-size: cover; margin: 0px;">
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="My Pizza">
                <span>My Pizza</span>
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="process_authentification.php">
            <h1>Authentification Admin</h1>
            <label>Email :</label>
            <input type="email" name="email" required>
            <label>Mot de passe :</label>
            <input type="password" name="password" required>
            <input type="submit" value="Se connecter" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
