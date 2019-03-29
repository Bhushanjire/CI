<!DOCTYPE html>
<?php
$base_path = base_url('assets/');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="row">
                        <div class="col-xs-8">
                            <h3 class="box-title">Staff List</h3>
                        </div>
                        <div class="col-xs-4 float-right">
                            <a href="<?= base_url('staff/add_edit_staff/add_edit_staff') ?>"> <button type="button" class="btn btn-block btn-primary" style="width:20%">Add</button></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="30%">Name</th>
                                    <th width="20%">Email</th>
                                    <th width="10%">Mobile</th>
                                    <th width="20%">Photo</th>
                                    <th width="10%">Added Date</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($staff_list AS $staff_data) {
                                    ?>
                                    <tr>
                                        <td><?= $staff_data->staff_id ?></td>
                                        <td><?= $staff_data->first_name . " " . $staff_data->last_name ?></td>
                                        <td><?= $staff_data->email_id ?></td>
                                        <td><?= $staff_data->mobile_no ?></td>
                                        <td>
                                            <img src="<?= base_url("uploads/$staff_data->photo") ?>" style="width:50%;height: 20%">
                                        </td>
                                        <td><?= date('d/m/Y',  strtotime($staff_data->added_date_time)) ?></td>
                                        <td>
                                            <a href="<?php echo base_url("staff/add_edit_staff/add_edit_staff/$staff_data->staff_id") ?>"> <span class="glyphicon glyphicon-pencil cursor_point"></span></a>&nbsp;&nbsp;
                                            <a href="<?php echo base_url("staff/delete_staff/$staff_data->staff_id") ?>"><span class="glyphicon glyphicon-trash cursor_point"></span></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Photo</th>
                                    <th>Added Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

</div>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>