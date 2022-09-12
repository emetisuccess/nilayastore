<?php require_once("../../config.php"); ?>
<?php
if (isset($_GET['remove'])) {

    $remove_id = $_GET['remove'];
    $query = query("DELETE FROM orders WHERE order_id=" . escape_string($remove_id) . "");
    confirm($query);
    set_message("<h3 class='bg-success'>Order Deleted</h3>");
    redirect("../../../public/admin/index.php?orders");
} else {
    redirect("../../../public/admin/index.php?orders");
}
?>