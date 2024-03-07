<?php
require_once(__DIR__ . '/connect.php');

$post_donne = $_POST;

if(
    !isset($post_donne['id']) || empty($post_donne['id']) || !is_numeric($post_donne['id']) || trim($post_donne['id']) === ''
    ||empty($post_donne['prix']) || !is_numeric($post_donne['prix']) 
    ||empty($post_donne['date']) || trim($post_donne['date']) === ''
    ||empty($post_donne['detaille']) || trim($post_donne['detaille']) === ''
){
    echo "Erreur : Les données sont invalides ou incomplètes";
    return;
}

//
if(isset($_FILES['image']) && $_FILES['image']['error'] === 0)
{
    // Vérifier la taille de l'image
    if($_FILES['image']['size'] > 10000000)
    {
        echo "Taille du fichier trop grande";
        exit;
    }

    // Vérification de l'extension
    $fileinfo = pathinfo($_FILES['image']['name']);
    $extension = strtolower($fileinfo['extension']);
    $extensionAutorise = ['jpeg', 'png', 'jpg', 'gif'];
    if(!in_array($extension, $extensionAutorise))
    {
        echo "L'envoi n'a pas pu être effectué. L'extension n'est pas autorisée";
        exit;
    }

    // Chemin de stockage 
    $imagePath = 'images/' . $_FILES['image']['name'];

    // Déplacement de l'image 
    if(move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ .'/' .$imagePath))
    {
        if(file_exists(__DIR__ . '/' . $imagePath))
        {
            echo "L'image est bonne";
        }
        else
        {
            echo "Erreur sur l'image";
        }
    }
}

try{
    $id = $post_donne['id'];
    $prix = $post_donne['prix'];
    $detaille = $post_donne['detaille'];
    $date = $post_donne['date'];

    // Nom du fichier de l'image
    $image = $_FILES['image']['name'] ?? '';

    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $billetUpdate = $connexion->prepare("UPDATE billet SET prix = :prix, detaille = :detaille, date = :date, image = :image WHERE id = :id");
    $billetUpdate->execute([
        'prix' => $prix,
        'detaille' => $detaille,
        'date' => $date,
        'image' => $image,
        'id' => $id
    ]);
}catch(PDOException $e){
    echo "Erreur " . $e->getMessage();
}
$rootUrl = "http://localhost:81/tuto/g_billet/";
header('Location: ' .$rootUrl . 'billet.php'); 
?>
