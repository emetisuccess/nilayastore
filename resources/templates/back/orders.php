<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">All Orders</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"><?php display_message(); ?></div>
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-condensed">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Amount &#36;</th>
                    <th>Transaction ID</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $order_count = query("SELECT * FROM orders");
                $count = mysqli_num_rows($order_count);

                $result_per_page = 15;

                $number_of_page = ceil($count / $result_per_page);

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $first_page_result = ($page - 1) * $result_per_page;


                $order_query = query("SELECT * FROM orders ORDER BY order_id DESC LIMIT " . $first_page_result . ", " . $result_per_page . "");
                confirm($order_query);
                while ($row = fetch_array($order_query)) {
                    $orders = <<<DELIMETER
                             <tr>
                             <td>{$row['order_id']}</td>
                             <td>{$row['order_amount']}</td>
                             <td>{$row['order_transaction']}</td>
                             <td>{$row['order_currency']}</td>
                             <td>{$row['order_status']}</td>
                             <td>{$row['order_date']}</td>
                             <td><a href='../../resources/templates/back/delete_order.php?remove={$row['order_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
                             </tr>
                     DELIMETER;
                    echo $orders;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<ul class="pager">
    <?php for ($i = 1; $i <= $number_of_page; $i++) {
        if ($i == $page) : ?>
    <li>
        <a href="/e_commerce/public/admin/index.php?orders&page=<?php echo $i; ?>"
            style="background-color: black;"><?php echo $i; ?></a>
    </li>
    <?php else : ?>
    <li>
        <a href="/e_commerce/public/admin/index.php?orders&page=<?php echo $i; ?>"><?php echo $i; ?></a>
    </li>
    <?php
        endif;
    } ?>
</ul>
<!-- /.row -->