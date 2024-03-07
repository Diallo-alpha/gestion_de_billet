<?php

//connexion à la base
require_once(__DIR__.'/connect.php');

//récupérer l'id du client
$id_client = isset($_GET['id']) ? intval($_GET['id']) : null;

try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($id_client !== null) {

        $sql = $connexion->prepare("SELECT * FROM client WHERE id = :id");

        $sql->execute([
            'id' => $id_client,
        ]);
        $id_client = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $id_client = false;
    }
} catch (PDOException $e) {
    echo "Erreur " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <section class="search-form">
            <h2>Plan your perfect getaway:</h2>
            <?php if ($id_client !== false): ?>
            <div class="container">
                <div class="formulaire">
                    <form id="search-form" action="sub_update_reservation.php" method="post">
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" value="<?php echo isset($id_client['id']) ? $id_client['id'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" value="<?php echo isset($id_client['name']) ? $id_client['name'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" value="<?php echo isset($id_client['prenom']) ? $id_client['prenom'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($id_client['email']) ? $id_client['email'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pays">Votre pays:</label>
                            <input type="text" id="pays" name="pays" value="<?php echo isset($id_client['pays']) ? $id_client['pays'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date">Dates:</label>
                            <input type="date" id="date" name="date" value="<?php echo isset($id_client['date']) ? $id_client['date'] : ''; ?>">
                        </div> 
                        <div class="form-group">
                            <label for="telephone">Tél:</label>
                            <input type="tel" id="telephone" name="telephone" value="<?php echo isset($id_client['telephone']) ? $id_client['telephone'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Number of Guests:</label>
                            <input type="number" id="nombre" name="nombre" value="<?php echo isset($id_client['nombre']) ? $id_client['nombre'] : ''; ?>">
                        </div>
                        <button type="submit">Search Packages</button>
                    </form>
                </div>
            </div>
            <?php else: ?>
            <p>aucune billet trouvée pour </p>
            <?php endif; ?>
            <div class="paysage">
                <img src="images/Image1.png" alt="image paysage" class="image">
            </div>
        </section>
    </main>
</body>
</html>
