<?php include 'header.php'; ?>
<style type="text/css">
	.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>

<div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
<div class="auth-wrapper d-flex no-block justify-content-center bg-dark" style="padding-top: 20px;">
	        <div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>This is a Registration Form For Bakcend User.</p>
                </div>
                <form method="post" action="<?php echo base_url()?>superadmin/data_insert">
                <div class="form-content">	
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                        <!-- get data form database form school table -->
                            	<select name="school_id" class="form-control">
                            		<option>Plese Select Your School</option>
                            		<?php 

                                    $query = $this->db->get('wp_school');
                                    foreach ($query->result() as $row) :
                                    $school_id = $row->id;	
                                    ?>
                            		<option value="<?php echo $school_id;?>"><?php echo $row->school_name;?></option>
                            	<?php endforeach; ?>
                            	</select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="login_name" placeholder="login_name" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="role" placeholder="role" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" placeholder="password" value=""/>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="first name" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="email" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="last name" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password" value=""/>
                            </div>
                        </div>
                    </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="mobile" placeholder="mobile" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="doj" placeholder="date of join" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="dob" placeholder="date of birth" value=""/>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-info btn-lg">
                </div>
            </form>
            </div>
        </div>
</div>
</div>        
  






<?php include 'footer.php'; ?>