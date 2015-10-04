<h1>List of Users</h1>
<table>
    <tr>
        <th>Username</th>
        <th>Carts</th>
    </tr>
    <?php foreach ($this->users as $user) : ?>
        <tr>
            <?php if($_SESSION['username'] == $user['Username'] || $user['is_admin'] == 1 || $user['is_editor'] == 1){continue;} ?>
            <td><?= htmlspecialchars($user['Username']) ?></td>
            <td><a href="/userProducts/user/<?=$user['Id'] ?>">[Carts]</td>
        </tr>
    <?php endforeach ?>
</table>