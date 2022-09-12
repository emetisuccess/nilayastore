<?php include("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php
// if (!isset($_GET['forgot'])) {
//     redirect("index.php");
// }
?>
<?php

// if (isset($_POST['forgot_password'])) {

//     $user_email = $_POST['email'];


//     $query = query("SELECT * FROM users WHERE user_email= '{$user_email}'");
//     confirm($query);
//     $count = mysqli_num_rows($query);

//     $token = bin2hex(openssl_random_pseudo_bytes(50));

//     if (empty($user_email)) {
//         set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>All Fields Are Required</span>");
//         redirect("forgot_password.php");
//     } else {
//         if ($count < 1) {
//             set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Don't have an Account: <a href='register.php' class='text-secondary'> Register</a></span>");
//             redirect("forgot_password.php");
//         } else {
//             // insert token into users table;
//             $update_token = query("UPDATE users SET token='{$token}' WHERE user_email='{$user_email}'");
//             confirm($update_token);

//             if ($update_token) {
//                 $msg = "Check your email";
//             }
//         }
//     }
// }
?>

<!-- <div class="eme">
    <div class="container">
        <div class="row center">
            <div class="col-lg-5 my-5">
                <div class="card my-5" style="border-radius: 30px;">
                    <h3 class=" m-3 text-center" style="display: flex; align-items:center; justify-content:center">
                        Forgot Password?
                    </h3>
                    <h6 class="text-center">You can reset your password here</h6>
                    <hr style="margin-top: 0px; margin-bottom:0px;">
                    <div class="text-center"><?php //display_message(); 
                                                ?></div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email"><b>Enter Email</b></label>
                                <input type="email" name="email" class="form-control p-3" placeholder="email address"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="forgot_password" value="Reset Password"
                                    class="btn btn-block btn-sm">
                            </div>
                        </form>
                        <div>
                            <div>
                                <h4 class="text-center"><?php //echo isset($msg) ? $msg : ""; 
                                                        ?></h4>
                            </div>
                        </div>
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
</div> -->