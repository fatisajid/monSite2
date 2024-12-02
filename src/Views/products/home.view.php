<?php

use App\Models\Product;

require_once(__DIR__ . '/../partials/header.php');

?>

<header class="hero">

    <h1>Bienvenue dans notre boutique de sacs</h1>
    <p>Trouvez le sac parfait pour chaque occasion</p>
    <a href="#categories" class="btn-cta">Voir nos catégories</a>
</header>
<section class="container">
    <div class="card" style="width: 18rem;">
        <img src="/public/img/sac a main.jpg" class="card-img-top" alt="photo de sac à main">
        <div class="card-body">
            <h5 class="card-title">Sac à main</h5>
            <p class="card-text">les meilleur sac à main</p>
            <a href="/allProducts?category=sacamain" class="btn btn-primary">Voir plus</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="/public/img/sac a dos.jpg" class="card-img-top" alt="photo de sac à dos">
        <div class="card-body">
            <h5 class="card-title">Sac à dos</h5>
            <p class="card-text">les meilleur sac à dos</p>
            <a href="/allProducts?category=sacados" class="btn btn-primary">Voir plus</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="/public/img/pouchette.jpg" class="card-img-top" alt="phodo des pouchette">
        <div class="card-body">
            <h5 class="card-title">Pochette</h5>
            <p class="card-text">les meilleur pochette</p>
            <a href="/allProducts?category=pochettes" class="btn btn-primary">Voir plus</a>
        </div>
    </div>
</section>


<?php
include_once(__DIR__ . '/../partials/footer.php');
?>