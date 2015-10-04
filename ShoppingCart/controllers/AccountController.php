<?php

class AccountController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->title = 'Account page';
        $this->db = new AccountModel();
    }

    public function register()
    {
        if($this->isPost()){
            $username = $_POST['username'];

            if($username == null || strlen($username) < 3){
                $this->addErrorMessage("Invalid username!");
                $this->redirect("account", "register");
            }
            $password = $_POST['password'];

            if($password == null || strlen($password) < 3){
                $this->addErrorMessage("Invalid password!");
                $this->redirect("account", "register");
            }

            $confirmPassword = $_POST['confirm'];

            if($confirmPassword == null || $confirmPassword != $password){
                $this->addErrorMessage("Invalid password confirmation!");
                $this->redirect("account", "register");
            }

            $isRegistered = $this->db->register($username, $password);

            if($isRegistered){
                $this->redirect("account", "login");
            }else{
                $this->addErrorMessage("Register failed!");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function login()
    {
        if($this->isPost()){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username == null){
                $this->addErrorMessage("Please, don't leave the Username and Password fields empty!");
                $this->redirect("account", "login");
            }

            if($username == null){
                $this->addErrorMessage("Please, don't leave the Username field empty!");
                $this->redirect("account", "login");
            }

            if($password == null){
                $this->addErrorMessage("Please, don't leave the Password field empty!");
                $this->redirect("account", "login");
            }

            $isLoggedIn = $this->db->login($username,$password);
            $_SESSION['isLoggedIn'] = $isLoggedIn;

            if($isLoggedIn){
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Welcome $username. Your balance is: {$_SESSION['Balance']} CAD");
                $this->redirectToUrl("/");

            }else if($_SESSION['is_ban']){
                $this->addErrorMessage("You are baned! Sorry!");
                $this->redirect("account", "login");
            } else{
                $this->addErrorMessage("Invalid username or password. Please try again!");
                $this->redirect("account", "login");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout()
    {
        session_destroy();
        $this->addInfoMessage("You are successfully logout!");
        $this->redirectToUrl("/");
    }
}