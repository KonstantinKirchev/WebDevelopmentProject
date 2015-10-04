<?php /** @var Models\ViewModels\UserViewModel */
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>

<h1>Login Form</h1>
<br/>
<section class="bg-3">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?=
            \Framework\ViewHelpers\FormViewHelper::init()
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
                ->initSubmit()
                ->setValue("Login")
                ->create()
                ->render();
            ?>
        </div>
    </div>
</section>
<br/>


