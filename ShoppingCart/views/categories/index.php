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
            <td><a href="/categories/edit/<?=$category['Id'] ?>">[Edit]</td>
            <td><a href="/categories/delete/<?=$category['Id'] ?>">[Delete]</td>
            <td><a href="/categories/view/<?=$category['Id'] ?>">[View]</td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/categories/create">[Create New Category]</a>
