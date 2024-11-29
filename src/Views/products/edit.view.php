<?php
require_once(__DIR__ . '/../partials/header.php');
?>
<h1>Modifier le produit</h1>
<form method="POST" enctype="multipart/form-data">
    <div class="col-md-4 mx-auto d-block mt-5">
        <div class="mb-3">
            <label for="name">Nom du produit</label>
            <input type="text" name='name' value="<?= $products->getName() ?>">
            <?php if (isset($this->arrayError['name'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['name'] ?></p>
            <?php
            } ?>
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" value="<?= $products->getImage() ?>">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Déscription</label>
            <textarea class="form-control" name="description"><?= $products->getDescription() ?></textarea>
            <?php if (isset($arrayError['description'])) {
            ?>
                <p class='text-danger'><?= $arrayError['description'] ?></p>
            <?php
            } ?>
        </div>
        <div class="mb-3">
            <label for="price">Prix</label>
            <input type="number" name='price'>
            <?php if (isset($this->arrayError['price'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['price'] ?></p>
            <?php
            } ?>
        </div>


        <button type="submit" class='btn btn-warning mt-5 mb-5'>Modifier le produit</button>
    </div>
</form>

<?php
require_once(__DIR__ . '/../partials/footer.php');
?>