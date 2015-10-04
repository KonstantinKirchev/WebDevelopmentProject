<?php

$cart = unserialize($this->products["cart_contents"]);
$_SESSION['cart'] = $cart;
?>
<h1>Order List</h1>
<table>
    <tr>
        <th>ProductID</th>
        <th>Quantity</th>
    </tr>
    <?php foreach ($_SESSION['cart'] as $product) : ?>
    <tr>
        <td><?= htmlspecialchars($product['item_id']) ?></td>
        <td><?= htmlspecialchars($product['quantity']) ?></td>
    </tr>
<?php endforeach ?>
</table>


