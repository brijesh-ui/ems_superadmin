<?php include 'header.php'; ?>  
<?php include 'rightmenu.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
<div class="page-wrapper">
<div class="container-fluid"> 
    <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All School Name</h5>
                                <div class="table-responsive">
                                    <table id="user_data" class="table table-bordered table-striped" style="text-align:center;">  
                                    <thead>  
                                      <tr>   
                                           <th>School Name</th>  
                                           <th>Edit</th>  
                                           <th>Delete</th>  
                                      </tr>  
                                    </thead>  
                            </table>  
                                </div>

                            </div>
                        </div>
                      </div>
                    </div>    
</div>       
</div>                  

<script>
$(document).ready(function(){  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url().'superadmin/fetch_school'; ?>",  
                type:"POST"  
           },  
          
      });  
 });  


</script>
<?php include 'footer.php'; ?>
