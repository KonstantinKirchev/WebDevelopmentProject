<?php
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>
<h1>Register Form</h1>

<section class="bg-1">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">

            <?=
            Framework\ViewHelpers\FormViewHelper::init()
                ->setAction("")
                ->setMethod("post")
                ->initTextField()
                ->setName("username")
                ->setAttribute("placeholder", "Username")
                ->create()
                ->initPasswordField()
                ->setName("password")
                ->setAttribute("placeholder", "Password")
                ->create()
                ->initPasswordField()
                ->setName("confirm")
                ->setAttribute("placeholder", "Confirm Password")
                ->create()
                ->initSubmit()
                ->setValue("Register")
                ->create()
                ->render();
            ?>
        </div>
    </div>
</section>