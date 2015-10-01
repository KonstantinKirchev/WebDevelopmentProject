<h1>Edit Existing Product</h1>

<?php if ($this->product) { ?>
    <form method="post" action="/products/edit/<?= $this->product['Id'] ?>">
        Product name:
        <input type="text" name="productName"
               value="<?= htmlspecialchars($this->product['ProductName']) ?>" />
        <br/>
        Product quantity:
        <input type="text" name="quantity"
               value="<?= htmlspecialchars($this->product['Quantity']) ?>" />
        <br/>
        Product price:
        <input type="text" name="price"
               value="<?= htmlspecialchars($this->product['Price']) ?>" />
        <br/>
        Product category:
        <input type="text" name="categoryId"
               value="<?= htmlspecialchars($this->product['Category_Id']) ?>" />
        <br/>
        <input type="submit" value="Edit" />
        <a href="/products">Cancel</a>
    </form>
<?php } ?>
