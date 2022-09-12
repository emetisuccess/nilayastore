<?php require_once("../../config.php"); ?>
<?php
if (isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];

    $query = query("DELETE FROM categories WHERE cat_id=" . escape_string($p_id) . "");
    confirm($query);
    set_message("<h3>Category Deleted</h3>");
    redirect("../../../public/admin/index.php?categories");
} else {
    redirect("../../../public/admin/index.php?categories");
}
?>