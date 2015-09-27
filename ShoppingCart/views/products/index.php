<h1>List of Products</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach ($this->products as $product) : ?>
        <tr>
            <td><?= htmlspecialchars($product['Id']) ?></td>
            <td><?= htmlspecialchars($product['ProductName']) ?></td>
            <td><?= htmlspecialchars($product['Quantity']) ?></td>
            <td><?= htmlspecialchars($product['Price']) ?></td>
            <td><a href="/products/edit/<?=$product['Id'] ?>">[Edit]</td>
            <td><a href="/products/delete/<?=$product['Id'] ?>">[Delete]</td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/products/create">[Create New Product]</a>
