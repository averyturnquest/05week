<?php include 'header.php'; ?>

<?php if ($categories) { ?>
<section id="list" class="list">
    <header class="list_row list_header">
        <h1>
            Category List
        </h1>
    </header>
    <?php foreach ($categories as $category) : ?>
        <div class="list_row">
            <div class="list_items">
                <p class="bold"><?= $category['categoryName'] ?></p>
            </div>
            <div class="list_removeItem">
                <form action="." method="POST">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id" value="<? $category['categoryID'] ?>">
                    <button class="remove-button">❌</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
    <?php } else { ?>
        <p>No categories exist yet.</p>
    <?php } ?>

    <section id="add" class="add">
        <h2>Add Category</h2>
        <form action="." method="POST" id="add_form" class="add_form">
            <input type="hidden" name="action" value="add_category">
            <div class="add_inputs">
                <label>Name:</label>
                <input type="text" name="category_name" maxlength="20" placeholder="Name" autofocus required>
            </div>
            <div class="add_addItem">
                <button class="add-button bold">Add</button>
            </div>
        </form>
    </section>

    <br>
    <p><a href=".">View &amp; Add Items</a></p>


<?php include 'footer.php'; ?>