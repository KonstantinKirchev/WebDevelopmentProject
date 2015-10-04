<?php


class CategoriesModel extends BaseModel
{
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM Categories ORDER BY Id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllFromCategory($id) {
        $statement = self::$db->prepare("SELECT * FROM Products WHERE Category_Id = ? ORDER BY Id");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM Categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($categoryName) {
        if ($categoryName == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO Categories VALUES(NULL, ?)");
        $statement->bind_param("s", $categoryName);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM Categories WHERE Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE Categories SET CategoryName = ? WHERE id = ?");
        $statement->bind_param("si", $name, $id);
        $statement->execute();
        return $statement->errno == 0;
    }
}