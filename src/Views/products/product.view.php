<?php
require_once(__DIR__ . '/../partials/header.php');
?>


<h1><?= $products->getName() ?></h1>
<div class="bgg">
    <p><?= $products->getDescription() ?> </p>

    <p>Prix : <?= $products->getPrice() ?>€</p>
    <p><img src="/public/img/<?= $products->getImage() ?>" alt="sac"></p>


    <!-- <a href="/allProducts">Retour aux produits</a> -->

    <a href="/allProducts?category=<?= $products->getCategory() ?>" class="btn btn-primary">Retour aux produits</a>


</div>

<?php
require_once(__DIR__ . '/../partials/footer.php')
?>