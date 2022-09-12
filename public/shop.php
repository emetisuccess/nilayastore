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
<div class="product-section mt-150 mb-150">
    <div class="container">

        <?php if (!isset($_GET['cat_id']) && !isset($_GET['search_result'])) : ?>
        <div class="row product-lists">
            <?php shopProducts(); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['cat_id'])) :
            $query = query("SELECT * FROM categories WHERE cat_id=" . escape_string($_GET['cat_id']) . "");
            $row = fetch_array($query);
            $cat_title = $row['cat_title'];
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 border-0">
                    <div class="card-header product-header">
                        <h4 class="text-white"><?php echo $cat_title; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php show_product_based_on_category_clicked(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <?php if (isset($_GET['search_result'])) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 border-0">
                    <div class="card-header product-header">
                        <h4 class="text-white">Search Results</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php search_result(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <?php
        if (isset($_GET['naturalshampoo'])) {
        ?>
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 border-0">
                        <div class="card-header product-header">
                            <h4 class="text-white">Natural Shampoo</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php naturalshampoo(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <?php
        if (isset($_GET['conditioner'])) {
        ?>
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 border-0">
                        <div class="card-header product-header">
                            <h4 class="text-white">Conditioners</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php conditioners(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap ">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->

<!-- logo carousel -->

<!-- end logo carousel -->

<!-- footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>