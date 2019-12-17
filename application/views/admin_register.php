<?php include 'header.php'; ?>
<style type="text/css">
	.error {
        color: white;
     }
</style>
<div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db" style="color: white;font-size: 25px;">Sign-up</span>
                    </div>
                    <span style="color: white;font-size: 15px;"><?php echo $this->session->flashdata('message'); ?></span>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" method="post" id="signup-form" action="<?php echo base_url();?>superadmin/superadmin_register">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                         <input type="submit" class="btn btn-lg btn-success" name="register"  value="Register"/><br>
                                        <span style="color: white;">Already Registered <a href="<?php echo base_url();?>superadmin/index">Click her for sign-in</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('#signup-form').validate({

     rules: {
                    username: {
                        required : true,
                        minlength: 3
                    },

                    email: {
                        required : true,
                            email: true,
                          // remote: {
                          //       url: "Checkemail_emailexit",
                          //       type: "post"   
                          //   }

                    },

                    password: {
                        required : true,
                        minlength: 5
                    },

                }, // end of rules
 messages: {
                    username: {
                        required : "Username must is required",
                        minlength: "First Name must contain at least 3 characters"
                    },

                    email: {
                        required : "Email must is required",
                        email: "Enter a valid email"
                       // remote: "Email already register."
                    },
                 
                } // message tag end        
});
});
</script>


<?php include 'footer.php'; ?>