<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "top_nav.php"); ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p></p><br/>
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h3><?php display_message(); ?></h3>
                <h3 class="msg"></h3>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <p class="display-3">Checkout</p>
                <div class="cart-table-wrap">
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                            <tr class="text-center">
                                <th>Product Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php get_cart_items(); ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-4">
                            <script
                                src="https://www.paypal.com/sdk/js?client-id=AdnCHQ1Q-UTzXwW_-gnCV_RPyB3kH0SASKX21Qrvbasv8OGKc_3uYZcoAs3kF8MP_LB2C8Rd4xE7zMN0&currency=USD">
                            </script>
                            <?php
                            if (isset($_SESSION['user_id'])) {

                                $user_id = $_SESSION['user_id'];

                                //Set up a container element for the button

                                $query_cart = query("SELECT * FROM cart WHERE user_id='$user_id'");
                                confirm($query_cart);
                                $count_cart_items = mysqli_num_rows($query_cart);

                                if ($count_cart_items > 0) {
                                    echo '<div id="paypal-button-container"></div>';
                                }

                                $total = 0;
                                $item_quantity = 0;

                                $query = query("SELECT * FROM cart WHERE user_id='$user_id'");
                                confirm($query);
                                $count = mysqli_num_rows($query);

                                if ($count > 0) {
                                    while ($row = fetch_array($query)) {
                                        $product_amount = $row['product_price'];
                                        $product_quantity = $row['qty'];

                                        $sub = $row['product_price'] *  $row['qty'];
                                        $item_quantity += $row['qty'];
                                        $total += $sub;
                                    }
                                } else {
                                    echo "<h3 class='text-center'>Your Cart is Empty</h3>";
                                }
                            } else {
                                echo "<h3 class='text-center'>Login to Add and Checkout</h3>";
                            }
                            ?>
                            <script>
                            paypal.Buttons({
                                // Sets up the transaction when a payment button is clicked
                                createOrder: (data, actions) => {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: '<?php echo  $total; ?>'
                                            }
                                        }]
                                    });
                                },
                                onApprove: (data, actions) => {
                                    return actions.order.capture().then(function(orderData) {
                                        // console.log('Capture result', orderData, JSON.stringify(
                                        //     orderData,
                                        //     null, 2));
                                        const transaction_id = orderData.purchase_units[0].payments
                                            .captures[0].id;
                                        const status = orderData.status;
                                        const amount = orderData.purchase_units[0].payments
                                            .captures[0].amount.value;
                                        const currency_code = orderData.purchase_units[0].payments
                                            .captures[0].amount.currency_code;
                                        const email = orderData.payer
                                            .email_address;
                                        const fullname = orderData.purchase_units[0].shipping
                                            .name.full_name;
                                        const street_address = orderData.purchase_units[0].shipping
                                            .address.address_line_1;
                                        const city_address = orderData.purchase_units[0].shipping
                                            .address.admin_area_2;
                                        const state = orderData.purchase_units[0].shipping
                                            .address.admin_area_1;
                                        const postal_code = orderData.purchase_units[0].shipping
                                            .address.postal_code;
                                        const country = orderData.purchase_units[0].shipping
                                            .address.country_code;

                                        $.ajax({
                                            url: "verifypayment.php",
                                            method: "post",
                                            data: {
                                                pay: 1,
                                                tx: transaction_id,
                                                amount: amount,
                                                currency_code: currency_code,
                                                email: email,
                                                fullname: fullname,
                                                street_address: street_address,
                                                city_address: city_address,
                                                status: status,
                                                state: state,
                                                postal_code: postal_code,
                                                country: country
                                            },
                                            success: function(data) {
                                                console.log(data);
                                                window.location =
                                                    "/e_commerce/public/thank_you.php?orderID=" +
                                                    data + transaction_id;
                                            }
                                        })
                                    });
                                }
                            }).render('#paypal-button-container');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row ml-5">
                    <div class="total-section ml-3 mt-5">
                        <div class="mb-0">
                            <h3 class="mb-0">Cart Totals</h3>
                        </div>
                        <table class="table table-hover table-bordered mt-4">
                            <tbody>
                                <tr>
                                    <td><strong>Total Items: </strong></td>
                                    <td>
                                        <span
                                            class="amount"><?php echo isset($item_quantity) ?  $item_quantity :  $item_quantity = "0";  ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Shipping and Handling: </strong></td>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Totals: </strong></td>
                                    <td>
                                        <span
                                            class="amount">&#36;<?php echo isset($total) ? $total : $total = "0.00"; ?>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end cart -->

<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Other</span> Products</h3>
                    <h5>You can check below for any other product of your choice</h5>
                </div>
            </div>
        </div>


        <div class="row justify-content-center" id="related">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- top sales carousel -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="other-products-carousel-inner">
                                <?php
                                $query = query("SELECT * FROM products");
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

<!-- footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>