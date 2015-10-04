<h1>Create New Category</h1>

<?php /** @var Models\ViewModels\UserViewModel */
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>

<section class="bg-3">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?=
            \Framework\ViewHelpers\FormViewHelper::init()
                ->setAction("/categories/create")
                ->setMethod("post")
                ->initTextField()
                ->setName("CategoryName")
                ->setAttribute("placeholder", "Category Name")
                ->create()
                ->initSubmit()
                ->setValue("Create")
                ->create()
                ->render();
            ?>
            <a href="/categories">Cancel</a>
        </div>
    </div>
</section>
<br/>

