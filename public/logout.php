<?php include("../resources/config.php"); ?>
<?php
if (isset($_SESSION['user_email'])) {

    session_destroy();
    // unset($_SESSION['user_email']);
    // unset($_SESSION['user_id']);
    // unset($_SESSION['user_firstname']);
    // unset($_SESSION['user_lastname']);
    // unset($_SESSION['username']);
    // unset($_SESSION['mobile']);
    // unset($_SESSION['user_address1']);
    // unset($_SESSION['user_address2']);
    // unset($_SESSION['user_state']);
    // unset($_SESSION['user_city']);


    redirect("/e_commerce/public/index");
}


?>