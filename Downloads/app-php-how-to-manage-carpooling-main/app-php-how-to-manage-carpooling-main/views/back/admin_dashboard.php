<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'administrateur') {
    header("Location: /public/login.php");
    exit();
}

// Fonction pour afficher le tableau de bord administrateur
function afficherTableauDeBordAdmin() {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tableau de bord Administrateur</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }
            body, html {
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #f0f0f0;
            }
            .container {
                background: white;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                width: 100%;
                text-align: center;
            }
            h2 {
                margin-bottom: 1.5rem;
                color: #333;
            }
            ul {
                list-style: none;
                padding: 0;
            }
            ul li {
                margin: 1rem 0;
            }
            a {
                text-decoration: none;
                color: white;
                background-color: #007BFF;
                padding: 0.75rem 1.5rem;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s ease;
            }
            a:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Bienvenue sur le tableau de bord administrateur</h2>
            <ul>
                <li><a href="users.php">Gérer les utilisateurs</a></li>
                <li><a href="trajets.php">Voir les statistiques des trajets</a></li>
            </ul>
        </div>
    </body>
    </html>
    <?php
}

// Appel de la fonction pour afficher le tableau de bord
afficherTableauDeBordAdmin();
?>
