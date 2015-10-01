<?php

class ProductsModel extends BaseModel
{
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM Products ORDER BY Id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare("SELECT * FROM Products WHERE Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($productName, $quantity, $price, $category ) {
        if ($productName == '' || $quantity == '' || $price == '' || $category == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO Products VALUES(NULL, ?, ?, ?, ?)");
        $statement->bind_param("sidi", $productName, $quantity, $price, $category);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $productName, $quantity, $price, $category) {
        if ($productName == '' && $quantity == '' && $price == '' && $category == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE Products SET ProductName = ?, Quantity = ?, Price = ?, Category_Id = ? WHERE Id = ?");
        $statement->bind_param("sidii", $productName, $quantity, $price, $category, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM Products WHERE Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}