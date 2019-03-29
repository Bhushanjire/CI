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
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Staff</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <?php
                if(!empty($staff_list)){       
                    $staff_id = $staff_list[0]->staff_id;
                    $first_name = $staff_list[0]->first_name;
                    $last_name = $staff_list[0]->last_name;
                    $email_id = $staff_list[0]->email_id;
                    $mobile_name = $staff_list[0]->mobile_no;
                }
            ?>
            
            
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('staff/insert_update_staff')?>">
                <input type="hidden" value="<?php echo (isset($staff_id))? $staff_id : ''; ?>" name="staff_id" id="staff_id">
              <div class="box-body">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" id="first_name"  value="<?php echo (isset($first_name))? $first_name : ''; ?>" placeholder="Enter First Name">
                </div>
                  <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo (isset($last_name))? $last_name : ''; ?>" placeholder="Enter Last Name">
                </div>
                  <div class="form-group">
                  <label for="email_id">Email ID</label>
                  <input type="email" class="form-control" name="email_id" id="email_id" value="<?php echo (isset($email_id))? $email_id : ''; ?>" placeholder="Enter Email ID">
                </div>
                  <div class="form-group">
                  <label for="mobile_no">Mobile No.</label>
                  <input type="text" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo (isset($mobile_name))? $mobile_name : ''; ?>" placeholder="Enter Mobile No.">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="photo" name="photo">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
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