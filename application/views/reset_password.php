<?php include 'header.php'; ?>
<?php $user_id = $this->uri->segment('3') ?>
<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db" style="color: white;font-size: 20px;">Change Password</span>
                    </div>
                     <div class="text-center">
                        <span class="text-white">Enter a new password for change your current password</span>
                    </div>
                     <span><?php if($error = $this->session->flashdata('update')){ ?>
                                <p style="color: red;"><strong>Success!</strong> <?php echo  $error; ?><p>
                                <?php } ?></span>
                    <!--  <span style="color: white;font-size: 15px;"><?php echo $this->session->flashdata('login_failed'); ?></span> -->
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" method="post" action="<?php echo base_url();?>superadmin/update_password">
                        <div class="row p-b-30">
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">    

                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                    <input type="submit" class="btn btn-info" name="update" value="Update"/>
                                    <span style="color: white;"><a href="<?php echo base_url();?>superadmin/index"
                                    class="btn btn-success float-right"	>Back To Login</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>

    </div>


<?php include 'footer.php'; ?>