<h1>List of Products</h1>
<table>
    <tr>
        <?php
        unset($_SESSION['is_user_product']);
        if (isset($_POST['promo'])) {
            setcookie("timePromotion", 0.5, time() + 1000);
        }
        if (isset($_POST['removePromo'])) {
            setcookie("timePromotion", 0.5, time() - 10);
        }
        if (isset($_SESSION['username']) && $_SESSION['is_admin'] == 1 || $_SESSION['is_editor'] == 1) {
            ?>
            <th>ID</th>
        <?php } ?>
        <th>Name</th>
        <th>Quantity</th>
        <?php if ($_SESSION['Balance'] >= 800 || isset($_COOKIE['timePromotion'])) { ?>
            <th>Price (Promotion!!!)</th>
        <?php } else { ?>
            <th>Price</th>
        <?php } ?>
        <th colspan="3">Action</th>
    </tr>
    <?php foreach ($this->products as $product) {

        if ($product['Quantity'] == 0) {
            continue;
        }

        if (isset($_COOKIE['timePromotion'])) {
            $timePromotionPrice = $product['Price'] * $_COOKIE['timePromotion'];
            $timePromotionPrice = number_format($timePromotionPrice, 2);
        }
        $promotionPrice = $product['Price'] * 0.8;
        $promotionPrice = number_format($promotionPrice, 2); ?>

        <tr>
            <?php if (isset($_SESSION['username']) && $_SESSION['is_admin'] == 1 || $_SESSION['is_editor'] == 1) { ?>
                <td><?= htmlspecialchars($product['Id']) ?></td>
            <?php } ?>
            <td><?= htmlspecialchars($product['ProductName']) ?></td>
            <td><?= htmlspecialchars($product['Quantity']) ?></td>
            <?php if ($_SESSION['Balance'] >= 800 && !isset($_COOKIE['timePromotion'])) { ?>
                <td><strike>$<?= htmlspecialchars($product['Price']) ?></strike>
                    $<?= htmlspecialchars($promotionPrice) ?></td>
            <?php } else if (isset($_COOKIE['timePromotion'])) { ?>
                <td><strike>$<?= htmlspecialchars($product['Price']) ?></strike>
                    $<?= htmlspecialchars($timePromotionPrice) ?></td>
            <?php } else { ?>
                <td><?= htmlspecialchars($product['Price']) ?></td>
            <?php } ?>
            <?php if (isset($_SESSION['username']) && $_SESSION['is_admin'] == 1 || $_SESSION['is_editor'] == 1) { ?>
                <td><a href="/products/edit/<?= $product['Id'] ?>">[Edit]</td>
                <td><a href="/products/delete/<?= $product['Id'] ?>">[Delete]</td>
            <?php } ?>
            <td>
                <form id="form1" name="form1" method="post" action="carts">
                    <input type="hidden" name="pid" id="pid" value="<?= $product['Id'] ?>"/>
                    <input type="image" value="submit" src="../../../content/images/addtocart.jpg" alt="submit Button">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<br/>
<?php if (isset($_SESSION['username']) && $_SESSION['is_editor'] == 1) { ?>
    <form method="post"><input type="submit" name="promo" value="Time Promotion"></form>
<?php } ?>
<br/>
<?php if (isset($_SESSION['username']) && $_SESSION['is_editor'] == 1) { ?>
    <form method="post"><input type="submit" name="removePromo" value="Remove Time Promotion"></form>
<?php } ?>
<?php if (isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1) { ?>
    <br/>
    <div>
        <a href="/products/create">[Add New Product]</a>
    </div>
<?php } ?>