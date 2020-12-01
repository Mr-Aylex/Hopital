<?php
include "../include/header.php";
?>
<html>
<body style="background-color: #0c5460; padding-top: 100px">
<div>
    <a href="../forms/nouveau_medecin.php">Ajouter un médecin</a>
</div>
<div>
    <a href="../forms/nouveau_admin.php">Ajouter un Admin</a>
</div>
<div>
    <form action="../back/export_backend.php" method="post">
      <input type="submit" class="btn btn-info" value="Exporter en XLS">
    </form>
</div>
<div>
    <form action="../back/export_rdv_backend.php" method="post">
      <input type="submit" class="btn btn-info" value="Exporter RDV en XLS">
    </form>
</div>

</body>
</html>
