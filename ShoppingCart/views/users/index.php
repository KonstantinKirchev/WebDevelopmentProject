<h1>List of Users</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
<!--        <th>Password</th>-->
        <th>Balance</th>
        <th colspan="4">Action</th>
    </tr>
    <?php foreach ($this->users as $user) : ?>
        <tr>
            <td><?= htmlspecialchars($user['Id']) ?></td>
            <td><?= htmlspecialchars($user['Username']) ?></td>
<!--            <td>--><?//= htmlspecialchars($user['Password']) ?><!--</td>-->
            <td><?= htmlspecialchars($user['Balance']) ?></td>
            <td><a href="/users/edit/<?=$user['Id'] ?>">[Edit]</td>
            <td><a href="/users/delete/<?=$user['Id'] ?>">[Delete]</td>
            <td><a href="/carts/view/<?=$user['Id'] ?>">[Cart]</td>
            <td><a href="/userProducts/index/<?=$user['Id'] ?>">[UserProducts]</td>
        </tr>
    <?php endforeach ?>
</table>
