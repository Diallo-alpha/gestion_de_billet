<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un billet d'avion</title>
  <link rel="stylesheet" href="add_billet.css" />
</head>
<body>
    <?php require_once(__DIR__ .'/header.php');?>
  <form action="sub_billet.php" method="post" enctype="multipart/form-data">
    <h2>Ajouter un billet d'avion</h2>
    <div>
      <label for="prix">Prix :</label>
      <input type="text" id="prix" name="prix" required>
    </div>
    <div>
      <label for="date">Date :</label>
      <input type="date" id="date" name="date" required>
    </div>
    <div>
      <label for="detaille">Détails du billet :</label>
      <textarea name="detaille" id="detaille" cols="66" rows="10" required></textarea>
    </div>
    <div>
      <label for="image">Image :</label>
      <input type="file" id="image" name="image" required>
    </div>
    <div>
      <input type="submit" value="Ajouter">
    </div>
  </form>
</body>
</html>
