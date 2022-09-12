<?php include("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<div class="eme">
    <div class="container">
        <div class="row center">
            <div class="col-lg-6 my-5">
                <div class="card my-5" style="border-radius: 30px;">
                    <h3 class=" m-3 text-center" style="display: flex; align-items:center; justify-content:center">
                        Register
                    </h3>
                    <hr>
                    <div class="text-center"><?php display_message(); ?></div>
                    <div class=" card-body">
                        <form action="register.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="firstname" class="form-control" placeholder="Firstname"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lastname" class="form-control" placeholder="Lastname"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Username" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="confirmpwd" class="form-control"
                                                    placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="mobile" class="form-control" placeholder="mobile" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address1" class="form-control" placeholder="Street Address 1"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address2" class="form-control" placeholder="Street Address 2">
                            </div>
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="State" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="zip" class="form-control" placeholder="Zipcode" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="user_register" value="Register"
                                    class="btn btn-block btn-sm ">
                            </div>
                        </form>
                        <div>Already have an account ? <i class="fa fa-arrow-right"></i><a href="login"
                                class="text-info">
                                <span style="font-size:larger; color:#F28123;">Login</span>
                            </a>
                        </div>
                        <div class="form-group">
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
<?php register_user(); ?>