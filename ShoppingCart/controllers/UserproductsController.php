<?php


class UserProductsController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->title = 'UserProducts page';
        $this->db = new UserProductsModel();
    }

    public function index()
    {
        $this->authorize();
        $this->users = $this->db->getAll();
    }

    public function user($id)
    {
        $this->carts = $this->db->getAllFromUser($id);
    }

    public function products($id)
    {
        $this->products = $this->db->getAllFromCart($id);
    }

}