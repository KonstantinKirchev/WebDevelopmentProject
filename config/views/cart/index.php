
    <?php

    $cartOutput = "";

    if (!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1) {
        echo "<h2 align='center'>Your shopping cart is empty</h2>";
    } else {?>

        <h1>List of Products</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>TotalPrice</th>
            <th colspan="3">Action</th>
        </tr>
        <?php
        $index = 0;
        $total = 0;

        foreach ($_SESSION['cart_array'] as $each_item) {

            $item_id = $each_item['item_id'];
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $mysqli->set_charset("utf8");
            $statement = $mysqli->prepare("SELECT * FROM Products WHERE Id = ? LIMIT 1");
            $statement->bind_param("i", $item_id);
            $statement->execute();
            $result = $statement->get_result();
            $productName = "";
            $price = 0;

            while ($row = mysqli_fetch_array($result)) {
                $productName = $row['ProductName'];
                $price = $row['Price'];
                $_SESSION['quantity'] = $row['Quantity'];
            }

            $totalPrice = $price * $each_item['quantity'];
            $total += $totalPrice;

            setlocale(LC_MONETARY, 'en_US');
            $totalPrice = number_format($totalPrice, 2);
            ?>
            <tr>
                <td><?= $productName ?></td>
                <td>maxQuantity: <?= $_SESSION['quantity'] ?>
                    <form action="cart" method="post">
                        <input type="text" name="quantity" value="<?= $each_item['quantity']?>" size="1">
                        <input type="hidden" name="item_to_adjust" value="<?= $item_id?>">
                        <input type="submit" name="adjustBtn<?= $item_id?>" value="Change">
                        <?php $_SESSION['quantityToSubtract'] = 0; $_SESSION['quantityToSubtract'] = $each_item['quantity'] + 0; ?>
                    </form>
                </td>
                <td>$<?php echo $price; var_dump($_SESSION['quantityToSubtract']); ?></td>
                <td>$<?= $totalPrice ?></td>
                <td>
                    <form action="cart" method="post">
                        <input type="hidden" name="index_to_remove" value="<?= $index?>">
                        <input type="submit" name="deleteBtn<?= $item_id?>" value="Remove">
                    </form>
                </td>
            </tr>
        <?php $index++;
        }
        setlocale(LC_MONETARY, 'en_US');
        $total = number_format($total, 2);
        ?>
    </table>
        <h2>Cart total: $<?= $total?> CAD</h2>
        <form action="/cart/checkout"><input type="submit" value="Check Out"></form>
        <a href="cart?cmd=emptyCart">Empty Your Shopping Cart</a>
        <?php
    } ?>


