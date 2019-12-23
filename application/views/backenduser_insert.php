<?php include 'header.php'; ?>
<?php include 'rightmenu.php'; ?>
<style type="text/css">

.error{
    color: red;
    }
.astrix{
    color: red;
}
</style>
 <div class="page-wrapper">
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
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">School Name<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                           <select name="school_id" id="school_id" class="form-control">
                            		<option>Choose School Name</option>
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
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Role<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                             <select class="form-control" name="role" id="role" required>
                               	   <option>Choose Role</option>
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
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Login Name<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                           <input type="text" class="form-control" name="login_name" id="login_name" placeholder="Login Name" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Password<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                           <input type="password" class="form-control" name="password" id="password" placeholder="Password" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">First Name<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Last Name<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                           <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Email<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                           <input type="email" class="form-control" name="user_email" id="user_email" placeholder="User Email" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Phone</label>
                                        <div class="col-sm-6">
                                           <input type="tel" class="form-control" name="user_phone" id="user_phone" placeholder="User Phone" minlength="10" maxlength="12" value=""/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">User Mobile<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="tel" class="form-control" name="user_mobile" id="user_mobile" placeholder="User Mobile" minlength="10" maxlength="12" value=""/>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Date Of Join<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="user_doj" id="user_doj" placeholder="Date Of Join" value="" onfocus="(this.type='date')"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Date Of Birth<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="user_dob" id="user_dob" placeholder="Date Of Birth" value="" onfocus="(this.type='date')"/>
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
                                url: "<?php echo base_url();?>DataShow/Checkemail_userbackend",
                                type: "post"   
                            }

                    },

                    login_name: {
                     required : true,
                     minlength: 3,
                        remote: {
                                url: "<?php echo base_url();?>DataShow/Checkloginname_userbackend",
                                type: "post"   
                            }
                    },

                    first_name:{
                        required : true
                    },

                    last_name:{
                        required : true
                    },

                     user_mobile:{
                        required : true,
                        number : true
                    },

                    password:{
                        required : true,
                        minlength:8,

                    },

                     user_dob:{
                        required : true
                    },
                     user_doj:{
                        required : true
                    },
                    user_phone:{
                         number : true
                    },

                    

                }, // end of rules
 messages: {
              
                    user_email: {
                        required : "Plese Provide Email Address",
                        email: "Plese Enter a Valid Email, Ex-Jhon@gmail.com",
                        remote: "Email Is Already Exit, Enter a Valid Email"
                    },

                    login_name: {
                        required : "Plese Provide Login Name",
                        minlength: "Login Name Must Be At Least 3 Digit",
                           remote: "Login Name Is Already Exit, Enter a Valid Name"
                    },

                    school_id:{
                        required : "Plese Choose School Name"
                    },

                    first_name:{
                        required : "Plese Provide First Name"
                    },

                    last_name:{
                        required : "Plese Provide Last Name"
                    },

                    password:{
                        required : "Plese Provide A Valid Password",
                        minlength: "Password  Must Be At Least 8 Digit"
                    },

                    user_mobile:{
                        required : "Plese Provide Your Mobile",
                        number : "Plese Enter Only Number, Ex- 1234567890"
                    },
                    user_dob:{
                        required : "Plese Provide Your Date Of Birth"
                    },
                    user_doj:{
                        required : "Plese Provide Your Date Of Joining"
                    },
                    user_phone:{
                         number : "Plese Enter Only Number, Ex- 1234567890"
                    },
                    
                 
         } // message tag end        
});     

});
    
</script>

<?php include 'footer.php'; ?>