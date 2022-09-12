<?php require_once("../../config.php"); ?>
<?php
if (isset($_GET['enquiry_id'])) {

    $p_id = $_GET['enquiry_id'];

    $query = query("DELETE FROM contacts WHERE contact_id=" . escape_string($p_id) . "");
    confirm($query);
    set_message("<h4><span class='text-success'>Enquiry Deleted </span></h4>");
    redirect("../../../public/admin/index.php?enquiries");
} else {
    redirect("../../../public/admin/index.php?enquiries");
}
?>