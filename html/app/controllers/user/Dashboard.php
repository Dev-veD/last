<?php 

class Dashboard extends Controller{

    protected $dataForView = ["table"=>"","notices"=>"","StatsTable"=>""];

     public function __construct()
     {
        
           $this->dashboardModel=$this->model('DashboardModel');
           
     }

     public function index()
     {  
         $this->getTotalData();
      
         $this->getNoticedData();
        
         $this->getDistrictTableData();
        
         $data=['tittle'=>'Dashboard'];
        
         $this->views('user/dashboard',$this->dataForView);
     }
     public function getNoticedData()
     {
       $notices = $this->dashboardModel->getAllNotice();
       $this->dataForView['notices'] = $notices;
     }
     public function getDistrictTableData(){
        $districtData = $this->dashboardModel->getAllDistrictData();
        $this->dataForView['table']=$districtData;
     }
     

     public function loadDistrictModal(){
         $district = $_POST['userid'];
         $data = $this->dashboardModel->getDistrictData($district);
         $val = json_encode($data);
       
         echo $val;
     }
     
     public function getTotalData(){
        $this->dataForView["StatsTable"]= $this->dashboardModel->getDistrictData("Total") ;
       
      
     }
}


?>