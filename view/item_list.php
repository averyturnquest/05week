<?php include 'header.php'; ?>
<main>



<aside>
    <h2>Categories</h2>
    <nav>
    <select id="select" name="select">
    <?php foreach ($categories as $category) : ?> <option>
    <a href="?category_id=<?php echo $category['categoryID']; ?>"> <?php echo $category['categoryName']; ?>
    </a> </option>
    <?php endforeach; ?> 
    </select>
</nav>
</aside> 
<?php
 

   foreach($todoItems as $item): ?>
    <div>
        <h3><?php echo $item['Title'] ?></h3>
        <h3><?php echo $item['Description'] ?></h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" id="itemNum" name="itemNum" value="<?php echo $item['ItemNum'] ?>">
        <button type="submit">Remove</button>
   </form>

    </div>
    <?php endforeach; ?>

    <section>
        <h2>Add Item</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for='title'>Title</label>
            <input type="text" id="title" name="title" required>
            <label for='description'>Description</label>
            <input type="text" id="description" name="description" required>
            <button type="submit" name="add_item" value="add_item">Add Item</button>
</form>
<p><a href="index.php?action=add_item">Click here</a> to add a new item to the list.</p>
</section>

    <section>
        <h2>Add Category</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for='category'>Category</label>
            <input type="text" id="category" name="category" required>
            <button type="submit" name="addCategory" value="addCategory">Add Category</button>
    </section>

</main>
<?php include 'footer.php'; ?>