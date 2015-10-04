<?php


class CartsModel extends BaseModel
{
    public function find($id) {
        $statement = self::$db->prepare("SELECT * FROM Products WHERE Id = ? LIMIT 1");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result();
    }

    public function checkout($serialized_cart, $user_id) {
        $adminBalance = self::$db->prepare(
            "UPDATE Users SET Balance = Balance + ? WHERE is_admin = 1");
        $adminBalance->bind_param("d", $_SESSION['total']);
        $adminBalance->execute();

        $updateBalance = self::$db->prepare(
            "UPDATE Users SET Balance = Balance - ? WHERE Id = ?");
        $updateBalance->bind_param("di", $_SESSION['total'], $_SESSION['userId']);
        $updateBalance->execute();

        foreach ($_SESSION['cart_array'] as $key => $value) {
            $statement = self::$db->prepare(
                "UPDATE Products SET Quantity = Quantity - ? WHERE Id = ?");
            $statement->bind_param("ii", $value['quantity'], $value['item_id']);
            $statement->execute();
        }

        $statement = self::$db->prepare(
            "INSERT INTO users_carts VALUES (null, ?, ?, ?)");
        $statement->bind_param("sdi", $serialized_cart, $_SESSION['total'], $user_id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function getAllFromUser($id) {
        $statement = self::$db->prepare("SELECT * FROM users_carts WHERE user_id = ? ORDER BY id");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllFromCart($id) {
        $statement = self::$db->prepare("SELECT cart_contents FROM users_carts WHERE id = ? LIMIT 1");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
}