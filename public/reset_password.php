<?php include("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<div class="eme">
    <div class="container">
        <div class="row center">
            <div class="col-lg-5 my-5">
                <div class="card my-5" style="border-radius: 30px;">
                    <h3 class=" m-3 text-center" style="display: flex; align-items:center; justify-content:center">
                        Reset Password
                    </h3>
                    <h6 class="text-center">You can reset your password here</h6>
                    <hr style="margin-top: 0px;margin-bottom:0px;">
                    <div class="text-center"><?php display_message(); ?></div>
                    <div class="card-body">
                        <form action="forgot_password.php" method="POST">
                            <div class="form-group">
                                <label for="email">New Password:</label>
                                <input type="email" name="password" class="form-control p-4"
                                    placeholder="enter password" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Confirm Password:</label>
                                <input type="email" name="confirmpwd" class="form-control p-4"
                                    placeholder="confirm password" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="reset_password" value="Reset Password"
                                    class="btn btn-block btn-sm">
                            </div>
                        </form>
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

<?php

if (isset($_POST['reset_password'])) {

    $user_email = $_POST['email'];

    $query = query("SELECT * FROM users WHERE user_email= '{$user_email}'");
    confirm($query);
    $count = mysqli_num_rows($query);


    if (empty($user_email)) {
        set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>All Fields Are Required</span>");
        redirect("forgot_password.php");
    } else {
        if ($count < 1) {
            set_message("<span class='alert alert-warning text-white' style='background-color:#F28123; border-radius:48px;'>Don't have an Account: <a href='register.php' class='text-secondary'> Register</a></span>");
            redirect("forgot_password.php");
        } else {
            // insert token into users table

        }
    }
}

?>