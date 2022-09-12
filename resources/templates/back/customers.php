<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">All Customers</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"><?php display_message(); ?></div>
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-condensed">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>User role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php //get_customers(); 
                $users_query = query("SELECT * FROM users");
                $count = mysqli_num_rows($users_query);

                $result_per_page = 10;

                $number_per_page = ceil($count / $result_per_page);

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $first_page_result = ($page - 1) * $result_per_page;

                $query = query("SELECT * FROM users ORDER BY user_id DESC LIMIT " . $first_page_result . ", " . $result_per_page . "");
                confirm($query);
                while ($row = fetch_array($query)) {
                    $customers = <<<DELIMETER
                <tr>
                <td>{$row['user_id']}</td>
                <td>{$row['user_firstname']} {$row['user_lastname']}</td>
                <td>{$row['username']}</td>
                <td>{$row['user_email']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['user_address1']}</td>
                <td>{$row['user_city']}</td>
                <td>{$row['user_state']}</td>
                <td>{$row['user_role']}</td>
                <td><a href="/e_commerce/public/admin/index.php?customers&c_id={$row['user_id']}" class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a></td>
                </tr>
                DELIMETER;
                    echo $customers;
                }
                ?>
            </tbody>
        </table>

        <?php if (isset($_GET['c_id'])) {
            $query = query("SELECT * FROM users WHERE user_id=" . escape_string($_GET['c_id']) . "");
            confirm($query);
            while ($row = fetch_array($query)) :
        ?>
        <div class="col-md-4">
            <form action="" method="POST">
                <div class="form-group">
                    <select name="user_role" id="" class="form-control">
                        <option value="<?php echo $row['user_role']; ?>">
                            <?php echo strtoupper($row['user_role']); ?>
                        </option>
                        <option value="admin">Admin</option>
                        <option value="subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <input type="submit" name="update_user" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
        <?php
            endwhile;
        }
        edit_customer();
        ?>
    </div>
</div>
<!-- /.row -->

<ul class="pager">
    <?php for ($i = 1; $i <= $number_per_page; $i++) {
        if ($i == $page) : ?>
    <li><a href="/e_commerce/public/admin/index.php?customers&page=<?php echo $i; ?>"
            style="background-color:black;"><?php echo $i; ?></a></li>
    <?php else : ?>
    <li><a href="/e_commerce/public/admin/index.php?customers&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php
        endif;
    } ?>
</ul>