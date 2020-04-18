<?php require_once APPROOT . '/views/includes/headn.html'; ?>
<?php include 'headd.html'; ?>
<section class="au-breadcrumb m-t-0">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="<?php echo URLROOT;?>Patient">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Hotspot</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
        <div md-5 mt-2 align="right">
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addhotspot"><i class="fa fa-plus"></i> Add New Hotspot </Button>
        </div>


        <div class="card card-body bg-light md-5 mt-2 mb-5 table-responsive-md">
            <h1 class="text-center mt-2 mb-5 "> Hotspot Areas List</h1>
            <table id="tableid" class="table table-striped table-hover mb-5" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Locality</th>
                    <th scope="col">District</th>
                    <th scope="col">Active</th>
                    <th scope="col">Recovered</th>
                    <th scope="col">Deceased</th>
                    <th scope="col">Home Quarantine</th>
                    <th scope="col">Facility Quarantine</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th style="visibility:hidden;">id</th>
                </tr>
                </thead>
                <tbody>
                <?php $key=1;?>
                <?php foreach($data['res'] as $result) : ?>
                <tr>
                    <td scope="row"><?php echo $key++;?></td>
                    <td><?php echo $result->city;?></td>
                    <td><?php echo $result->district;?></td>
                    <td><?php echo $result->active;?></td>
                    <td><?php echo $result->recovered;?></td>
                    <td><?php echo $result->deceased;?></td>
                    <td><?php echo $result->homequarantine;?></td>
                    <td><?php echo $result->facilityquarantine;?></td>
                    <td><?php echo $result->latitude;?></td>
                    <td><?php echo $result->longitude;?></td>
                    <td><button type="button" class="btn btn-success editbtn"><i class="fa fa-edit"></i></button></td>
                    <td><button type="button" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i> </button></td>
                    <td style="visibility:hidden;" class="bg-dark"><?php echo $result->id;?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
</div>


        <!-- ADD MODAL -->
        <div class="modal fade" id="addhotspot" tabindex="-1" role="dialog" aria-labelledby="addhotspotmodal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addhotspotmodal">Add New Hotspot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo URLROOT;?>Gatherings" method="post">
                    <div class="modal-body">
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputcity">Locality/City</label>
                                        <input type="text" class="form-control" id="inputcity" name="city">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputdistrict">District*</label>
                                        <input type="text" class="form-control" id="inputdistrict" name="district" required>
                                    </div> 
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputlatitude">Latitude*</label>
                                        <input type="text" class="form-control" id="inputlatitude" name="latitude" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputlongitude">Longitude*</label>
                                        <input type="text" class="form-control" id="inputlongitude" name="longitude" required>
                                    </div> 
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputactive">Active Cases*</label>
                                        <input type="text" class="form-control" id="inputactive" name="active" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputrecovered">Recovered Cases*</label>
                                        <input type="text" class="form-control" id="inputrecovered" name="recovered" required>
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="inputdeceased">Deceased Cases*</label>
                                        <input type="text" class="form-control" id="inputdeceased" name="deceased" required>
                                    </div> 
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputhome">Home Quarantine*</label>
                                        <input type="text" class="form-control" id="inputhome" name="homequarantine" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputfacility">Facility Quarantine*</label>
                                        <input type="text" class="form-control" id="inputfacility" name="facilityquarantine" required>
                                    </div> 
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addsubscriber" class="btn btn-primary">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

<!-- DELETE MODAL -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo URLROOT;?>Gatherings/deleteHotspot" method="post">
          <div class="modal-body">
                      <input  type="hidden" id="deleteid" class="form-control" name="id">
                      <h6>Are you sure you want to delete data?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" name="deletedata" class="btn btn-primary">YES</button>
          </div>
          </form>
        </div>
      </div>
    </div>


<!-- Edit MODAL -->
<div class="modal fade" id="edithotspot" tabindex="-1" role="dialog" aria-labelledby="addhotspotmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addhotspotmodal">Edit Hotspot</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo URLROOT;?>Gatherings/editHotspot" method="post">
            <div class="modal-body">
                    <div class="form-row">
                          
                      <input  type="hidden" id="editid" class="form-control" name="id">
                            <div class="form-group col-md-6">
                                <label for="editinputcity">Locality/City</label>
                                <input type="text" class="form-control" id="editinputcity" name="city">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editinputdistrict">District*</label>
                                <input type="text" class="form-control" id="editinputdistrict" name="district" required>
                            </div> 
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editinputlatitude">Latitude*</label>
                                <input type="text" class="form-control" id="editinputlatitude" name="latitude" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editinputlongitude">Longitude*</label>
                                <input type="text" class="form-control" id="editinputlongitude" name="longitude" required>
                            </div> 
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="editinputactive">Active Cases*</label>
                                <input type="text" class="form-control" id="editinputactive" name="active" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="editinputrecovered">Recovered Cases*</label>
                                <input type="text" class="form-control" id="editinputrecovered" name="recovered" required>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="editinputdeceased">Deceased Cases*</label>
                                <input type="text" class="form-control" id="editinputdeceased" name="deceased" required>
                            </div> 
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editinputhome">Home Quarantine*</label>
                                <input type="text" class="form-control" id="editinputhome" name="homequarantine" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="editinputfacility">Facility Quarantine*</label>
                                <input type="text" class="form-control" id="editinputfacility" name="facilityquarantine" required>
                            </div> 
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addsubscriber" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script> -->
<srcipt type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script
type="text/javascript" 
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script type="text/javascript">
$(document).ready(function () {
   $('#tableid').on('click','.deletebtn',function () {
       $('#deletemodal').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#deleteid').val(data[12]);
   });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
   $('#tableid').on('click','.editbtn',function () {
       $('#edithotspot').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#editid').val(data[12]);
       $('#editinputcity').val(data[1]);
       $('#editinputdistrict').val(data[2]);
       $('#editinputlatitude').val(data[8]);
       $('#editinputlongitude').val(data[9]);
       $('#editinputactive').val(data[3]);
       $('#editinputrecovered').val(data[4]);
       $('#editinputdeceased').val(data[5]);
       $('#editinputhome').val(data[6]);
       $('#editinputfacility').val(data[7]);
   });
});
</script>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
