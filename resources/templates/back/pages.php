<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">All Pages</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"><?php display_message(); ?></div>
    <div class="col-md-12">
    
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