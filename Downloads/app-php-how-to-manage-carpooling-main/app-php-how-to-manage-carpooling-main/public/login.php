<?php
session_start();
require_once '../config/database.php';
require_once '../controllers/UtilisateurController.php';

// Initialisation de la connexion à la base de données
$database = new Database();
$db = $database->getConnection();
$utilisateurController = new UtilisateurController($db);

// Initialisation du message
$message = '';

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);

    // Vérification des identifiants
    if ($utilisateurController->connexion($email, $mot_de_passe)) {
        if ($_SESSION['role'] === 'administrateur') {
            header("Location: ../views/back/admin_dashboard.php");
        } elseif ($_SESSION['role'] === 'conducteur') {
            header("Location: ../views/front/conducteur_dashboard.php");
        } elseif ($_SESSION['role'] === 'passager') {
            header("Location: ../views/front/passager_dashboard.php");
        }
        exit();
    } else {
        $message = "Identifiants incorrects";
    }
}

// Fonction pour afficher le formulaire et les messages
function afficherFormulaireConnexion($message = '') {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
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
                background: #f5f5f5;
            }
            .container {
                background: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
                text-align: center;
            }
            h1 {
                margin-bottom: 1.5rem;
                color: #333;
            }
            input {
                width: 100%;
                padding: 0.75rem;
                margin-bottom: 1rem;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 1rem;
            }
            button {
                width: 100%;
                padding: 0.75rem;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 1rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            button:hover {
                background-color: #45a049;
            }
            p {
                color: red;
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Connexion</h1>
            <?php if (!empty($message)) : ?>
                <p><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
                <button type="submit">Connexion</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}

// Appel de la fonction pour afficher le formulaire
afficherFormulaireConnexion($message);
?>
