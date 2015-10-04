<?php


class UsersController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->title = 'Users page';
        $this->db = new UsersModel();
    }

    public function index()
    {
        $this->users = $this->db->getAll();
    }

    public function delete($id)
    {
        if($this->users = $this->db->delete($id)){
            $this->addInfoMessage("User deleted.");
            $this->redirect("users");
        }else{
            $this->addErrorMessage("Cannot delete user.");
        }
    }

    public function edit($id)
    {
        if ($this->isPost()) {
            // Edit the product in the database
            $userName = $_POST['userName'];
            $password = $_POST['password'];
            $balance = $_POST['balance'];
            $is_admin = $_POST['is_admin'];
            $is_editor = $_POST['is_editor'];
            $is_ban = $_POST['is_ban'];

            if ($this->db->edit($id, $userName, $password, $balance, $is_admin, $is_editor, $is_ban)) {
                $this->addInfoMessage("User edited.");
                $this->redirect("users");
            } else {
                $this->addErrorMessage("Cannot edit user.");
            }
        }

        // Display edit user form
        $this->user = $this->db->find($id);

        if (!$this->user) {
            $this->addErrorMessage("Invalid user.");
            $this->redirect("users");
        }
    }
}