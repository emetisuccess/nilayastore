<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more</p>
                    <h1>Product Details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<?php
if (isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];

    $query = query("SELECT a.product_id, a.product_category_id, a.product_title, a.product_price, a.product_description, a.product_image, a.product_keywords, b.cat_id, b.cat_title FROM products a, categories b WHERE a.product_category_id=b.cat_id AND a.product_id=" . escape_string($p_id) . "");
    confirm($query);
    while ($row = fetch_array($query)) {
?>
<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="/e_commerce/resources/uploads/<?php echo $row['product_image']; ?>" alt=""
                        class="img-fluid card-img-top" style='border-radius:12px; height:500px'>
                </div>
                <div class="form-row pt-3 font-size-16 font-baloo mt-4 mb-5">
                    <div class="col-6">
                        <button type="submit" class="btn btn-danger btn-block">Proceed to Buy</button>
                    </div>
                    <div class="col-6">
                        <a href="/e_commerce/public/cart/<?php echo $row["product_id"]; ?>"
                            add="<?php echo $row["product_id"]; ?>" style="background-color:#F28123; "
                            class="btn btn-block text-white product">
                            Add to <i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h5 class="font-baloo font-size-20 mt-3 mb-0 display-4"><?php echo $row['product_title']; ?></h5>
                <small>by <?php echo $row['cat_title']; ?></small>
                <div class="my-2">
                    <div class="font-size-16">
                        <?php echo $row['product_description']; ?>
                    </div>
                </div>
                <hr class="mb-0">

                <!-- product price -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>
                            <h5>Price <span>:</span></h5>
                        </td>
                        <td class="text-danger fa-2x ">&nbsp; &nbsp;
                            $<span><?php echo $row['product_price']; ?></span>
                        </td>
                    </tr>
                </table>
                <!-- !product price -->

                <!-- policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-retweet border p-3 rounded-pill fa-2x text-info"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12 text-info">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-truck border p-3 rounded-pill fa-2x text-info"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12 text-info">Daily Product<br> Delivery</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2">
                                <span class="fas fa-check-double border p-3 rounded-pill fa-2x text-info"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12 text-info">Quality <br> Product</a>
                        </div>
                    </div>
                </div>
                <!-- !policy -->
                <hr>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 my-5">
                <div class="font-white-50">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#description" class="nav-link active text-dark" data-toggle="tab">Product
                                Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#review" class="nav-link text-dark" data-toggle="tab">Product Reviews</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="description" class="container tab-pane active">
                            <p></p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis asperiores error
                                tempore,
                                dolorem
                                optio consectetur quam blanditiis ipsam repellat est ab excepturi culpa accusantium
                                nemo,
                                suscipit
                                soluta. Voluptatem, tempore deleniti.
                                Aliquam magnam, nulla quaerat accusamus numquam similique recusandae cum, dicta
                                quibusdam
                                error,
                                architecto voluptate perferendis delectus. Qui commodi repudiandae eius nam maiores?
                                Omnis,
                                autem.
                                Laudantium tempore vero quaerat nulla excepturi.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis asperiores error
                                tempore,
                                dolorem
                                optio consectetur quam blanditiis ipsam repellat est ab excepturi culpa accusantium
                                nemo,
                                suscipit
                                soluta. Voluptatem, tempore deleniti.
                            </p>
                        </div>
                        <div id="review" class="container tab-pane fade">
                            <p></p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="py-3">
                                        <div class="d-flex">
                                            <p>
                                                <span class="bg-dark p-2 text-white rounded-circle">E</span>
                                                <span class="border-right mr-2">Emeti &nbsp;</span>
                                            </p>
                                            <p>Time</p>
                                        </div>
                                        <p class="mt-0">&nbsp; &nbsp;
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit itaque dolore
                                            excepturi
                                            neque commodi? Quod dignissimos accusantium ex beatae magnam, voluptatem
                                            nostrum
                                            rerum fugit, sed delectus neque. Quas, modi possimus?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <div class="col-md-12 my-4">
                                    <h4>Write Review</h4>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12 ">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="fullname" class="form-control"
                                                placeholder="Enter fullname">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comment" rows="5" class="form-control" id=""
                                                placeholder="Comment here"></textarea>
                                        </div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-md btn-danger">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->
<?php
    }
}
?>
<!-- end single product -->

<!-- more products  start-->
<div class="more-products mb-150" id="related">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Related</span> Products</h3>
                    <h5>You can check below for other related product of your choice</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- top sales carousel -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="related-products-carousel-inner">
                                <?php
                                $query = query("SELECT * FROM products WHERE product_category_id=" . escape_string($_GET['cat_id']) . "");
                                confirm($query);
                                $count = mysqli_num_rows($query);
                                if ($count > 0) {
                                    while ($row = fetch_array($query)) {
                                        $product_title = substr($row['product_title'], 0, 5) . "..";
                                ?>
                                <div class="single-logo-item ">
                                    <div class="card" style="padding:0px; border-radius:12px;">
                                        <div class="card-body">
                                            <a
                                                href="/e_commerce/public/single-product/<?php echo $row["product_id"]; ?>/<?php echo $row["product_category_id"]; ?>">
                                                <img src="/e_commerce/resources/uploads/<?php echo $row['product_image']; ?>"
                                                    alt="" class="img-fluid" style='height:120px; border-radius:12px;'>
                                            </a>
                                        </div>
                                        <div class="card-footer text-center">
                                            <h6 class="mb-1"><?php echo $product_title; ?></h6>
                                            <div class="price">
                                                <span><?php echo $row['product_price']; ?></span>
                                            </div>
                                            <a href="/e_commerce/public/cart/<?php echo $row["product_id"]; ?>"
                                                add=" <?php echo $row["product_id"]; ?>"
                                                style="background-color:#F28123;" class="btn btn-sm text-white product">
                                                Add to <i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                } else {
                                    echo "<div class='text-center'>
                                    <h3>No Related Products</h3>
                                </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end top sales carousel -->
            </div>
        </div>

    </div>
</div>
<!-- end more products -->

<!-- new products carousel -->
<?php require_once(TEMPLATE_FRONT . DS . "new_products.php"); ?>
<!-- end new products carousel -->


<!-- footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>