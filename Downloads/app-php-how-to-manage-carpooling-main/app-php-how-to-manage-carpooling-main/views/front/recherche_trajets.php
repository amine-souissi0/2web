<?php
session_start();
require_once '../../config/database.php';
require_once '../../controllers/TrajetController.php';
require_once '../../controllers/ReservationController.php';

// Ensure the session is active and the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to login if the user is not logged in
    header("Location: /public/login.php");
    exit();
}

// Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize controllers
$trajetController = new TrajetController($db);
$reservationController = new ReservationController($db);

// Handle reservation submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['trajet_id'])) {
    $data = [
        'passager_id' => $_SESSION['id'],  // Pass the logged-in user's ID from session
        'trajet_id' => $_POST['trajet_id']
    ];
    $reservationController->reserverTrajet($data);
    echo "Réservation effectuée avec succès!";
}

// Search and filter trips
$criteria = [
    'depart' => $_GET['depart'] ?? '',
    'destination' => $_GET['destination'] ?? '',
    'date' => $_GET['date'] ?? '',
];

$sort_column = $_GET['sort_column'] ?? 'date';
$sort_order = $_GET['sort_order'] ?? 'ASC';

$trips = $trajetController->rechercherEtTrierTrajets($criteria, $sort_column, $sort_order);

// Function to display the page with design
function afficherPageRechercherTrajets($trips) {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rechercher des Trajets</title>
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
                max-width: 800px;
                width: 100%;
                text-align: left;
            }
            h2 {
                margin-bottom: 1.5rem;
                color: #333;
                text-align: center;
            }
            input, select, button {
                width: 100%;
                padding: 0.75rem;
                margin-bottom: 1rem;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 1rem;
            }
            button {
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            button:hover {
                background-color: #45a049;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
            }
            table th, table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }
            table th {
                background-color: #f4f4f4;
                font-weight: bold;
            }
            .reserve-btn {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 15px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            .reserve-btn:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Rechercher des Trajets</h2>
            <form action="" method="GET">
                <input type="text" name="depart" placeholder="Départ" value="<?= htmlspecialchars($_GET['depart'] ?? '') ?>">
                <input type="text" name="destination" placeholder="Destination" value="<?= htmlspecialchars($_GET['destination'] ?? '') ?>">
                <input type="date" name="date" value="<?= htmlspecialchars($_GET['date'] ?? '') ?>">
                <button type="submit">Rechercher</button>
            </form>

            <h2>Résultats</h2>
            <table>
                <thead>
                    <tr>
                        <th>Départ</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Places Disponibles</th>
                        <th>Réserver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trips as $trip): ?>
                    <tr>
                        <td><?= htmlspecialchars($trip['depart']) ?></td>
                        <td><?= htmlspecialchars($trip['destination']) ?></td>
                        <td><?= htmlspecialchars($trip['date']) ?></td>
                        <td><?= htmlspecialchars($trip['places_disponibles']) ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="trajet_id" value="<?= htmlspecialchars($trip['id']) ?>">
                                <button type="submit" class="reserve-btn">Réserver</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
}

// Call the function to display the page
afficherPageRechercherTrajets($trips);
?>
