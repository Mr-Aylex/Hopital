<?php
include "../include/header.php";
?>
<html>
<body style="background-image: url('/Hopital/images/hero_bg_1.jpg'); padding-top: 100px;background-repeat: no-repeat">
<div class="container">
    <div style="padding-top: 10px">
        <a href="../forms/nouveau_medecin.php" class="btn btn-info">Ajouter un médecin</a>
    </div>
    <div style="padding-top: 10px">
        <a href="../forms/nouveau_admin.php" class="btn btn-info">Ajouter un Admin</a>
    </div>
    <div style="padding-top: 10px;">
        <form action="../back/export_backend.php" method="post">
          <input type="submit" class="btn btn-info" value="Exporter en XLS">
        </form>
    </div>
    <div>
        <form action="../back/export_rdv_backend.php" method="post">
          <input type="submit" class="btn btn-info" value="Exporter RDV en XLS">
        </form>
    </div>
</div>
</body>
</html>
