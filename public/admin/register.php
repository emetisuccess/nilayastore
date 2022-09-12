<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "header.php"); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to admin
                    <small>
                        <?php
                        if (isset($_SESSION['user_email'])) {
                            echo $_SESSION['user_email'];
                        };
                        ?>
                    </small>
                </h1>
            </div>
        </div>
        <?php
        if (
            $_SERVER['REQUEST_URI'] == "/e_commerce/public/admin/"
            || $_SERVER['REQUEST_URI'] == "/e_commerce/public/admin/index.php"
        ) {
            include(TEMPLATE_BACK . DS . "admin_content.php");
        }

        ?>


        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . DS . "footer.php"); ?>