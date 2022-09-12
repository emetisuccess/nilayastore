<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">All Reports</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"><?php display_message(); ?></div>
    <div class="col-md-12">
        <table class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Date Ordered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //get_reports(); 
                $report_count = query("SELECT * FROM reports");
                $count = mysqli_num_rows($report_count);

                $result_per_page = 7;

                $number_per_page = ceil($count / $result_per_page);

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $first_page_result = ($page - 1) * $result_per_page;

                $query = query("SELECT * FROM reports ORDER BY report_id DESC LIMIT " . $first_page_result . ", " . $result_per_page . "");
                confirm($query);
                while ($row = fetch_array($query)) {
                    $report_data = <<<DELIMETER
                    <tr>
                    <td>{$row['report_id']}</td>
                    <td>{$row['product_title']}</td>
                    <td>&#36;{$row['product_price']}</td>
                    <td>{$row['product_quantity']}</td>
                    <td>{$row['date_created']}</td>
                    <td><a href='../../resources/templates/back/delete_report.php?p_id={$row['report_id']}' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
                    </tr>
                    DELIMETER;
                    echo $report_data;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<ul class="pager">
    <?php for ($i = 1; $i <= $number_per_page; $i++) {
        if ($i == $page) : ?>
    <li>
        <a href="/e_commerce/public/admin/index.php?reports&page=<?php echo $i; ?>"
            style="background:black;"><?php echo $i; ?></a>
    </li>
    <?php else : ?>
    <li>
        <a href="/e_commerce/public/admin/index.php?reports&page=<?php echo $i; ?>"><?php echo $i; ?></a>
    </li>
    <?php
        endif;
    } ?>
</ul>
<!-- /.row -->