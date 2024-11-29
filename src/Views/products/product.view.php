<?php
require_once(__DIR__ . '/../partials/header.php');
?>

<h1><?= htmlspecialchars($product['name']) ?></h1>
<p>Description : <?= htmlspecialchars($product['description']) ?></p>
<p>Prix : <?= htmlspecialchars($product['price']) ?>€</p>
<a href="/products">Retour aux produits</a>

<h1><?= $products->getName() ?></h1>
<div class="bgg">
    <p>Déscription : <?= $products->getDescription() ?> </p>
    <p>Date de création <?= date_format($created_at, 'd-m-Y à H:i') ?> </p>
    <p>Prix : <?= $products->getPrice() ?></p>
    <p>Image : <?= $products->getImage() ?></p>
    <a href="/products">Retour aux produits</a>

</div>

<?php
require_once(__DIR__ . '/../partials/footer.php')
?>