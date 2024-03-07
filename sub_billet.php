<?php
require_once(__DIR__ .'/connect.php');

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $prixPost = $_POST['prix'];
    $datePost = $_POST['date'];
    $detaille = $_POST['detaille'];

    // Vérification des champs
    if(empty($prixPost) || !is_numeric($prixPost)) {
        echo "Erreur sur le prix que vous avez ajouté";
        exit;
    }
    if(empty($datePost)) {
        echo "Erreur sur la date que vous avez saisie";
        exit;
    }
    if(empty($detaille)) {
        echo "Donnez les détails du billet";
        exit;
    }

    // Vérification de l'envoi de l'image
    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
        // Vérification de la taille de l'image
        if($_FILES['image']['size'] > 10000000){
            echo "Fichier trop volumineux";
            exit;
        }
        
        // Vérification de l'extension de l'image
        $fileInfo = pathinfo($_FILES['image']['name']);
        $extension = strtolower($fileInfo['extension']);
        $extensionAutorise = ['jpg', 'jpeg', 'png', 'gif'];
        if(!in_array($extension, $extensionAutorise)){
            echo "L'ajout n'a pas pu être effectué, veuillez vérifier l'extension du fichier ";
            exit;
        }
        
        // Stockage du chemin de l'image dans une variable
        $imagePath = 'images/' . $_FILES['image']['name'];

        // Déplacement de l'image vers le répertoire souhaité
        if(move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/' . $imagePath)) {
            // Vérification de l'existence de l'image après le déplacement
            if(file_exists(__DIR__ . '/' . $imagePath)) {
                echo "L'image a été téléchargée avec succès.";
            } else {
                echo "Erreur: L'image n'a pas été trouvée dans le dossier 'images'.";
            }

            try {
                // Connexion à la base de données
                $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Requête SQL pour insérer les données
                $sql = "INSERT INTO billet(prix, date, detaille, image) VALUES (:prix, :date, :detaille, :image)";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':prix', $prixPost);
                $stmt->bindParam(':date', $datePost);
                $stmt->bindParam(':detaille', $detaille);
                $stmt->bindParam(':image', $imagePath);
                
                // Exécution de la requête
                $stmt->execute();
                
                // Redirection vers la page d'accueil
                header('Location: accueil.php');
                exit;
            } catch(PDOException $e) {
                echo "Insertion dans la base de données échouée: " . $e->getMessage();
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Veuillez sélectionner une image.";
    }
}
?>
