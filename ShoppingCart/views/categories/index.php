<h1>List of Categories</h1>
<table>
    <tr>
        <th>ID</th>
        <th>CategoryName</th>
        <th colspan="3">Action</th>
    </tr>
    <?php foreach ($this->categories as $category) : ?>
        <tr>
            <td><?= htmlspecialchars($category['Id']) ?></td>
            <td><?= htmlspecialchars($category['CategoryName']) ?></td>
            <?php if(isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1){?>
            <td><a href="/categories/edit/<?=$category['Id'] ?>">[Edit]</td>
            <td><a href="/categories/delete/<?=$category['Id'] ?>">[Delete]</td>
            <?php }?>
            <td><a href="/categories/view/<?=$category['Id'] ?>">[View]</td>
        </tr>
    <?php endforeach ?>
</table>
<?php if(isset($_SESSION['username']) && $_SESSION['is_editor'] == 1 || $_SESSION['is_admin'] == 1){?>
    <br/>
    <div>
<a href="/categories/create">[Add New Category]</a>
    </div>
<?php }?>