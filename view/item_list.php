<?php include 'view/header.php'; ?>


<section id="list" class="list">
    <header class="list_row list_header">
        <h1>My To Do List</h1>
        <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_items">
            <select name="category_id" required>
                <option value="0">View All Categories</option>
                <?php foreach ($categories as $category) : ?> 
                    <?php if($category_id == $category['categoryID']) { ?>
                        <option value="<?= $category['categoryID']?>" selected>
                        <?php } else { ?>
                        <option value="<?= $category['categoryID'] ?>">
                        <?php } ?>
                        <?= $category['categoryName'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button class="add-button bold">Submit</button>
            </form>
        </header>
        <?php if($todoItems) { ?>
            <?php foreach ($todoItems as $todoItem) : ?>
                <div class="list_row">
                    <div class="list_item">
                        <p class="bold"><?= $todoItem['categoryName'] ?></p>
                        <p><?=$todoItem['Title'] ?></p>
                        <p class="item_description"><?= $todoItem['Description'] ?></p>
                    </div>
                    <div class="list_removeItem">
                        <form action="." method="POST">
                            <input type="hidden" name="action" value="delete_item">
                            <input type="hidden" name="itemNum" value="<?= $todoItem['ItemNum'] ?>">
                            <button class="remove-button">❌</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php ?>
                <?php } else { ?>
                    <br>
                    <?php if($category_id){ ?>
                        <p>No todo items exist in this category yet. </p>
                        <?php } else { ?>
                            <p>No todo items exist yet.</p>
                        <?php } ?>
                        <br>
                        <?php } ?>
    </section>

    <section id="add" class="add">
    <h2>Add Item</h2>
    <form action="." method="POST" id="add_item" class="add_form">
        <input type="hidden" name="action" value="add_item">
        <div class="add_inputs">
            <label>Categories:</label>
            <select name="category_id" required>
                <option value="">Please select</option>
                <?php foreach($categories as $category) : ?>
                    <option value="<?= $category['categoryID']; ?>">
                        <?= $category['categoryName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label>Title</label>
                <input type="text" name="title" placeholder="Title" required>
                <label>Description</label>
                <input type="text" name="description" maxlength="120" placeholder="Description" required>
            </div>
            <div class="add_addItem">
                <button class="add-button bold">Add</button>
            </div>
        </form>
    </section>
    <p><a href=".?action=list_categories">View/Edit Categories</a></p>

<?php include 'view/footer.php'; ?>