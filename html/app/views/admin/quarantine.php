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
                                <li class="list-inline-item">Quarantine</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">

        <div class="card card-body bg-light md-5 mt-2 mb-5 table-responsive-md">
            <h1 class="text-center mt-2 mb-5 "> Quarantine Data</h1>
            <table id="tableid" class="table table-striped table-hover mb-5" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">District</th>
                    <th scope="col">Home Quarantine</th>
                    <th scope="col">Facility Quarantine</th>
                    <th scope="col">Edit</th>
                    <th style="visibility:hidden;">id</th>
                </tr>
                </thead>
                <tbody>
                <?php $key=1;?>
                <?php foreach($data as $result) : ?>
                <?php if($result->district!='Total'&&$result->district!='Unknown'):?>
                <tr>
                    <td scope="row"><?php echo $key++;?></td>
                    <td><?php echo $result->district;?></td>
                    <td><?php echo $result->quarantined_home;?></td>
                    <td><?php echo $result->quarantined_government;?></td>
                    <td><button type="button" class="btn btn-success editbtn"><i class="fa fa-edit"></i></button></td>
                    <td style="visibility:hidden;" class="bg-dark"><?php echo $result->id;?></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
</div>


<!-- Edit MODAL -->
<div class="modal fade" id="editquarantine" tabindex="-1" role="dialog" aria-labelledby="addhotspotmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addhotspotmodal">Edit Quarntine Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo URLROOT;?>Quarantine" method="post">
            <div class="modal-body">
                    <div class="form-row">
                            <input  type="hidden" id="id" class="form-control" name="id">
                            <div class="form-group col-md-6">
                                <label for="homequarantine">Home Quarantine*</label>
                                <input type="text" class="form-control" id="homequarantine" name="home">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="facilityquarntine">Facility Quarantine*</label>
                                <input type="text" class="form-control" id="facilityquarantine" name="facility" required>
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
   $('#tableid').on('click','.editbtn',function () {
       $('#editquarantine').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('#id').val(data[5]);
       $('#homequarantine').val(data[2]);
       $('#facilityquarantine').val(data[3]);
   });
});
</script>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
