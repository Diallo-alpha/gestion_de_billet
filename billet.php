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
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <div class="container">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class='card'>
                <img src="<?= $row['image'] ?>" alt="">
                <div class="card-body">
                    <p><?= $row['detaille']; ?></p>
                    <p><b>prix :</b><?= $row['prix']; ?></p>
                    <p><b>Date de départ :</b> <?= $row['date']; ?></p>
                    <button><a href="billet_update.php?id=<?php echo $row['id']; ?>">Modifier</a></button>
                    <button><a href='billet_delete.php?id=<?php echo $row['id'];?>'>Supprimer</a></button>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
