<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomPost = $_POST['name'];
    $prenomPost = $_POST['prenom'];
    $paysPost = $_POST['pays'];
    $datePost = $_POST['date'];
    $nombrePost = $_POST['nombre'];
    $emailPost = $_POST['email'];
    $telephonePost = $_POST['telephone'];

    if(empty($nomPost) || !ctype_alpha($nomPost)){
        echo "Veuillez indiquer votre nom correctement.";
    }
    if(empty($prenomPost) || !ctype_alpha($prenomPost)){
        echo "Veuillez indiquer votre prénom correctement.";
    }
    if(empty($paysPost)){
        echo "Veuillez indiquer le pays de départ.";
    }
    if(empty($datePost)){
        echo "Veuillez indiquer la date de départ.";
    }
    if(empty($nombrePost) || !is_numeric($nombrePost)){
        echo "Veuillez indiquer le nombre de voyageurs.";
    }
    if(empty($telephonePost) || !preg_match("/^[0-9]{9}$/", $telephonePost)){
        echo "Numéro de téléphone invalide.";
    }
    // Vérification du format de l'email
    if(empty($emailPost) || !filter_var($emailPost, FILTER_VALIDATE_EMAIL)){
        echo "L'email que vous avez saisi n'est pas valide.";
    }

    require_once(__DIR__ .'/connect.php');
    try {
        $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO client(nom, prenom, pays, date, nbr_voyageur, email, telephone) VALUES (:nom, :prenom, :pays, :date, :nbr_voyageur, :email, :telephone)";
        $stmt = $connexion->prepare($sql);
        //
        $stmt->bindParam(':nom', $nomPost);
        $stmt->bindParam(':prenom', $prenomPost);
        $stmt->bindParam(':pays', $paysPost);
        $stmt->bindParam(':date', $datePost);
        $stmt->bindParam(':nbr_voyageur', $nombrePost);
        $stmt->bindParam(':email', $emailPost);
        $stmt->bindParam(':telephone', $telephonePost); // Correction de la liaison du numéro de téléphone
        $stmt->execute();

    } catch(PDOException $e){
        echo "Connexion à la base de données échouée : " .$e->getMessage();
    }
}
?>
