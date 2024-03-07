<?php
require_once(__DIR__ . '/connect.php');

$get_donne = $_GET;

if (!isset($get_donne['id']) || !is_numeric($get_donne['id'])) {
    echo "Erreur sur l'identifiant ";
    return;
}

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
    <link rel="stylesheet" href="delete.css" />
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <div class="container">
        <form action="reservation_delet.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($get_donne['id']); ?>">
            <button type="submit">Supprimer définitivement</button>
        </form>
    </div>
</body>
</html>
