<?php 

class CovidNearYou extends Controller{


   
     public function __construct()
     {
         $this->mod=$this->model('CovidNearYouModel');
     }

     public function index()
     {
         //$this->mod->saveJson();
         $data = $this-> mod ->getTableData();
        
         $this->views('user/covidnearyou',$data);
     }

     public function loadPatientModal(){
         $id = $_POST['userid'];
         $data = $this->mod->getPatient($id);
         $val = json_encode($data);
         
         echo $val;
     }

     public function location()
     {
         $this->views('user/location');
     }
}


?>
