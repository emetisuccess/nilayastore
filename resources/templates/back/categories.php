<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">Add Category</h1>
    </div>
</div>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="row justify-content-center">
        <div class="col-md-12  text-center"><?php display_message(); ?></div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_title">Category title</label>
                <input type="text" name="cat_title" class="form-control">
            </div>
            <!-- product button -->
            <div class="form-group">
                <input type="submit" name="add_category" class="btn btn-primary " value="Add Category">
            </div>
        </div>
        <aside id='admin_sidebar' class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Category Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> <?php get_category(); ?> </tbody>
            </table>
        </aside>
    </div>
    <?php
    if (isset($_GET['p_id'])) {
        $query = query("SELECT * FROM categories WHERE cat_id=" . escape_string($_GET['p_id']) . "");
        confirm($query);
        while ($row = fetch_array($query)) : ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_title">Category Title</label>
                <input type="text" value="<?php echo $row['cat_title']; ?>" name="cat_title" class="form-control">
            </div>
            <!-- product button -->
            <div class="form-group">
                <input type="submit" name="update_cat" class="btn btn-primary " value="Update Category">
                <input type="hidden" name="cat_id" value="<?php echo $row['cat_id']; ?>">
            </div>
        </div>
    </div>
    <?php
        endwhile;
    }
    edit_category();
    ?>
</form>

<?php add_category(); ?>
<!-- /.row -->