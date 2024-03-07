<?php
require_once(__DIR__ . '/connect.php');

$donnees_post = $_POST;

// Vérification des données reçues
if (
    !isset($donnees_post['id']) || !is_numeric($donnees_post['id']) || empty($donnees_post['id']) || trim($donnees_post['id']) === '' ||
    trim(strip_tags($donnees_post['name'])) === '' ||
    trim(strip_tags($donnees_post['prenom'])) === '' ||
    empty($donnees_post['email']) || !filter_var($donnees_post['email'], FILTER_VALIDATE_EMAIL) ||
    trim(strip_tags($donnees_post['pays'])) === '' ||
    trim(strip_tags($donnees_post['date'])) === '' ||
    trim(strip_tags($donnees_post['telephone'])) === '' ||
    trim(strip_tags($donnees_post['nombre'])) === ''
) {
    echo "Données manquantes dans le formulaire";
    return;
}

try {
    $id = (int)$donnees_post['id'];
    $name = trim(strip_tags($donnees_post['name']));
    $prenom = trim(strip_tags($donnees_post['prenom']));
    $email = trim(strip_tags($donnees_post['email']));
    $pays = trim(strip_tags($donnees_post['pays']));
    $date = trim(strip_tags($donnees_post['date']));
    $telephone = trim(strip_tags($donnees_post['telephone']));
    $nombre = trim(strip_tags($donnees_post['nombre']));

    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $donneUpdate = $connexion->prepare("UPDATE client SET nom = :nom, prenom = :prenom, email = :email, pays = :pays, date = :date, telephone = :telephone, nbr_voyageur = :nbr_voyageur WHERE id = :id");

    $donneUpdate->execute([
        'id' => $id,
        'nom' => $name,
        'prenom' => $prenom,
        'email' => $email,
        'pays' => $pays,
        'date' => $date,
        'telephone' => $telephone,
        'nbr_voyageur' => $nombre,
    ]);
} catch (PDOException $e) {
    echo "Erreur " . $e->getMessage();
}

    $rootUrl = "http://localhost:81/tuto/g_billet/";
    header('Location: ' .$rootUrl . 'list_reservation.php'); 
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <div class="container"> -->
    <!-- <?php/* require_once(__DIR__ . '/header.php'); */?>
        <div class="card">
            <h3><b> Nom :</b><?php/* echo ($name); */?></h3>
            <h3><b>Prenom : </b><?php /*echo ($prenom);*/?></h3>
            <h3><b>Email :</b><?php/* echo ($email); */?></h3>
            <h3><b>Pays :</b><?php /*echo ($pays);*/?></h3>
            <h3><b>date :</b><?php /* echo ($date); */?></h3>
            <h3><b>Télephone</b><?php/* echo ($telephone); */?></h3>
            <h3><b>Nombre de voyageur :</b><?php/* echo ($nombre); */?></h3>
        </div>
    </div>
</body>
</html> -->
