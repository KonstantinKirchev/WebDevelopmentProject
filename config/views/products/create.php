<h1>Create New Product</h1>

<form method="post" action="/products/create">
    Product name: <input type="text" name="productName" />
    <br/>
    Product quantity: <input type="text" name="quantity" />
    <br/>
    Product price: <input type="text" name="price" />
    <br/>
    Category id: <input type="text" name="categoryId" />
    <br/>
    <input type="submit" value="Create">
    <a href="/products">Cancel</a>
</form>
