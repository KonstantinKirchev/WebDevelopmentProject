<h1>List of Products</h1>
<table>
    <tr>
        <?php if(isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1){?>
        <th>ID</th>
        <?php }?>
        <th>Name</th>
        <th>Quantity</th>
        <?php if($_SESSION['Balance'] >= 1000 ){?>
            <th>Price (Promotion!!!)</th>
        <?php }else{?>
            <th>Price</th>
        <?php }?>
        <th colspan="3">Action</th>
    </tr>
    <?php foreach ($this->products as $product) : ?>
        <tr>
            <?php if(isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1){?>
            <td><?= htmlspecialchars($product['Id']) ?></td>
            <?php }?>
            <td><?= htmlspecialchars($product['ProductName']) ?></td>
            <td><?= htmlspecialchars($product['Quantity']) ?></td>
            <?php if($_SESSION['Balance'] >= 1000 ){?>
                <td><strike>$<?= htmlspecialchars($product['Price']) ?></strike> $<?= htmlspecialchars($product['Price'] * 0.8) ?></td>
            <?php }else{?>
                <td>$<?= htmlspecialchars($product['Price']) ?></td>
            <?php }?>
            <?php if(isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1){?>
            <td><a href="/products/edit/<?=$product['Id'] ?>">[Edit]</td>
            <td><a href="/products/delete/<?=$product['Id'] ?>">[Delete]</td>
            <?php }?>
            <td>
                <form id="form1" name="form1" method="post" action="/cart">
                    <input type="hidden" name="pid" id="pid" value="<?= $product['Id'] ?>"/>
                    <input type="submit" name="button" id="button" value="Add to Shopping Cart">
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<?php if(isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1){?>
<a href="/products/create">[Create New Product]</a>
<?php }?>