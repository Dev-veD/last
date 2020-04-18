
<?php require_once APPROOT.'/views/includes/header.php';
$cnt=0;?>
<div class="card">
    <div class="card-header">
        <h4>Data Set Of Patients</h4>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"  href="<?php echo URLROOT;?>CovidNearYou">Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT;?>CovidNearYou/location">Location</a>
            </li>
        </ul>
    </div>
    <hr>
   <h1>Patient data</h1>
   <hr>
   <div class="container">
   <section class="p-t-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive m-b-30">
                        <table id="tabledata" class="table table-borderless">
                            <thead>
                                <tr>
                                    <th class="text-center">Sno.</th></a>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">District</th>
                                    <th class="text-center">Date</th> 
                                    <th class="text-center">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt=1;?>
                                <?php foreach($data as $entity):?>  
                                   <?php if($entity->type=="Patient"||$entity->type=="patient"):?>
				     <tr>
                                        <td scope="row"><?php echo $cnt++;?></td>
                                        <td class="text-center"><?php echo $entity->patientnumber;?></td>
                                        <td class="text-center"><?php echo $entity->currentstatus;?></td>
                                        <td class="text-center"><?php echo $entity->district;?></td>
                                        <td class="text-center"><?php echo $entity->dateannounced;?></td>
                                        <td class="text-center"><button type="button" id="<?php echo $entity->patientnumber;?>" class="btn btn-success clicker">View</button></td>
                                    </tr>
				<?php endif;?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </div>
</div>

<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">Patient Detail</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body text-left">
                            

         <h1 >Patient ID : <span id='PatientID'></span></h1>
         <hr>
         <div class="row">
             <div class="col col-md-4">
                 <img src="images/profile.svg" >
            </div>
            <div class="col col-md-8">
            <div class="table-responsive table--no-card m-b-10">
                                    <table class="table table-borderless table-data3">
                                        
                                        <tbody>
                                            <tr>
                                                <td><h4>Patient ID</h4></td>
                                                <td><span id="pid"></span></td>
                                        </tr>
                                        <tr>
                                                <td><h4>Gender</h4></td>
                                                <td><span id="gender"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Nationality</h4></td>
                                                <td><span id="nation"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Status</h4></td>
                                                <td><span id="status"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Status Change Date</h4></td>
                                                <td><span id="scd"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>City</h4></td>
                                                <td><span id="city">txt</span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>District</h4></td>
                                                <td><span id="district"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>State</h4></td>
                                                <td><span id="state"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Date Detected</h4></td>
                                                <td><span id="ddate"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Notes</h4></td>
                                                <td><span id="notes"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Backup Notes</h4></td>
                                                <td><span id="bnotes"></span></td>
                                                </tr>
                                        <tr>
                                                <td><h4>Transmission Type</h4></td>
                                                <td><span id="transmission"></span></td>     
                                            </tr>
                                            
                                        
                                        </tbody>
                                    </table>
                                </div> 
            </div>
            

         </div>    

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
						
						</div>
					</div>
				</div>
            </div>

<script>
var deaths=0,active=0,recovered=0; 
$(document).ready(function(){

$('.clicker').click(function(){
  
  var userid = $(this).attr('id');
   
  // AJAX request
  $.ajax({
   url: 'CovidNearYou/loadPatientModal',
   type: 'post',
   data: {userid: userid},
   success: function(response){ 
     // Add response in Modal body
   
     var obj = JSON.parse(response);

     //$('#PatientID').html(response.patientnumber);
  
     console.log(obj.backnotes); 
     $('#bnotes').html(obj.backnotes);    
     $('#notes').html(obj.notes);  
    
     $('#gender').html(obj.gender);  

     $('#pid').html(obj.patientnumber);  

     if(obj.nationality =="")
     obj.nationality = "Unknown";
    $('#nation').html(obj.nationality);  

    if(obj.currentstatus =="")
    obj.currentstatus = "Unknown";
    $('#status').html(obj.currentstatus); 
    
    if(obj.statuschangedate =="")
    obj.statuschangedate = "Unknown";
    $('#scd').html(obj.statuschangedate); 


    if(obj.city =="")
    obj.city = "Unknown";
    $('#city').html(obj.city); 
    
    
    if(obj.district =="")
    obj.district = "Unknown";
    $('#district').html(obj.district); 

    if(obj.state =="")
    obj.state = "Unknown";
    $('#state').html(obj.state); 

    
    if(obj.dateannounced =="")
    obj.dateannounced = "Unknown";
    $('#ddate').html(obj.dateannounced); 

    if(obj.dateannounced =="")
    obj.dateannounced = "Unknown";
    $('#ddate').html(obj.dateannounced); 

    if(obj.transmissiontype =="")
    obj.transmissiontype = "Unknown";
    $('#transmission').html(obj.transmissiontype); 

    

     // Display Modal
     $('#patientModal').modal('show'); 

   }
 });
});
});
    </script>


<script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable({
     'paging':true,
     "iDisplayLength": 100,
     'responsive':true,
     'language':{
           search:"_INPUT_",
           searchPlaceholder:"Search Records"
     },
     'columnDefs':[
       {
         "targets":[0,4,5],
         "searchable":false
       }
     ]  
    });
} );
</script>

<?php require_once APPROOT.'/views/includes/footer.php';?>
