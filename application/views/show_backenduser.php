<?php include 'header.php'; ?>
<?php include 'rightmenu.php'; ?>
<div class="page-wrapper">
<div class="container-fluid"> 
    <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">User Data</h5>
                                <div class="table-responsive">
                                    <table id="data_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>School Name</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Mobile</th>
                                                <th>DOB</th>
                                                <th>DOJ</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $query = $this->db->select('*')
                                                          ->from('wp_backend_user')
                                                          ->join('wp_school',
                                                          	'wp_school.id=wp_backend_user.school_id')
                                                          ->get();
                                        foreach ($query->result() as $row) :

                                        ?>
                                            <tr>
                                                <td><?php echo $row->login_name ?></td>
                                                <td><?php echo $row->role ?></td>
                                                <td><?php echo $row->school_name ?></td>
                                                <td><?php echo $row->first_name ?></td>
                                                <td><?php echo $row->last_name ?></td>
                                                <td><?php echo $row->user_email ?></td>
                                                <td><?php echo $row->user_phone ?></td>
                                                <td><?php echo $row->user_mobile ?></td>
                                                <td><?php echo $row->user_dob ?></td>
                                                <td><?php echo $row->user_doj ?></td>
                                                <td><?=  anchor("superadmin/showedit_data/{$row->user_id}",'Edit',['class'=>'btn btn-default']);  ?></td>
                                            </tr>
                                        <?php endforeach; ?>    
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                      </div>
                    </div>    
</div>       
</div>                  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
    $('#data_table').DataTable();
});
       
</script>
<?php include 'footer.php'; ?>