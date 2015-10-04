<?php


class UserProductsModel extends BaseModel
{
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM Users ORDER BY Id");
        return $statement->fetch_all(MYSQLI_ASSOC);
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