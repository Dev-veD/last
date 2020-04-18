<?php 

 class Gatherings extends Controller{

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
              'city'=>$_POST['city'],
              'district'=>$_POST['district'],
              'latitude'=>$_POST['latitude'],
              'longitude'=>$_POST['longitude'],
              'active'=>$_POST['active'],
              'recovered'=>$_POST['recovered'],
              'deceased'=>$_POST['deceased'],
              'homequarantine'=>$_POST['homequarantine'],
              'facilityquarantine'=>$_POST['facilityquarantine']
            ];
            // var_dump($data);
            // die();  
            if($this->Admin->addNewHotspot($data))
            {
                echo '<script>alert("Data updated successfully");document.location="'.URLROOT.'Gatherings"</script>';  
            }
            else
            {
                echo '<script>alert("Some Error Occurred! Try Again!");document.location="'.URLROOT.'Gatherings"</script>';  
            }
          }  
          else
          {
                $res=$this->Admin->getHotspotData();  
                $data=[
                    'res'=>$res
                ];
                $this->views('admin/gatherings',$data);
          } 
    }

    public function deleteHotspot()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
           $id=$_POST['id'];
           if($this->Admin->deleteHotspot($id)){
            echo '<script>alert("Data deleted successfully");document.location="'.URLROOT.'Gatherings"</script>';  
           }
           else{
            echo '<script>alert("Something Went wrong");document.location="'.URLROOT.'Gatherings"</script>';  
           }

        }
        else
        {
            echo '<script>alert("unknown operation");document.location="'.URLROOT.'Gatherings"</script>';     
        }
    }

    public function editHotspot()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $data=[
                'id'=>$_POST['id'],
                'city'=>$_POST['city'],
                'district'=>$_POST['district'],
                'latitude'=>$_POST['latitude'],
                'longitude'=>$_POST['longitude'],
                'active'=>$_POST['active'],
                'recovered'=>$_POST['recovered'],
                'deceased'=>$_POST['deceased'],
                'homequarantine'=>$_POST['homequarantine'],
                'facilityquarantine'=>$_POST['facilityquarantine']
              ];
           if($this->Admin->editHotspot($data)){
            echo '<script>alert("Hotspot updated successfully");document.location="'.URLROOT.'Gatherings"</script>';  
           }
           else{
            echo '<script>alert("Something Went wrong");document.location="'.URLROOT.'Gatherings"</script>';  
           }

        }
        else
        {
            echo '<script>alert("unknown operation");document.location="'.URLROOT.'Gatherings"</script>';     
        }
    }
 }