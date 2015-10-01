<?php


class UsersModel extends BaseModel
{
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM Users ORDER BY Id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare("SELECT * FROM Users WHERE Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM Users WHERE Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $userName, $password, $balance, $is_admin, $is_editor) {
        if ($userName == '' && $password == '' && $balance == '' && $is_admin == '' && $is_editor == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE Users SET Username = ?, Password = ?, Balance = ?, is_admin = ?, is_editor = ? WHERE Id = ?");
        $statement->bind_param("ssdiii", $userName, $password, $balance, $is_admin, $is_editor, $id);
        $statement->execute();
        return $statement->errno == 0;
    }
}