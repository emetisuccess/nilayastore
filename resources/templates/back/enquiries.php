<!-- Page Heading -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header">All Enquiries</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-3"><?php display_message(); ?></div>
    <div class="col-md-12">
        <table class="table table-hover table-bordered table-condensed">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php enquiry(); ?></tbody>
        </table>
    </div>
</div>
<!-- /.row -->