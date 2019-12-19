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
                            <form class="form-horizontal" id="signup-form" method="post" action="<?php echo base_url()?>superadmin/data_insert">
                                <div class="card-body">
                                    <h4 class="card-title">This is a Registration Form For Bakcend User.</h4>
                                     <span style="color: white;font-size: 15px;"><?php echo $this->session->flashdata('message'); ?></span>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">School Name</label>
                                        <div class="col-sm-6">
                                           <select name="school_id" id="school_id" class="form-control">
                            		<option>Choose Your School</option>
                            		<?php 

                                    $query = $this->db->get('wp_school');
                                    foreach ($query->result() as $row) :
                                    $school_id = $row->id;	
                                    ?>
                            		<option value="<?php echo $school_id;?>"><?php echo $row->school_name;?></option>
                            	<?php endforeach; ?>
                            	</select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Role</label>
                                        <div class="col-sm-6">
                                             <select class="form-control" name="role" id="role">
                               	   <option>Choose Your Role</option>
                            <!-- data for choose role -->
                            <?php
                            $role	=	array(
														1	=> 'Super Admin',//fix
														2	=> 'Subsidiary Admin',//fix
														3	=> 'Branch Manager',//fix
														4	=> 'Teacher',
														5	=> 'Telemarketers',
														6	=> 'Roadshow manager',
														7	=> 'Customer service',
														8	=> 'Sales',
														9	=> 'Coordinator',
														10	=> 'Head trainer',
														11  => 'Staff'
														);
                            foreach ($role as $key => $row):
                          


                            ?>
                               	   <option value="<?php echo $key; ?>"><?php echo $row;?></option>
                               	<?php endforeach; ?>
                               </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Login Name</label>
                                        <div class="col-sm-6">
                                           <input type="text" class="form-control" name="login_name" id="login_name" placeholder="login_name" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-6">
                                           <input type="password" class="form-control" name="password" id="password" placeholder="password" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-6">
                                           <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Email</label>
                                        <div class="col-sm-6">
                                           <input type="email" class="form-control" name="user_email" id="user_email" placeholder="email" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Phone</label>
                                        <div class="col-sm-6">
                                           <input type="phone" class="form-control" name="user_phone" id="user_phone" placeholder="phone" value=""/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Mobile</label>
                                        <div class="col-sm-6">
                                            <input type="phone" class="form-control" name="user_mobile" id="user_mobile" placeholder="mobile" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Date Of Join</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="user_doj" id="user_doj" placeholder="date of join" value="" required onfocus="(this.type='date')"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Date Of Birth</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="user_dob" id="user_dob" placeholder="date of birth" value="" required onfocus="(this.type='date')"/>
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
<footer class="footer text-center">
 All Rights Reserved
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$('#signup-form').validate({

     rules: {
                    school_id: {
                        required : true
                    },

                    user_email: {
                        required : true,
                            email: true,
                          remote: {
                                url: "<?php echo base_url();?>superadmin/Checkemail_userbackend",
                                type: "post"   
                            }

                    },

                    login_name: {
                     required : true,
                     minlength: 3,
                        remote: {
                                url: "<?php echo base_url();?>superadmin/Checkloginname_userbackend",
                                type: "post"   
                            }
                    },

                     first_name: {
                        required : true,
                        minlength: 3
                    },

                    last_name: {
                        required : true,
                        minlength: 3
                    },

                    password: {
                        required : true,
                        minlength: 5
                    },

                    user_phone: {
                        required : true,
                        minlength: 3
                    },

                    user_mobile: {
                        required : true,
                        maxlength: 12    
                    },




                }, // end of rules
 messages: {
              
                    user_email: {
                        required : "Email must is required",
                        email: "Enter a valid email",
                        remote: "Email is already exit."
                    },

                    login_name: {
                        required : "login name must is required",
                        minlength: "minlength is 3",
                        remote: "login name is already exit."
                    },
                 
         } // message tag end        
});     

});
    
</script>

<?php include 'footer.php'; ?>