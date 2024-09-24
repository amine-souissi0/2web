<?php
// Base template for admin views

function renderHeader($title = "Gestion des Utilisateurs") {
    echo "<!DOCTYPE html><html lang='fr'><head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>" . htmlspecialchars($title) . "</title>";
    echo "<link rel='stylesheet' href='/css/style.css'>"; // External CSS file for styling
    echo "</head><body>";
}

function renderNavBar($role) {
    echo "<nav class='navbar'>";
    echo "<ul>";
    echo "<li><a href='/views/back/admin_dashboard.php'>Tableau de Bord</a></li>";
    echo "<li><a href='/views/back/users.php'>Gestion des Utilisateurs</a></li>";
    echo "<li><a href='/views/back/statistiques.php'>Statistiques</a></li>";
    echo "<li><a href='/public/login.php'>Déconnexion</a></li>";
    echo "</ul>";
    echo "</nav><hr>";
}

function renderFooter() {
    echo "<footer class='footer'>";
    echo "<p>&copy; 2024 Gestion de Covoiturage - Tous droits réservés.</p>";
    echo "</footer>";
    echo "</body></html>";
}
?>
