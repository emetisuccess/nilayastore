<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <span class="ml-1"><i class="fa fa-bars fa-2x text-white" data-toggle="modal"
                                data-target="#myModal" id="toggle-button"></i></span>
                        <a href="/e_commerce/public/index">
                            <img src="/e_commerce/public/assets/img/Nlogo.png" alt="" style="height: 60px;">
                        </a>
                    </div>
                    <!-- logo -->
                    <!-- Trigger the modal with a button -->
                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li>
                                <form action="/e_commerce/public/shop.php?search_result" method="POST" class="form-row">
                                    <div class="form-group my-3 mr-1">
                                        <input type="text" name="search" size="65"
                                            placeholder="Search Products, Brands and Keywords"
                                            class="form-control border-0 p-4">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit"
                                            style="background-color:#F28123; margin-top:1.2rem;"
                                            class="btn text-white py-2">Search</button>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="/e_commerce/public/cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        <sup class="badge" id="cart_items"></sup>
                                    </a>
                                    <!-- <a class="mobile-hide search-bar-icon" href="#">
                                        <i class="fas fa-search"></i>
                                    </a> -->
                                    <?php
                                    if (isset($_SESSION['user_email'])) {
                                        $link = <<<DELIMETER
                                        <a href="/e_commerce/public/logout"><i class="fa fa-lock-open"></i> Logout</a>
                                        DELIMETER;
                                        echo $link;
                                    } else {
                                        $link = <<<DELIMETER
                                        <a href="/e_commerce/public/register"><i class="fa fa-user"></i> Register</a>
                                        <a href="/e_commerce/public/login"><i class="fa fa-lock"></i> Login</a>
                                        DELIMETER;
                                        echo $link;
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <!-- <div class="mobile-menu"></div> -->
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->


<!-- Modal -->
<div id="myModal" class="modal fade custom" role="dialog">
    <div class="modal-dialog  modal-dialog-scrollable">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="container">
                    <div class="py-2">
                        <a class="close " data-dismiss="modal">
                            <span class="font-weight-light fa-2x">&times; &nbsp;</span>
                        </a>
                        <a href="/e_commerce/public/index">
                            <img src="/e_commerce/public/assets/img/Nlogo.png" alt=""
                                style="height: 60px; width:150px;">
                        </a>
                    </div>
                    <!-- <h4 class="modal-title mx-3">NilayaStore</h4> -->
                </div>
            </div>
            <div class="modal-body">
                <div class="container">
                    <nav class="ml-3 mb-4">
                        <ul class=" list-group list-group-flush list-unstyled">
                            <li class="list-group-item">
                                <i class="fa fa-home"></i> &nbsp;
                                <a href="/e_commerce/public/index" style="color:#F28123;">Home</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-address-book"></i> &nbsp;
                                <a href="/e_commerce/public/about" style="color:#F28123;">About</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-address-card"></i> &nbsp;
                                <a href="/e_commerce/public/contact" style="color:#F28123;">Contact</a>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-shopping-bag"></i> &nbsp;
                                <a href="/e_commerce/public/shop" style="color:#F28123;">Shop</a>
                            </li>
                            <li class="mt-4 mb-2">
                                <a class="shopping-cart text-dark mx-2" href="/e_commerce/public/cart">
                                    <i class="fa fa-shopping-cart" style="color:#F28123;"></i>
                                    <sup class="badge" id="cart_item" style="color:#F28123;"></sup>
                                </a>
                                <?php
                                if (isset($_SESSION['user_email'])) {
                                    $link = <<<DELIMETER
                                        <a href="/e_commerce/public/logout" class="mx-2"  style="color:#F28123;" ><i class="fa fa-lock-open"></i> Logout</a>
                                        DELIMETER;
                                    echo $link;
                                } else {
                                    $link = <<<DELIMETER
                                        <a href="/e_commerce/public/register" class="mx-2" style="color:#F28123;"><i class="fa fa-user"></i> Register</a>
                                        <a href="/e_commerce/public/login" class="mx-2" style="color:#F28123;"><i class="fa fa-lock"></i> Login</a>
                                        DELIMETER;
                                    echo $link;
                                }
                                ?>

                            </li>
                        </ul>
                    </nav>
                </div>
                <hr class="mb-5">
                <div class="ml-3 mb-4">
                    <h5 style="color:#F28123">Our Categories</h5>
                </div>
                <ul class="list-group list-group-flush list-unstyled">
                    <!-- categories -->
                    <?php categories(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- search area -->
<form action="/e_commerce/public/shop.php?search_result" method="POST">
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" name="search" placeholder="Search Names & Keywords">
                            <button type="submit" name="submit">Search<i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end search area -->