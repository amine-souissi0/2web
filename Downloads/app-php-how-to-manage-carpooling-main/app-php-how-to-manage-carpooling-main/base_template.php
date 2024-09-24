<?php
// Base template to handle the layout

function renderHeader($title = "Page Title") {
    echo "<!DOCTYPE html><html lang='fr'><head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>" . htmlspecialchars($title) . "</title>";
    echo "<link rel='stylesheet' href='/public/assets/style.css'>"; // Link to your CSS file
    echo "</head><body>";
}

function renderFooter() {
    echo "<footer>";
    echo "<p>&copy; 2024 Votre société. Tous droits réservés.</p>";
    echo "</footer>";
    echo "</body></html>";
}

function renderNavBar($role) {
    echo "<nav>";
    if ($role === 'administrateur') {
        echo "<a href='/views/back/admin_dashboard.php'>Dashboard Admin</a> | ";
        echo "<a href='/views/back/users.php'>Gestion des utilisateurs</a> | ";
    } elseif ($role === 'conducteur') {
        echo "<a href='/views/front/conducteur_dashboard.php'>Dashboard Conducteur</a> | ";
        echo "<a href='/views/front/gerer_trajets.php'>Gérer vos trajets</a> | ";
        echo "<a href='/views/front/voir_reservations.php'>Voir les réservations</a> | ";
    } elseif ($role === 'passager') {
        echo "<a href='/views/front/passager_dashboard.php'>Dashboard Passager</a> | ";
        echo "<a href='/views/front/recherche_trajets.php'>Rechercher des trajets</a> | ";
    }
    echo "<a href='/public/logout.php'>Déconnexion</a>";
    echo "</nav><hr>";
}
?>
