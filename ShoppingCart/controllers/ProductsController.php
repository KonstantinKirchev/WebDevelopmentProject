<?php


class ProductsController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->title = 'Products page';
        $this->db = new ProductsModel();
    }

    public function index()
    {
        $this->authorize();

        $this->products = $this->db->getAll();
    }

    public function create()
    {
        if ($this->isPost()) {
            $productName = $_POST['productName'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category = $_POST['categoryId'];
            if ($this->db->create($productName, $quantity, $price, $category)) {
                $this->addInfoMessage("Product created.");
                $this->redirect("products");
            } else {
                $this->addErrorMessage("Cannot create product.");
            }
        }
    }

    public function edit($id)
    {
        if ($this->isPost()) {

            $productName = $_POST['productName'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category = $_POST['categoryId'];
            if ($this->db->edit($id, $productName, $quantity, $price, $category)) {
                $this->addInfoMessage("Product edited.");
                $this->redirectToUrl("/products");
            } else {
                $this->addErrorMessage("Cannot edit product.");
            }
        }

        $this->product = $this->db->find($id);
        if (!$this->product) {
            $this->addErrorMessage("Invalid product.");
            $this->redirect("products");
        }
    }

    public function delete($id)
    {
        if($this->products = $this->db->delete($id)){
            $this->addInfoMessage("Product deleted.");
            $this->redirectToUrl("/products");
        }else{
            $this->addErrorMessage("Cannot delete product.");
        }


    }
}