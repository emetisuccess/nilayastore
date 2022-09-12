<?php require_once("../../config.php"); ?>
<?php
if (isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];

    $query = query("DELETE FROM brands WHERE brand_id=" . escape_string($p_id) . "");
    confirm($query);
    set_message("<h4><span class='text-success'>Brand Deleted</span></h4>");
    redirect("../../../public/admin/index.php?brands");
} else {
    redirect("../../../public/admin/index.php?brands");
}
?>