<?php 
    Class Quarantine extends Controller{
     
        public function __construct()
        {
            if (!adminLoggedIn()) {
            $url = URLROOT . 'Admine';
            header('location:' . $url);
        }
            $this->Admin=$this->model('Admin');
        }
        public function index()
        {
            $this->Admin->saveJson();
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $data=[
                    'id'=>$_POST['id'],
                    'homequarantine'=>$_POST['home'],
                    'facilityquarantine'=>$_POST['facility']
                ];
                if($this->Admin->updateQuarantine($data))
                {
                    echo '<script>alert("Data updated successfully");document.location="'.URLROOT.'Quarantine"</script>';  
                }
                else
                {
                     echo '<script>alert("Some Error Occurred! Try Again!");document.location="'.URLROOT.'Quarantine"</script>';  
                }
                //update Data here.
            }
            else
            {
                $data=$this->Admin->getQuarantineData();
                $this->views('admin/quarantine',$data);
            }
        }

    }
?>