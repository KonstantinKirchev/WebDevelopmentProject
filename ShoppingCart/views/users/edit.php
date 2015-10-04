<h1>Edit Existing User</h1>

<?php if ($this->user) { ?>
    <form method="post" action="/users/edit/<?= $this->user['Id'] ?>">
        User name:
        <input type="text" name="userName"
               value="<?= htmlspecialchars($this->user['Username']) ?>" />
        <br/>
        Password:
        <input type="text" name="password"
               value="<?= htmlspecialchars($this->user['Password']) ?>" />
        <br/>
        Balance:
        <input type="text" name="balance"
               value="<?= htmlspecialchars($this->user['Balance']) ?>" />
        <br/>
        Is Admin:
        <input type="text" name="is_admin"
               value="<?= htmlspecialchars($this->user['is_admin']) ?>" />
        <br/>
        Is Editor:
        <input type="text" name="is_editor"
               value="<?= htmlspecialchars($this->user['is_editor']) ?>" />
        <br/>
        Is Ban:
        <input type="text" name="is_ban"
               value="<?= htmlspecialchars($this->user['is_ban']) ?>" />
        <br/>
        <input type="submit" value="Edit" />
        <a href="/users">Cancel</a>
    </form>
<?php } ?>