<?php
include "../include/header.php";
?>
<html>
<body style="padding-top: 150px">
<form action="../back/add_specialite_backend.php" method="post" class="container">
    <div style="background-color: rgba(170, 170, 170, 0.95);width: 300px;padding: 10px;border-radius: 10px">
        <h5 style="color: #0b0b0b">Nouvelle Spétialité</h5>
        <div>
            <input type="text" class="" name="nom_spe" placeholder="Spécialité" minlength="2" maxlength="30" style="border-radius: 5px;border: #6c757d" required>

        </div>
        <div style="margin-top: 10px">
            <input type="submit" class=" btn-primary" value="Valider">
        </div>
    </div>
</form>
</body>
</html>
