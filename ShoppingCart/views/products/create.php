<?php /** @var Models\ViewModels\UserViewModel */
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>

<h1>Create New Product</h1>
<section class="bg-3">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?=
            \Framework\ViewHelpers\FormViewHelper::init()
                ->setAction("/products/create")
                ->setMethod("post")
                ->initTextField()
                ->setName("productName")
                ->setAttribute("placeholder", "Product Name")
                ->create()
                ->initTextField()
                ->setName("quantity")
                ->setAttribute("placeholder", "Quantity")
                ->create()
                ->initTextField()
                ->setName("price")
                ->setAttribute("placeholder", "Price")
                ->create()
                ->initTextField()
                ->setName("categoryId")
                ->setAttribute("placeholder", "Category Id")
                ->create()
                ->initSubmit()
                ->setValue("Create")
                ->create()
                ->render();
            ?>
            <a href="/products">Cancel</a>
        </div>
    </div>
</section>
<br/>

