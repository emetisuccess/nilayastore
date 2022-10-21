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
                        <div class="hero-btns mx-5">
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

<div class="col-md-12 my-1">
    <p class="alert alert-success msg float-right" style="display:none;"></p>
</div>
<!-- product section -->
<div class="product-section mt-150 ">
    <div class="container">
        <div class="row d-flex float-left">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mr-3 ">
                <div class="card mb-4 toggler">
                    <div class="card-header" style="background-color:aquamarine;">
                        <h5 class="text-center py-2">Product Categories</h5>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-0">
                <div class="card mb-3">
                    <div class="card-header" style="background-color:aquamarine;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="font-rubik font-size-20">Natural Shampoo</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="shop.php?naturalshampoo">
                                    <span style="font-size:19px; color:black;">See More</span> <i
                                        class="fa fa-angle-right text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php displayNaturalshampoo($cat_id = "4"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(TEMPLATE_FRONT . DS . "conditioners.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "faceandbodycream.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "hairgrowthoil.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "handmadesoap.php"); ?>
<!-- end product section -->

<!-- end logo carousel -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>