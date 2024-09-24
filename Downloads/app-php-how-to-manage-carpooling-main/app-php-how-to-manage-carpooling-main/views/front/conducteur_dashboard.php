<?php
require_once '../../base_back.php'; // Include the base template

session_start();
if ($_SESSION['role'] !== 'conducteur') {
    header("Location: ../public/login.php");
    exit();
}

// Render header and navigation bar
renderHeader("Tableau de Bord Conducteur");
renderNavBar($_SESSION['role']);
?>

<div class="container">
    <h2 class="title">Bienvenue sur le tableau de bord conducteur</h2>
    <ul class="dashboard-list">
        <li><a href="gerer_trajets.php" class="button">Gérer vos trajets</a></li>
        <li><a href="voir_reservations.php" class="button">Voir les réservations des passagers</a></li>
    </ul>
</div>

<?php
// Render footer to close the template
renderFooter();
?>
