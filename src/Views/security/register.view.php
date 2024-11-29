<?php
require_once(__DIR__ . "/../partials/header.php");
?>
<h1>Inscription</h1>
<form method='POST'>
    <div>
        <label for="username">Nom utilisateur</label>
        <input type="text" name='username'>
        <?php if (isset($this->arrayError['username'])) {
        ?>
            <p class='text-danger'><?= $this->arrayError['username'] ?></p>
        <?php
        } ?>
    </div>
    <div>
        <label for="email">E-mail</label>
        <input type="email" name='email'>
        <?php if (isset($this->arrayError['email'])) {
        ?>
            <p class='text-danger'><?= $this->arrayError['email'] ?></p>
        <?php
        } ?>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name='password'>
        <?php if (isset($this->arrayError['password'])) {
        ?>
            <p class='text-danger'><?= $this->arrayError['password'] ?></p>
        <?php
        } ?>
    </div>
    

    <button type="submit">Inscription</button>
</form>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>