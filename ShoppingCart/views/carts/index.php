<?php

$cartOutput = "";

if (!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1) {
    echo "<h2 align='center'>Your shopping cart is empty</h2>";
} else { ?>

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
        unset($_SESSION['is_user_product']);

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

                if($_SESSION['Balance'] >= 1000 && !isset($_COOKIE['timePromotion'])){
                    $price *= 0.8;
                }
                if(isset($_COOKIE['timePromotion'])){
                    $price *= 0.5;
                }

                $price = number_format($price, 2);

                $_SESSION['quantity'] = $row['Quantity'];
            }
            if(isset($_SESSION['is_user_product'])) {
                $totalPrice = $_SESSION['productPrice'] * $each_item['quantity'];
            }else{
                $totalPrice = $price * $each_item['quantity'];
            }
            $total += $totalPrice;

            $totalPrice = number_format($totalPrice, 2);
            ?>
            <tr>
                <td><?= $productName ?></td>
                <?php if(isset($_SESSION['is_user_product'])){ ?>
                <td>maxQuantity: <?= $_SESSION['productQuantity'] ?>
                <?php }else{ ?>
                <td>maxQuantity: <?= $_SESSION['quantity'] ?>
                    <?php } ?>
                    <form action="carts" method="post">
                        <input type="text" name="quantity" value="<?= $each_item['quantity'] ?>" size="1">
                        <input type="hidden" name="item_to_adjust" value="<?= $item_id ?>">
                        <input type="submit" name="adjustBtn<?= $item_id ?>" value="Change">
                    </form>
                </td>
                <?php if(isset($_SESSION['is_user_product'])){ ?>
                <td>$<?= $_SESSION['productPrice'] ?></td>
                <?php }else{ ?>
                <td>$<?= $price ?></td>
                <?php } ?>
                <td>$<?= $totalPrice ?></td>
                <td>
                    <form action="carts" method="post">
                        <input type="hidden" name="index_to_remove" value="<?= $index ?>">
                        <input type="submit" name="deleteBtn<?= $item_id ?>" value="Remove">
                    </form>
                </td>
            </tr>
            <?php $index++;
        }
        $total = number_format($total, 2);
        $_SESSION['total'] = $total;
        ?>
    </table>
    <h2>Cart total: $<?= $total ?> CAD</h2>
    <form action="/carts/checkout" method="post"><input type="submit"  name="checkout" value="CheckOut"></form>
    <a href="carts?cmd=emptyCart">Empty Your Shopping Cart</a>
    <?php
} ?>


