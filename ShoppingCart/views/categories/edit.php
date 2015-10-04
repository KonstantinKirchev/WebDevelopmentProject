<?php
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>
<h1>Edit Existing Category</h1>

<?php if ($this->category) { ?>
    <section class="bg-3">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?=
                \Framework\ViewHelpers\FormViewHelper::init()
                    ->setAction("/categories/edit/" . $this->category['Id'])
                    ->setMethod("post")
                    ->initTextField()
                    ->setName("categoryName")
                    ->setAttribute("value", htmlspecialchars($this->category['CategoryName']))
                    ->create()
                    ->initSubmit()
                    ->setValue("Edit")
                    ->create()
                    ->render();
                ?>
                <a href="/categories">Cancel</a>
            </div>
        </div>
    </section>
    <br/>
<?php } ?>