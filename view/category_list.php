<?php include 'header.php'; ?>
<main>


<section>
        <h2>Add Category</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for='category'>Category</label>
            <input type="text" id="category" name="category" required>
            <button type="submit" name="add_category" value="add_category">Add Category</button>
    </section>

</main>
<?php include 'footer.php'; ?>