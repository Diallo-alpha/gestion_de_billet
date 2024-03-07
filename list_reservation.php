<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
    <link rel="stylesheet" href="list_reservation.css" />
</head>
<body>
    <?php 
    require_once(__DIR__ . '/connect.php');

    try {
        $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connexion à la base échouée: " . $e->getMessage();
    }

    $sql = "SELECT * FROM client";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    ?>

    <?php require_once(__DIR__ . '/header.php'); ?>
    <h1> liste des reservation </h1>
    <table>
        <thead>
            <tr>
                <th><b>Nom</b></th>
                <th><b>Prénom</b></th>
                <th>Email</th>
                <th>N°Tél</th>
                <th>Date de réservation</th>
                <th>Pays</th>
                <th>Nombre de voyageur</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['pays']; ?></td>
                    <td><?php echo $row['nbr_voyageur']; ?></td>
                    <td>
                        <button class="upp-button"><a href="update_reservation.php?id=<?php echo $row['id']; ?>">Modifier</a></button>
                    </td>
                    <td>
                        <button class="dell-button"><a href="delete_reservation.php?id=<?php echo $row['id']; ?>">Supprimer</a></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
