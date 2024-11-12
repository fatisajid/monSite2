<h2>Créer un produit</h2>
<form method="POST" action="/products/create">
    <label>Nom du produit :</label>
    <input type="text" name="name" required>

    <label>Description :</label>
    <textarea name="description" required></textarea>

    <label>Prix :</label>
    <input type="number" name="price" step="0.01" required>

    <button type="submit">Ajouter le produit</button>
</form>