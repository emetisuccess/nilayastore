<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">Edit Product</h1>
    </div>
</div>

<?php
display_message();
if (isset($_GET['p_id'])) {
    $query = query("SELECT a.product_category_id, a.product_brand_id, a.product_title, a.product_description, a.product_price, a.product_quantity, a.product_keywords, a.product_image, b.cat_id, b.cat_title, c.brand_id, c.brand_name FROM products a, categories b, brands c WHERE a.product_category_id=b.cat_id AND a.product_brand_id=c.brand_id AND a.product_id=" . escape_string($_GET['p_id']) . "");
    confirm($query);
    while ($data = fetch_array($query)) : ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12  text-center"><?php display_message(); ?></div>
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" value="<?php echo $data['product_title']; ?>" name="product_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <textarea type="text" rows="5" name="product_description" class="form-control"><?php echo $data['product_description']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_price">Product Price</label>
                                    <input type="text" value="<?php echo $data['product_price']; ?>" name="product_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="product_quantity">Product Quantity</label>
                                    <input type="number" value="<?php echo $data['product_quantity']; ?>" name="product_quantity" min="1" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside id='admin_sidebar' class="col-md-4">
                        <!-- product button -->
                        <div class="form-group">
                            <input type="submit" name="draft" class="btn btn-warning " value="Draft">
                            <input type="submit" name="update" class="btn btn-primary " value="Update">
                        </div>

                        <div class="form-group">
                            <label for="product_category">Product Category</label>
                            <select name="product_category_id" id="" class="form-control">
                                <option value="<?php echo $data['product_category_id']; ?>">
                                    <?php echo show_product_category_title($data['product_category_id']); ?>
                                </option>
                                <?php show_category_add_product_page(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_brand">Product Brand</label>
                            <select name="product_brand_id" id="" class="form-control">
                                <option value="<?php echo $data['product_brand_id']; ?>">
                                    <?php echo show_product_brand_title($data['product_brand_id']); ?></option>
                                <?php show_brand_add_product_page(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_keywords">Product Keywords</label>
                            <textarea type="text" rows="5" name="product_keywords" class="form-control"><?php echo $data['product_keywords']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <div>
                                <label for="current_image">Current Image</label>
                            </div>
                            <img src="../../resources/uploads/<?php echo $data['product_image']; ?>" height="100px" width="100px">
                            <input type="hidden" name="current_image" value="<?php echo $data['product_image']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                    </aside>
                </div>
            </div>
        </form>

<?php
    endwhile;
}
?>

<?php edit_product(); ?>
<!-- /.row -->