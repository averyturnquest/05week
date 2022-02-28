<?php include 'header.php'; ?>
<main>

<section>
        <h2>Add Item</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for='title'>Title</label>
            <input type="text" id="title" name="title" required>
            <label for='description'>Description</label>
            <input type="text" id="description" name="description" required>
            <button type="submit" name="add_item" value="add_item">Add Item</button>
</form>
</section>

</main>


<?php include 'footer.php'; ?>