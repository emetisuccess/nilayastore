<?php require_once("../resources/config.php"); ?>
<?php

if (isset($_SESSION['user_id'])) {

    if (isset($_POST['pay']) && isset($_POST["tx"])) {

        $amountToPay = $_POST['amount'];
        $order_transaction = $_POST['tx'];
        $order_status = $_POST['status'];
        $order_currency_type = $_POST['currency_code'];
        $customer_id = $_SESSION['user_id'];
        $customer_name = $_POST['fullname'];
        $customer_email = $_POST['email'];
        $customer_address1 = $_POST['street_address'];
        $customer_city = $_POST['city_address'];
        $customer_state = $_POST['state'];
        $customer_country = $_POST['country'];
        $query = query("SELECT mobile FROM users WHERE user_id='$customer_id'");
        confirm($query);
        $row = fetch_array($query);
        $customer_mobile = $row['mobile'];

        // $select_orders = query("SELECT * FROM orders WHERE user_id='$customer_id'");
        // confirm($select_orders);
        // $count = mysqli_num_rows($select_orders);
        // if ($count > 0) {
        //     $update_order = query("UPDATE orders SET ");
        // }

        $insert_orders = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency, customer_id, customer_fullname, customer_mobile, customer_email, customer_address1, customer_state, customer_city, customer_country) VALUES('$amountToPay','$order_transaction','$order_status','$order_currency_type','$customer_id','$customer_name', '$customer_mobile', '$customer_email', '$customer_address1','$customer_state', '$customer_city', '$customer_country')");
        confirm($insert_orders);

        $last_id = mysqli_insert_id($conn);


        $select_cart = query("SELECT * FROM cart WHERE user_id='$customer_id'");
        confirm($select_cart);
        while ($rows = fetch_array($select_cart)) {

            $product_id = $rows['p_id'];
            $product_title = $rows['product_title'];
            $product_price = $rows['product_price'];
            $p_qty = $rows['qty'];

            // insert data into report table
            $insert_report = query("INSERT INTO reports (order_id, product_id, product_title, product_price, product_quantity) VALUES('$last_id', '$product_id', '$product_title', '$product_price','$p_qty')");
            confirm($insert_report);
        }

        $delete_cart_items = query("DELETE FROM cart WHERE user_id='$customer_id'");
        confirm($delete_cart_items);
    }
}

?>