<?php


class AccountModel extends BaseModel
{
    public function register($username, $password)
    {
        $statement = self::$db->prepare(
            "SELECT COUNT(Id) FROM Users WHERE Username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if($result['COUNT(Id)']){
            return false;
        }

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $registerStatement = self::$db->prepare("INSERT INTO Users (Username, Password) VALUES (?, ?)");
        $registerStatement->bind_param("ss", $username, $hash_password);
        $registerStatement->execute();
        return true;
    }

    public function login($username, $password)
    {
        $statement = self::$db->prepare("SELECT Id, Username, Password, Balance, is_admin, is_editor FROM Users WHERE Username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $_SESSION['is_admin'] = $result['is_admin'];
        $_SESSION['is_editor'] = $result['is_editor'];
        $_SESSION['Balance'] = $result['Balance'];
        $_SESSION['userId'] = $result['Id'];

        $correctPassword = password_verify($password, $result['Password']);

        if($correctPassword) {
            return true;
        }
        return false;
    }
}