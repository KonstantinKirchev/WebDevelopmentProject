<?php /** @var Models\ViewModels\UserViewModel */
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>

<h1>Edit Existing Product</h1>
<section class="bg-3">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?=
            \Framework\ViewHelpers\FormViewHelper::init()
                ->setAction("/products/edit/" . $this->product['Id'])
                ->setMethod("post")
                ->initTextField()
                ->setName("productName")
                ->setAttribute("value", htmlspecialchars($this->product['ProductName']))
                ->create()
                ->initTextField()
                ->setName("quantity")
                ->setAttribute("value", htmlspecialchars($this->product['Quantity']))
                ->create()
                ->initTextField()
                ->setName("price")
                ->setAttribute("value", htmlspecialchars($this->product['Price']))
                ->create()
                ->initTextField()
                ->setName("categoryId")
                ->setAttribute("value", htmlspecialchars($this->product['Category_Id']))
                ->create()
                ->initSubmit()
                ->setValue("Edit")
                ->create()
                ->render();
            ?>
            <a href="/products">Cancel</a>
        </div>
    </div>
</section>
<br/>

