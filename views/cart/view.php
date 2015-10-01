<?php ?>
<h1>List of Carts</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>UserId</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->carts as $cart) : ?>
        <tr>
            <td><?= htmlspecialchars($cart['id']) ?></td>
            <td><?= htmlspecialchars($cart['cart_contents']) ?></td>
            <td><?= htmlspecialchars($cart['user_id']) ?></td>
            <td><a href="/cart/cart/<?=$cart['id'] ?>">[View]</td>
        </tr>
    <?php endforeach ?>
</table>
