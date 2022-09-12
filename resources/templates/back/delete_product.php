<?php require_once("../../config.php"); ?>
<?php
if (isset($_GET['p_id']) && isset($_GET['image'])) {

    $p_id = $_GET['p_id'];
    $p_img = $_GET['image'];

    if (!$p_img == "") {

        $image_path = UPLOAD_DIRECTORY . DS  . $p_img;
        unlink($image_path);
    }


    $query = query("DELETE FROM products WHERE product_id=" . escape_string($p_id) . "");
    confirm($query);
    set_message("<h3>Product Deleted</h3>");
    redirect("../../../public/admin/index.php?products");
} else {
    redirect("../../../public/admin/index.php?products");
}
?>