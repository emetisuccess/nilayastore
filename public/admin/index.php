<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>
<?php include(TEMPLATE_BACK . DS . "access_control.php"); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        if (
            $_SERVER['REQUEST_URI'] == "/e_commerce/public/admin/"
            || $_SERVER['REQUEST_URI'] == "/e_commerce/public/admin/index.php"
        ) {
            include(TEMPLATE_BACK . DS . "admin_content.php");
        }
        if (isset($_GET['orders'])) {
            include(TEMPLATE_BACK . DS . "orders.php");
        }
        if (isset($_GET['brands'])) {
            include(TEMPLATE_BACK . DS . "brands.php");
        }
        if (isset($_GET['edit_brand'])) {
            include(TEMPLATE_BACK . DS . "brands.php");
        }
        if (isset($_GET['categories'])) {
            include(TEMPLATE_BACK . DS . "categories.php");
        }
        if (isset($_GET['products'])) {
            include(TEMPLATE_BACK . DS . "products.php");
        }
        if (isset($_GET['add_product'])) {
            include(TEMPLATE_BACK . DS . "add_product.php");
        }
        if (isset($_GET['edit_product'])) {
            include(TEMPLATE_BACK . DS . "edit_product.php");
        }
        if (isset($_GET['customers'])) {
            include(TEMPLATE_BACK . DS . "customers.php");
        }
        if (isset($_GET['reports'])) {
            include(TEMPLATE_BACK . DS . "reports.php");
        }
        if (isset($_GET['pages'])) {
            include(TEMPLATE_BACK . DS . "pages.php");
        }
        if (isset($_GET['enquiries'])) {
            include(TEMPLATE_BACK . DS . "enquiries.php");
        }
        ?>
    </div>
    <!-- /.container-fluid -->
</div>

<!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . DS . "footer.php"); ?>