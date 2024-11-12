<h2>Modifier le produit</h2>
<form method="POST" action="/products/edit/<?= $product['id'] ?>">
    <label>Nom du produit :</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

    <label>Description :</label>
    <textarea name="description" required><?= htmlspecialchars($product['description']) ?></textarea>

    <label>Prix :</label>
    <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" step="0.01" required>

    <button type="submit">Mettre à jour</button>
</form>