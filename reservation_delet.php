
<?php
require_once(__DIR__ . '/connect.php');

$donnees_post = $_POST;

if (!isset($donnees_post['id']) || !is_numeric($donnees_post['id'])) {
    echo "Erreur sur l'identifiant";
    return;
}

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $billet_delet = $connexion->prepare("DELETE FROM client WHERE id = :id");
    $billet_delet->execute([
        'id' => $donnees_post['id']
    ]);
} catch (PDOException $e) {
    echo "Erreur " . $e->getMessage();
}

$rootUrl = "http://localhost:81/tuto/g_billet/";
header('Location: ' . $rootUrl . 'list_reservation.php');
exit(); // Assurez-vous de quitter le script après la redirection
?>
