

    <?php
    if($this->carts == null){
        echo "<h2>This user doesn't have any shopping carts!</h2>";
        return;
    }?>

    <h1>List of Carts</h1>
    <table>
        <tr>
            <th>Cart</th>
            <th>Products</th>
        </tr>
    <?php foreach ($this->carts as $cart) : ?>
        <tr>
            <td><?= htmlspecialchars($cart['id']) ?></td>
            <td><a href="/userProducts/products/<?=$cart['id'] ?>">[Products]</td>
        </tr>
    <?php endforeach ?>
</table>