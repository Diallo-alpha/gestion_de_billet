<?php 
require_once(__DIR__ . '/connect.php');

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($id !== null) {
        $mysql = $connexion->prepare("SELECT * FROM billet WHERE id = :id");
        $mysql->execute(['id' => $id]);
        $id = $mysql->fetch(PDO::FETCH_ASSOC);
    } else {
        $id = null;
    }
} catch (PDOException $e) {
    echo "Erreur " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier billet</title>
    <link rel="stylesheet" href="add_billet.css" />
</head>
<body>
    <?php require_once(__DIR__ .'/header.php'); ?>
    <form action="sub_billet_update.php" method="post" enctype="multipart/form-data">
        <h2>Modifier</h2>
        <input type="hidden" id="id" name="id" value="<?php echo isset($id['id']) ? $id['id'] : ''; ?>">
        <div>
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" value="<?php echo isset($id['prix']) ? $id['prix'] : ''; ?>">
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" value="<?php echo isset($id['date']) ? $id['date'] : ''; ?>">
        </div>
        <div>
            <label for="detaille">Détails du billet :</label>
            <textarea name="detaille" id="detaille" cols="66" rows="10"><?php echo isset($id['detaille']) ? $id['detaille'] : ''; ?></textarea>
        </div>
        <div>
            <label for="image">Image :</label>
            <?php if (isset($id['image'])): ?>
                <input type="file" id="image" name="image" value="<?php echo $id['image']; ?>">
            <?php endif; ?>
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>
