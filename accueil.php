<?php
require_once(__DIR__ . '/connect.php');

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connexion à la base de données échouée: " . $e->getMessage();
}

$sql = "SELECT * FROM billet";
$stmt = $connexion->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="fr">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <div class="bannier">
    <div class="contenu">
      <h1>Réservez vos billets dès maintenant</h1>
      <p>et partez à l'aventure !</p>
    </div>
  </div>
    <div class="card_container">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class='card'>
                <img src="<?= $row['image'] ?>" alt="">
                <div class="card-content">
                    <p><?= $row['detaille']; ?></p>
                    <p><b>Prix :</b><?= $row['prix']; ?></p>
                    <p><b>Date de départ :</b> <?= $row['date']; ?></p>
                    <a href='rserve.php' class="btn">Réserver</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
