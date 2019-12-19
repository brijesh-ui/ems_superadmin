<?php include 'header.php'; ?>
<?php include 'rightmenu.php'; ?>

 <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                  
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" id="signup-form" method="post" action="<?php echo base_url()?>superadmin/insert_School">
                                <div class="card-body">
                                    <h4 class="card-title">Insert School Name.</h4>
                                     <span style="color: black;font-size: 15px;"><?php echo $this->session->flashdata('message'); ?></span>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">School Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="school_name" id="school_name" placeholder="School Name" value="" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                       <input type="submit" name="submit" value="Submit" class="btn btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
 
            </div>
</div>


<?php include 'footer.php'; ?>