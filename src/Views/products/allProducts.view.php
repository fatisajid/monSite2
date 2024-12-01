<?php

use App\Models\Product;

require_once(__DIR__ . '/../partials/header.php');

?>
<header class="hero">

    <h1>Bienvenue dans notre boutique de sacs</h1>
    <p>Trouvez le sac parfait pour chaque occasion</p>
    <a href="#categories" class="btn-cta">Voir nos Sac</a>
</header>

<!-- <main id="categories"> -->


    <?php
    if (isset($products)) {
        foreach ($products as $product) {
            // var_dump($product);

    ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <!-- <section class="category"> -->
                    <h5 class="card-title"><?= $product->getName() ?></h5>
                    <img src="public/img/<?= $product->getImage() ?>" alt="<?= $product->getName() ?>">
                    <p class="card-text"><?= $product->getDescription() ?></p>
                    <p class="card-text"><?= $product->getPrice() ?>€</p>
                    <a href="/product=<?= $product->getId() ?>" class="btn btn-success">Voir plus</a>
                    <a href="/editProduct?id=<?= $product->getId() ?>" class="btn btn-warning">Modifier</a>
                    <form action="/deleteProduct" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $product->getId() ?>">
                        <button type="submit" class="btn btn-danger m-1">Suprimer</button>
                    </form>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <script src="scripts.js"></script>
    </body>

    </html>

    <?php
    include_once(__DIR__ . '/../partials/footer.php');
    ?>