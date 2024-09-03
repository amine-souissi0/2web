<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le rôle de manager
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'manager') {
    header("Location: /public/login.php");
    exit();
}

require_once '../../config/database.php';
require_once '../../controllers/UtilisateurController.php';

$database = new Database();
$db = $database->getConnection();

$utilisateurController = new UtilisateurController($db);

$title = "Tableau de Bord Manager";
ob_start();
?>

<div class="container">
    <h1 class="title">Tableau de Bord Manager</h1>

    <section class="search-section">
        <h2 class="section-title">Rechercher des employés</h2>
        <form action="" method="GET" class="form">
            <input type="text" name="nom" placeholder="Nom" class="input-field">
            <input type="email" name="email" placeholder="Email" class="input-field">
            <button type="submit" class="button">Rechercher</button>
        </form>
    </section>

    <section class="employees-section">
        <h2 class="section-title">Liste des employés</h2>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date de Création</th>
                    <!-- Ajoutez des colonnes spécifiques pour les évaluations si nécessaire -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['nom']) || isset($_GET['email']))) {
                    $utilisateurs = json_decode($utilisateurController->rechercherUtilisateurs($_GET), true);
                } else {
                    $utilisateurs = json_decode($utilisateurController->lireUtilisateurs(), true);
                }

                foreach ($utilisateurs as $utilisateur):
                    if ($utilisateur['role'] === 'employe'): ?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur['id']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['email']) ?></td>
                        <td><?= htmlspecialchars($utilisateur['date_creation']) ?></td>
                    </tr>
                    <?php endif;
                endforeach; ?>
            </tbody>
        </table>
    </section>
</div>

<?php
$content = ob_get_clean();
include 'base_front.php';
?>
