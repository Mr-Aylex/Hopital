<?php
?>
<html>
<form action="../back/mdp_oublie_backend.php" method="post">
    <input type="hidden" value="<?php echo $_GET['mail'] ?>" name="mail">
    <div>
        <label for="">
            <input type="text" name="mdp" placeholder="Nouveau mot de passe">
        </label>
    </div>
    <div>
        <label for="">
            <input type="text" name="mdp_2" placeholder="Confirmation du mot de passe">
        </label>
    </div>
    <input type="submit">
</form>
</html>