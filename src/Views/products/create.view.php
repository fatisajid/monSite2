<?php
require_once(__DIR__ . '/../partials/header.php');
?>

<h2>Ajouter un produit</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="col-md-4 mx-auto d-block mt-5">
        <div class="mb-3">
            <label for="name">Nom du produit</label>
            <input type="text" name='name'>
            <?php if (isset($this->arrayError['name'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['name'] ?></p>
            <?php
            } ?>
        </div>

        <div>
            <label for="fileToUpload">Image</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Déscription</label>
            <textarea class="form-control" name="description"></textarea>
            <?php if (isset($arrayError['description'])) {
            ?>
                <p class='text-danger'><?= $arrayError['description'] ?></p>
            <?php
            } ?>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categories</label>
            <textarea class="form-control" name="category"></textarea>
            <?php if (isset($arrayError['category'])) {
            ?>
                <p class='text-danger'><?= $arrayError['category'] ?></p>
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



        <button type="submit" class='btn btn-success mt-5 mb-5'>Ajouter un produit</button>
    </div>
</form>

<?php
require_once(__DIR__ . '/../partials/footer.php');
?>