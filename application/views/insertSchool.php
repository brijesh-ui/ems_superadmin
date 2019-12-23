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
                            <form class="form-horizontal" id="signup-form" method="post" action="<?php echo base_url()?>superadmin/insert_School">
                                <div class="card-body">
                                    <h4 class="card-title">Insert School Name.</h4>
                                     <span style="color: black;font-size: 15px;"><?php echo $this->session->flashdata('message'); ?></span>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">School Name<span class="astrix">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="school_name" id="school_name" placeholder="School Name" value="" />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$('#signup-form').validate({

     rules: {
                    school_name: {
                        required : true,
                          remote: {
                                url: "<?php echo base_url();?>superadmin/CheckschoolName",
                                type: "post"   
                            }

                    },



                }, // end of rules
 messages: {
              
                    school_name: {
                        required : "Plese Provide Your School Name",
                        remote: "School Name is already exit,Plese Enter Another Name"
                    },
                 
         } // message tag end        
});     

});
    
</script>



<?php include 'footer.php'; ?>