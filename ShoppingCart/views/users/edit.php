<?php
include "Framework/ViewHelpers/FormViewHelper.php";
include "Framework/ViewHelpers/Elements/Element.php";
include "Framework/ViewHelpers/Elements/TextField.php";
include "Framework/ViewHelpers/Elements/PasswordField.php";
include "Framework/ViewHelpers/Elements/Submit.php";?>

<h1>Edit Existing User</h1>

<?php if ($this->user) { ?>
    <section class="bg-3">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?=
                \Framework\ViewHelpers\FormViewHelper::init()
                    ->setAction("/users/edit/" . $this->user['Id'])
                    ->setMethod("post")
                    ->initTextField()
                    ->setName("userName")
                    ->setAttribute("value", htmlspecialchars($this->user['Username']))
                    ->create()
                    ->initTextField()
                    ->setName("password")
                    ->setAttribute("value", htmlspecialchars($this->user['Password']))
                    ->create()
                    ->initTextField()
                    ->setName("balance")
                    ->setAttribute("value", htmlspecialchars($this->user['Balance']))
                    ->create()
                    ->initTextField()
                    ->setName("is_admin")
                    ->setAttribute("value", htmlspecialchars($this->user['is_admin']))
                    ->create()
                    ->initTextField()
                    ->setName("is_editor")
                    ->setAttribute("value", htmlspecialchars($this->user['is_editor']))
                    ->create()
                    ->initTextField()
                    ->setName("is_ban")
                    ->setAttribute("value", htmlspecialchars($this->user['is_ban']))
                    ->create()
                    ->initSubmit()
                    ->setValue("Edit")
                    ->create()
                    ->render();
                ?>
                <a href="/users">Cancel</a>
            </div>
        </div>
    </section>
    <br/>
<?php } ?>
