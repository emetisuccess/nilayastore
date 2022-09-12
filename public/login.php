<?php include("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<div class="eme">
    <div class="container">
        <div class="row center">
            <div class="col-lg-6 my-5">
                <div class="card my-5" style="border-radius: 30px;">
                    <h3 class=" m-3 text-center" style="display: flex; align-items:center; justify-content:center">Login
                    </h3>
                    <hr style="margin-top: 0px;">
                    <div class="text-center"><?php display_message(); ?></div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control p-4" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control p-4" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="user_login" value="Login" class="btn btn-block btn-sm">
                            </div>
                        </form>
                        <div>
                            <div> Go to <i class="fa fa-arrow-right"></i><a href="index" class="text-info">
                                    <span style="font-size:larger; color:#F28123;">Home</span>
                                </a>
                            </div>
                        </div>
                        <!-- <div>
                            <div>Forgot Password ? <i class="fa fa-arrow-right"></i><a
                                    href="forgot_password.php?forgot=<?php //echo uniqid(); 
                                                                        ?>" class="text-info">
                                    <span style="font-size:larger; color:#F28123;">Reset</span>
                                </a>
                            </div>
                        </div> -->
                        <div>
                            <div>Don't have an account ? <i class="fa fa-arrow-right"></i><a href="register.php"
                                    class="text-info">
                                    <span style="font-size:larger; color:#F28123;">Register</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php login_users(); ?>