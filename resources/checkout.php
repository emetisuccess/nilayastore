<?php require_once("config.php"); ?>
<?php
$ip_add = getenv("REMOTE_ADDR");


if (isset($_GET['addToCart']) && isset($_SESSION['user_id'])) {

    $product_id = $_GET['p_id'];

    $product_query = query("SELECT * FROM products WHERE product_id='$product_id'");
    confirm($product_query);
    while ($row = fetch_array($product_query)) {
        $product_price = $row['product_price'];
        $product_title = $row['product_title'];
    };

    $user_id = $_SESSION['user_id'];
    $quantity = 1;

    $cart_query = query("SELECT p_id FROM cart WHERE user_id='$user_id' AND p_id='$product_id'");
    confirm($cart_query);

    if (mysqli_num_rows($cart_query) > 0) {
        echo "product already added";
    } else {
        $query = query("INSERT INTO cart(p_id, ip_add, user_id, qty, product_price, product_title) VALUES('{$product_id}', '{$ip_add}', '{$user_id}', 1, '{$product_price}','{$product_title}')");
        confirm($query);
    }
    redirect("/e_Commerce/public/cart");
}


function get_cart_items()
{
    if (isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];

        $query = query("SELECT a.product_title, a.product_image, a.product_price, a.product_id, b.qty, b.cart_id FROM products a, cart b WHERE a.product_id=b.p_id AND b.user_id=" . escape_string($user_id) . "");
        confirm($query);
        while ($row = fetch_array($query)) {
            $product_quantity = $row['qty'];

            $sub = $row['product_price'] *  $product_quantity;

            $product = <<<DELIMETER
                     <tr>
                     <td style="vertical-align: middle;">
                         <img src="/e_commerce/resources/uploads/{$row['product_image']}" alt=''
                             style='height:40px; border-radius:7px;'>
                     </td>
                     <td style="vertical-align: middle;">{$row['product_title']}</td>
                     <td style="vertical-align: middle;">&#36;{$row['product_price']}</td>
                     <td style="vertical-align: middle;">
                     <form action="" method="POST">
                     <input type="hidden"  value="{$row['product_id']}" name="pro_id">
                     <input type="number" min="1" class="border-0" value="{$row['qty']}" name="cart_qty">
                     <button type='submit' name='update_qty' class="btn btn-sm" style="background-color:#F28123; color:white;">update</button>
                     </form>
                     </td>
                     <td style="vertical-align: middle;">&#36;{$sub}</td>
                     <td style="vertical-align: middle;">
                         <a href="/e_commerce/resources/checkout.php?remove={$row['product_id']}"
                             class='btn btn-danger m-1'>
                             <i class="glyphicon">X</i></a>
                    </td>
                 </tr>
                DELIMETER;
            echo $product;
        }
    }
}


// geting the search result;
if (isset($_POST['search'])) {
    $search_input = $_POST['search_input'];
    redirect("/e_commerce/public/shop.php?search_result=$search_input");
}

if (isset($_POST['update_qty'])) {

    $p_id = $_POST['pro_id'];
    $cart_qty = $_POST['cart_qty'];

    $update_qty = query("UPDATE cart SET qty='{$cart_qty}' WHERE p_id='{$p_id}'");
    confirm($update_qty);

    redirect("/e_commerce/public/cart");
}

if (isset($_GET['remove'])) {

    $pro_id = $_GET['remove'];

    $query = query("DELETE FROM cart WHERE p_id='$pro_id'");
    confirm($query);

    redirect("/e_commerce/public/cart");
}

?>