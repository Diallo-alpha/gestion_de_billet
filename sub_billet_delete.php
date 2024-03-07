
<?php
require_once(__DIR__ . '/connect.php');

$getDonne = $_POST;

if (!isset($getDonne['id']) || !is_numeric($getDonne['id'])) {
    echo "Erreur sur l'identifiant";
    return;
}

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $billet_delet = $connexion->prepare("DELETE FROM billet WHERE id = :id");
    $billet_delet->execute([
        'id' => $getDonne['id']
    ]);
} catch (PDOException $e) {
    echo "Erreur " . $e->getMessage();
}

$rootUrl = "http://localhost:81/tuto/g_billet/";
header('Location: ' . $rootUrl . 'billet.php');
exit(); // Assurez-vous de quitter le script après la redirection
?>
