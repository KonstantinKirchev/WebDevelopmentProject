<h1>Edit Existing Category</h1>

<?php if ($this->category) { ?>
    <form method="post" action="/categories/edit/<?= $this->category['Id'] ?>">
        Category name:
        <input type="text" name="categoryName"
               value="<?= htmlspecialchars($this->category['CategoryName']) ?>" />
        <br/>
        <input type="submit" value="Edit" />
        <a href="/categories">Cancel</a>
    </form>
<?php } ?>