<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>"> 
    </head>
    <body>
        <div class="container" style="width:550px;height:380px ; background-color: gainsboro;margin-top: 15px;">
            <?php //echo validation_errors(); ?>  
            <div class="content-wrapper"> 
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="text-align: center">Login</h3>
                                </div>

                                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('login/check_login_details') ?>">                               
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                            <input type="text" class="form-control" name="username" id="username"  value="" placeholder="Enter User Name">
                                            <span style="color: red">
                                                <?php echo form_error('username'); ?></span>

                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter Password">
                                            <span style="color: red">
                                                <?php echo form_error('password'); ?>
                                            </span>
                                        </div>




                                        <?php
                                        if (!empty($msg)) {
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Wrong</strong> Username/Password,please enter correct username/password.
                                            </div>

                                            <?php
                                        }
                                        ?>

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Check me out
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>

            </div> 
        </div>
    </body>
</html>


