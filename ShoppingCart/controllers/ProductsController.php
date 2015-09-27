<?php


class ProductsController extends BaseController
{
    private $productsModel;

    public function onInit()
    {
        $this->title = 'Products page';
        $this->productsModel = new ProductsModel();
    }

    public function index()
    {
//        $this->products = array(
//            array('id' => 10, 'name' => 'Tomatoes', 'quantity' => '100', 'price' => 2.55 ),
//            array('id' => 20, 'name' => 'Cucumbers', 'quantity' => '120', 'price' => 3.55 ),
//            array('id' => 30, 'name' => 'Peppers', 'quantity' => '160', 'price' => 2.30 ),
//            array('id' => 40, 'name' => 'Potatoes', 'quantity' => '200', 'price' => 1.75 ),
//        );
        $this->products = $this->productsModel->getAll();
    }

    public function create()
    {
        if ($this->isPost()) {
            $productName = $_POST['productName'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category = $_POST['categoryId'];
            if ($this->productsModel->create($productName, $quantity, $price, $category)) {
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
            // Edit the product in the database
            $productName = $_POST['productName'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category = $_POST['categoryId'];
            if ($this->productsModel->edit($id, $productName, $quantity, $price, $category)) {
                $this->addInfoMessage("Product edited.");
                $this->redirect("products");
            } else {
                $this->addErrorMessage("Cannot edit product.");
            }
        }

        // Display edit product form
        $this->product = $this->productsModel->find($id);
        if (!$this->product) {
            $this->addErrorMessage("Invalid product.");
            $this->redirect("products");
        }
    }

    public function delete($id)
    {
        if($this->products = $this->productsModel->delete($id)){
            $this->addInfoMessage("Product deleted.");
            $this->redirect("products");
        }else{
            $this->addErrorMessage("Cannot delete product.");
        }


    }
}