<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">Fresh & Organic</p>
                        <h1>Shampoo Best Hair Cleaner</h1>
                        <div class="hero-btns">
                            <a href="shop.php" class="boxed-btn">Products Collection</a>
                            <a href="contact.php" class="bordered-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->
<!-- feature list section -->
<?php //include(TEMPLATE_FRONT . DS . "feature_list.php"); 
?>

<div class="col-md-12 my-1">
    <!-- <div class="navbar-header">
        <button type="button" class="navbar-toggle product-header border-0" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
            <span class=""><i class="fa fa-bars px-3 text-white"></i></span>
        </button>
    </div> -->
    <p class="alert alert-success msg float-right" style="display:none;"></p>
</div>
<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container-fluid w-75">
        <div class="row d-flex float-left">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-3 ">
                <div class="card mb-4 border-0 toggler">
                    <div class="card-header product-header">
                        <h5 class="text-white text-center">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush list-unstyled">
                            <!-- categories -->
                            <?php categories(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card mb-3 border-0">
                    <div class="card-header product-header">
                        <h4 class="text-white text-center">Natural Shampoo</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php naturalshampoo(); ?>
                        </div>
                    </div>
                    <div style="float: right;">
                        <h6 style="float: right;">
                            <a href="shop.php?naturalshampoo" class="text-dark">View
                                More</a>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card mb-3 border-0">
                    <div class="card-header product-header">
                        <h4 class="text-white text-center">Conditioners</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php conditioners(); ?>
                        </div>
                    </div>
                    <div style="float: right;">
                        <h6 style="float: right;"><a href="shop.php?conditioner" class="text-dark">View
                                More</a></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<?php //include(TEMPLATE_FRONT . DS . "cart_banner.php"); 
?>
<!-- cart banner section -->

<!-- testimonial section -->

<!-- testimonial section -->

<!-- advertisement section -->
<!-- advertisement section -->

<!-- shop banner -->
<!-- <section class="shop-banner">
    <div class="container">
        <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
        <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
        <a href="shop.php" class="cart-btn btn-lg">Shop Now</a>
    </div>
</section> -->
<!-- end shop banner -->

<!-- latest news section -->


<!-- logo carousel -->

<!-- end logo carousel -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>