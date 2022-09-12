<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">All Products</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"><?php display_message(); ?></div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price <span>&#36;</span></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $product_count = query("SELECT * FROM products");
                $count = mysqli_num_rows($product_count);

                $result_per_page = 5;

                $number_of_pages = ceil($count / $result_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $first_page_result = ($page - 1) * $result_per_page;

                $product_query = query("SELECT * FROM products ORDER BY product_id DESC LIMIT " . $first_page_result . ", " . $result_per_page . "");
                confirm($product_query);
                while ($row = fetch_array($product_query)) {
                    $cat_title = show_product_category_title($row['product_category_id']);
                    $products = <<<DELIMETER
                            <tr>
                            <td style='vertical-align:middle;'>{$row['product_id']}</td>
                            <td style='vertical-align:middle;'>{$row['product_title']}</td>
                            <td style='vertical-align:middle; text-align:center;'><a href='index.php?edit_product&p_id={$row['product_id']}'><img src="../../resources/uploads/{$row['product_image']}" width='150px' class='img-responsive' alt='image'></a></td>
                            <td style='vertical-align:middle;'>{$cat_title}</td>
                            <td style='vertical-align:middle;'>{$row['product_quantity']}</td>
                            <td style='vertical-align:middle;'>{$row['product_price']}</td>
                            <td style='vertical-align:middle;'>
                            <a href='../../resources/templates/back/delete_product.php?p_id={$row['product_id']}&image={$row['product_image']}' class='btn btn-danger' style='margin-bottom:2px;'><span class='glyphicon glyphicon-remove'></span></a>
                            <a href='index.php?edit_product&p_id={$row['product_id']}' class='btn btn-info' style='margin-bottom:2px;'><span class='glyphicon glyphicon-edit'></span></a>
                            </td>
                            </tr>
                            DELIMETER;
                    echo $products;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.row -->
<ul class="pager">
    <?php for ($i = 1; $i <= $number_of_pages; $i++) {
        if ($i == $page) : ?>
    <li>
        <a href="/e_commerce/public/admin/index.php?products&page=<?php echo $i; ?>" style="background-color: black;">
            <?php echo $i; ?>
        </a>
    </li>
    <?php else : ?>
    <li>
        <a href="/e_commerce/public/admin/index.php?products&page=<?php echo $i; ?>">
            <?php echo $i; ?>
        </a>
    </li>
    <?php
        endif;
    }
    ?>
</ul>