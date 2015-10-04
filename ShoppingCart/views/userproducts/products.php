<?php

$cart = unserialize($this->products["cart_contents"]);
$_SESSION['cart'] = $cart;
?>
<h1>List of Products</h1>
<table>
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($_SESSION['cart'] as $product) :

        $item_id = $product['item_id'];
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $mysqli->set_charset("utf8");
        $statement = $mysqli->prepare("SELECT * FROM Products WHERE Id = ? LIMIT 1");
        $statement->bind_param("i", $item_id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $_SESSION['productPrice'] = number_format(($result['Price'] * 1.20), 2);
        $_SESSION['productQuantity'] = $product['quantity'];
        $_SESSION['is_user_product'] = true;
        ?>
        <tr>
            <td><?= htmlspecialchars($result['ProductName']) ?></td>
            <td><?= htmlspecialchars($_SESSION['productQuantity']) ?></td>
            <td>$<?= htmlspecialchars($_SESSION['productPrice']) ?></td>
            <td>
                <form id="form1" name="form1" method="post" action="/carts">
                    <input type="hidden" name="pid" id="pid" value="<?= $result['Id'] ?>"/>
                    <input type="image" value="submit" src="../../../content/images/addtocart.jpg" alt="submit Button">
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</table>


