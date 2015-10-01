<?php


class CartModel extends BaseModel
{
    public function find($id) {
        $statement = self::$db->prepare("SELECT * FROM Products WHERE Id = ? LIMIT 1");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result();
    }

    public function checkout($serialized_cart, $user_id) {

        $statement = self::$db->prepare(
            "INSERT INTO users_carts VALUES (null, ?, ?)");
        $statement->bind_param("si", $serialized_cart, $user_id);
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