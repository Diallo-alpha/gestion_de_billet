<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyages</title>
    <link rel="stylesheet" href="reservation.css">
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <section class="search-form">
            <h2>Reservation de billet</h2>
            <div class="container">
                <div class="formulaire">
                    <form id="search-form" action="sub_reserve.php" method="post">
            <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" placeholder="Diallo" required>
             </div>
            <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" placeholder="Demba" required>
            </div>
            <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="demba.exemple@gmail.com" required>
             </div>
            <div class="form-group">
        <label for="pays">Votre pays:</label>
        <input type="text" id="pays" name="pays" placeholder="Sénégal "required>
            </div>
            <div class="form-group">
        <label for="date">Dates:</label>
        <input type="date" id="date" name="date" placeholder="05/10/2024" required>
            </div>
            <div class="form-group">
        <label for="telephone">Tél:</label>
        <input type="tel" id="telephone" name="telephone" placeholder="778458585" required>
            </div>
            <div class="form-group">
        <label for="nombre">Number of Guests:</label>
        <input type="number" id="nombre" name="nombre" min="1" value="1" required>
            </div>
            <button type="submit">Reserver</button>
        </form>
        </div>
            <div class="paysage">
            <img src="images/voyage.jpg" alt="imge paysaage" class="image">
            </div>
            </div>
        </section>
    </main>
    <section class="destinations">
        <h2>Voyagez dans les meilleures destinations</h2>
        <ul>
            <li><a href="#">Paris</a></li>
            <li><a href="#">Rome</a></li>
            <li><a href="#">New York</a></li>
            <li><a href="#">Tokyo</a></li>
        </ul>
    </section>
    <footer>
        <p>Copyright &copy; 2024 Voyages</p>
        <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </footer>
</body>
</html>
