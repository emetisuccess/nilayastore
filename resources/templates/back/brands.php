<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">Add Brand</h1>
    </div>
</div>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-12  text-center"><?php display_message(); ?></div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_title">Brand name</label>
                <input type="text" name="brand_name" class="form-control">
            </div>
            <!-- product button -->
            <div class="form-group">
                <input type="submit" name="add_brand" class="btn btn-primary " value="Add Brand">
            </div>
        </div>
        <aside id='admin_sidebar' class="col-md-6">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody><?php get_brands(); ?></tbody>
            </table>
        </aside>
    </div>

    <?php

    if (isset($_GET['p_id'])) {
        $query = query("SELECT * FROM brands WHERE brand_id=" . escape_string($_GET['p_id']) . "");
        confirm($query);
        while ($row = fetch_array($query)) : ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_title">Brand name</label>
                <input type="text" value="<?php echo $row['brand_name']; ?>" name="brand_name" class="form-control">
            </div>
            <!-- product button -->
            <div class="form-group">
                <input type="submit" name="update_brand" class="btn btn-primary " value="Update Brand">
                <input type="hidden" name="brand_id" value="<?php echo $row['brand_id']; ?>">
            </div>
        </div>
    </div>
    <?php
        endwhile;
    }
    edit_brand();
    ?>
</form>
<?php add_brand(); ?>
<!-- /.row -->