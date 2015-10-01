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
                $this->addErrorMessage("Invalid username");
                $this->redirect("account", "register");
            }
            $password = $_POST['password'];

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

            $isLoggedIn = $this->db->login($username,$password);

            if(!$isLoggedIn){
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Welcome $username");
                $this->redirectToUrl("/");

            }else{
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