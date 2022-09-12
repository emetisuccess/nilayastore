<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php
if (!isset($_GET['orderID'])) {
    redirect("/e_commerce/public/index");
}
?>
<div class="eme">
    <div class="container">
        <div class="row center">
            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 my-5">
                <div class="card my-5" style="border-radius: 30px; height:400px; padding: 50px 50px;">
                    <div class="card-body text-center">
                        <img src="assets/img/done.gif" width="200px" height="180px" alt="">
                        <span>
                            <h4 style="color:#F28123; margin-bottom: 4px;">Thanks for Patronizing <a href="index"
                                    class="text-info">NilayaStore!</a></h4>
                        </span>
                        <hr style="margin-top: 0px;">
                        <div>
                            <div> Go to <i class="fa fa-arrow-right"></i><a href="index" class="text-info">
                                    <span style="font-size:larger; color:#F28123;">Home</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>