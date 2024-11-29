<?php
require_once(__DIR__ . '/../partials/header.php');
?>
<h2>Connexion</h2>
<form method="POST" action="/login">
    <label>Email :</label>
    <input type="email" name="email" required>
    <?php if (isset($this->arrayError['email'])) {
    ?>
        <p class='text-danger'><?= $this->arrayError['email'] ?></p>
    <?php
    } ?>
    <label for="password">Mot de passe </label>
    <input type="password" name="password" required>
    <?php if (isset($this->arrayError['password'])) {
    ?>
        <p class='text-danger'><?= $this->arrayError['password'] ?></p>
    <?php
    } ?>

    <button type="submit">Se connecter</button>
</form>

<?php
if (isset($error)) {
    echo "<p class='text-danger'>" . $error . "<p>";
}

require_once(__DIR__ . '/../partials/footer.php');
?>