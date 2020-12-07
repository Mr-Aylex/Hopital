<?php
include "../include/header.php";
?>
<html>
<body style="padding-top: 150px">
<form action="../back/add_admin_backend.php" method="post" class="container">
    <div style="background-color: rgba(170, 170, 170, 0.95);width: 400px;padding: 10px;border-radius: 10px">
        <h5 style="color: #0b0b0b">Nouvel Administrateur</h5>
        <div>
            <label for="">Nom</label><br>
            <input type="text" name="nom" minlength="2" maxlength="30" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div style="margin-top: 10px">
            <label for="">Prenom</label><br>
            <input type="text" name="prenom" minlength="2" maxlength="30" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div style="margin-top: 10px">
            <label for="">Adresse mail</label><br>
            <input type="email" name="mail"  style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div style="margin-top: 10px">
            <label for="">Mot de passe</label><br>
            <input type="password" class="" name="mdp" maxlength="80" style="border-radius: 5px;border: #6c757d" required>
        </div>
        <div style="margin-top: 10px">
            <input type="submit" class=" btn-primary" value="Valider">
        </div>

    </div>
</form>
</body>
</html>
