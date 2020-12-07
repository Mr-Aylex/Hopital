<?php
include "../include/header.php";
?>
<html>
<body style="padding-top: 150px">
<form action="../back/add_specialite_backend.php" method="post">
    <div class="form-group row">
        <div class="col-md-6 mb-4 mb-lg-0">
            <input type="text" class="form-control" name="nom" placeholder="Spécialité" minlength="2" maxlength="30" required>
        </div>
      </div>

    <div class="form-group row">
        <div class="col-md-6 mr-auto">
            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Valider">
        </div>
    </div>
</form>
</body>
</html>
