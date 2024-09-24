<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'passager') {
    header("Location: /public/login.php");
    exit();
}

// Include the base template
require_once '../../base_back.php';

// Render header and navbar using the base template
renderHeader("Tableau de Bord Passager");
renderNavBar($_SESSION['role']);
?>

<!-- Main content -->
<div class="container">
<h2>Bienvenue sur le tableau de bord passager</h2>
<ul class="dashboard-list">
    <li><a href="recherche_trajets.php" class="button">Rechercher et réserver des trajets</a></li>
    <li><a href="historique_reservations.php" class="button">Voir l'historique de vos réservations</a></li>
</ul>
</div>

<?php
// Render footer
renderFooter();
?>
