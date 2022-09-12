<?php include("../../resources/config.php") ?>
<?php
session_destroy();
// unset($_SESSION['user_role']);
// unset($_SESSION['user_email']);
redirect("../../public");
?>