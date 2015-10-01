<?php


class CategoriesController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->title = 'Categories page';
        $this->db = new CategoriesModel();
    }

    public function index()
    {
        $this->authorize();
        $this->categories = $this->db->getAll();
    }

    public function view($id)
    {
        $this->products = $this->db->getAllFromCategory($id);
    }

    public function create()
    {
        if ($this->isPost()) {
            $categoryName = $_POST['CategoryName'];
            if ($this->db->create($categoryName)) {
                $this->addInfoMessage("Category created.");
                $this->redirect("categories");
            } else {
                $this->addErrorMessage("Cannot create category.");
            }
        }
    }

    public function delete($id)
    {
        if($this->categories = $this->db->delete($id)){
            $this->addInfoMessage("Category deleted.");
            $this->redirect("categories");
        }else{
            $this->addErrorMessage("Cannot delete category.");
        }


    }

    public function edit($id) {
        if ($this->isPost()) {
            // Edit the category in the database
            $categoryName = $_POST['categoryName'];
            if ($this->db->edit($id, $categoryName)) {
                $this->addInfoMessage("Category edited.");
                $this->redirect("categories");
            } else {
                $this->addErrorMessage("Cannot edit category.");
            }
        }

        // Display edit author form
        $this->category = $this->db->find($id);
        if (!$this->category) {
            $this->addErrorMessage("Invalid category.");
            $this->redirect("categories");
        }
    }
}