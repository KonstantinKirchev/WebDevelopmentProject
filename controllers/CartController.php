<?php


class CartController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->title = 'Cart page';
        $this->db = new CartModel();
    }

    public function find($id)
    {
        $this->product = $this->db->find($id);
    }

    public function checkout()
    {
        $serialized_cart = serialize($_SESSION["cart_array"]);
        if ($serialized_cart != "") {
            $user_id = $_SESSION['userId'];
            if ($this->db->checkout($serialized_cart, $user_id)) {
                $this->addInfoMessage("Your order is received!");
                $this->redirectToUrl("/");
            } else {
                $this->addErrorMessage("Cannot send your order.");
            }
        }
    }

    public function view($id)
    {
        $this->carts = $this->db->getAllFromUser($id);
    }

    public function cart($id)
    {
        $this->products = $this->db->getAllFromCart($id);
    }
}

if (isset($_POST['pid'])) {
    $productId = $_POST['pid'];
    $wasFound = false;
    $index = 0;
    if (!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1) {
        $_SESSION['cart_array'] = array(0 => array("item_id" => $productId, "quantity" => 1));
    } else {
        foreach ($_SESSION['cart_array'] as $each_item) {
            $index++;
            while (list($key, $value) = each($each_item)) {
                if ($key == "item_id" && $value == $productId) {
                    array_splice($_SESSION['cart_array'], $index - 1, 1, array(array("item_id" => $productId, "quantity" => $each_item['quantity'] + 1)));
                    $wasFound = true;
                }
            }
        }

        if (!$wasFound) {
            array_push($_SESSION['cart_array'], array("item_id" => $productId, "quantity" => 1));
        }
    }
    header("Location: cart");
    die();
}

if ((isset($_GET['cmd']) && $_GET['cmd'] == "emptyCart")) {
    unset($_SESSION['cart_array']);
}

if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {

    $itemToAdjust = $_POST['item_to_adjust'];
    $quantity = $_POST['quantity'];

    if ($quantity > $_SESSION['quantity']) {
        $quantity = 1;
    }

    $quantity = preg_replace('#[0-9]+[^0-9]+[0-9]+#i', 1, $quantity);

    if ($quantity < 1 || $quantity == "") {
        $quantity = 1;
    }

    $index = 0;

    foreach ($_SESSION['cart_array'] as $each_item) {
        $index++;

        while (list($key, $value) = each($each_item)) {

            if ($key == "item_id" && $value == $itemToAdjust) {
                array_splice($_SESSION['cart_array'], $index - 1, 1, array(array("item_id" => $itemToAdjust, "quantity" => $quantity)));
            }
        }
    }
    header("Location: cart");
    die();
}

if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {

    $keyToRemove = $_POST['index_to_remove'];

    if (count($_SESSION['cart_array']) <= 1) {
        unset($_SESSION['cart_array']);
    } else {
        unset($_SESSION['cart_array']["$keyToRemove"]);
        sort($_SESSION['cart_array']);
    }
}