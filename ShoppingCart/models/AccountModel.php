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
        $statement = self::$db->prepare("SELECT Id, Username, Password, Balance, is_admin, is_editor, is_ban FROM Users WHERE Username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $_SESSION['is_admin'] = $result['is_admin'];
        $_SESSION['is_editor'] = $result['is_editor'];
        $_SESSION['Balance'] = $result['Balance'];
        $_SESSION['userId'] = $result['Id'];
        $_SESSION['is_ban'] = $result['is_ban'];
        $hashPassword = $result['Password'];
        $_SESSION['hashPass'] = $hashPassword;
        $_SESSION['Pass'] = $password;
        $_SESSION['availableBalance'] = $_SESSION['Balance'];

        $correctPassword = password_verify($password, $hashPassword);

        if($_SESSION['is_ban'] == 1){
            return false;
        }
        if($correctPassword) {
            return true;
        }else{
            return false;
        }
    }
}