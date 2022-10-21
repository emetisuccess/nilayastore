<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<?php if (isset($_GET['search_result'])) : ?>
<div class="product-section mt-150 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card mb-3 border-0">
                    <div class="card-header" style="background-color:burlywood;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-white">Shop Online</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                                $result = escape_string($_GET['search_result']);
                                $query = query("SELECT a.product_id, a.product_image, a.product_title, a.product_price, a.product_category_id, c.cat_title, b.brand_name FROM products AS a INNER JOIN categories AS c ON a.product_category_id=c.cat_id INNER JOIN brands AS b ON a.product_brand_id=b.brand_id WHERE a.product_keywords LIKE '%$result%' OR a.product_title LIKE '%$result%' OR b.brand_name LIKE '%$result%' OR c.cat_title LIKE '%$result%'");

                                confirm($query);
                                $count = mysqli_num_rows($query);
                                if ($count > 0) :
                                    while ($row = fetch_array($query)) {
                                        $product_title = substr($row['product_title'], 0, 12) . "..";
                                        $products = <<<DELIMETER
                                            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6 col-6 text-center mb-4">
                                            <div class="card" style="padding:0px; border-radius:14px;">
                                            <div class="card-body">
                                            <a href="/e_commerce/public/single-product/{$row["product_id"]}/{$row["product_category_id"]}">
                                            <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt='' style='height:150px; border-radius:12px;'>
                                            </a>
                                            </div>
                                            <div class="card-footer">
                                            <div>
                                            <h6 class='mb-0'>{$product_title}</h6>
                                            <p class="text-bold">&#8358;{$row['product_price']}</p>
                                            </div>
                                            <a href="/e_commerce/public/cart/{$row["product_id"]}" add="{$row["product_id"]}" style="background-color:#F28123; border-radius:6px" class="btn btn-sm text-white product">
                                            Add to <i class="fas fa-shopping-cart"></i></a>
                                            </div>
                                            </div>
                                            </div>
                                            DELIMETER;
                                        echo $products;
                                    }
                                else : echo "<h3> $result doesn't exist</h3>";
                                endif;
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<?php if (isset($_GET['cat_id'])) :
    $query = query("SELECT * FROM categories WHERE cat_id=" . escape_string($_GET['cat_id']) . "");
    $row = fetch_array($query);
    $cat_title = $row['cat_title'];
?>
<div class="product-section mt-150 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-sm-12 col-12 col-md-12 mb-0">
                <div class="card mb-3">
                    <div class="card-header" style="background-color:aquamarine;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="font-rubik font-size-20">Shop for <?php echo $cat_title; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php show_product_based_on_category_clicked(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php include(TEMPLATE_FRONT . DS . "bodybutter.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "facescrum.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "lipglose.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "showergels.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "sugarscrub.php"); ?>

<!-- end products -->

<!-- logo carousel -->
<!-- end logo carousel -->

<!-- footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>