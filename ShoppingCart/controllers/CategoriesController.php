<?php


class CategoriesController extends BaseController
{
    private $categoriesModel;
    private $productsModel;

    public function onInit()
    {
        $this->title = 'Categories page';
        $this->categoriesModel = new CategoriesModel();
        $this->productsModel = new ProductsModel();
    }

    public function index()
    {
        $this->categories = $this->categoriesModel->getAll();
    }

    public function categoryId($id)
    {
        $this->products = $this->productsModels->getAllFromCategory($id);
    }

    public function create()
    {
        if ($this->isPost()) {
            $categoryName = $_POST['CategoryName'];
            if ($this->categoriesModel->create($categoryName)) {
                $this->addCreateMessage("Category created.");
                $this->redirect("categories");
            } else {
                $this->addErrorMessage("Cannot create category.");
            }
        }
    }

    public function delete($id)
    {
        if($this->categories = $this->categoriesModel->delete($id)){
            $this->addDeleteMessage("Category deleted.");
            $this->redirect("categories");
        }else{
            $this->addErrorMessage("Cannot delete category.");
        }


    }

    public function edit($id) {
        if ($this->isPost()) {
            // Edit the category in the database
            $categoryName = $_POST['categoryName'];
            if ($this->categoriesModel->edit($id, $categoryName)) {
                $this->addInfoMessage("Category edited.");
                $this->redirect("categories");
            } else {
                $this->addErrorMessage("Cannot edit category.");
            }
        }

        // Display edit author form
        $this->category = $this->categoriesModel->find($id);
        if (!$this->category) {
            $this->addErrorMessage("Invalid category.");
            $this->redirect("categories");
        }
    }
}