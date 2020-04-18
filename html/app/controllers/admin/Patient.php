<?php 

 class Patient extends Controller{

    protected $patientDetails=["Table"=>""];

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
            $this-> loadTable();

           $this->views('admin/patient',$this->patientDetails);
    }

    public function updateData(){
        $this -> Admin -> updatePatientData();
        Core::redirect('patient');
    }

    public function loadTable(){
        $this->patientDetails["Table"] =  $x =$this->Admin->getPatientData();
      
    }
    public function loadSearch(){
        
        $this->patientDetails["Table"] =  $x =$this->Admin->getSearchData();
    }
   public function bulkUploadData()
    {
        
        if (isset($_POST["importSubmit"])) {
            
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            if (!empty($_FILES['patientfile']['name']) && in_array($_FILES['patientfile']['type'], $csvMimes)) {
                if (is_uploaded_file($_FILES['patientfile']['tmp_name'])) {
                    $csvFile = fopen($_FILES['patientfile']['tmp_name'], 'r');
                    fgetcsv($csvFile);
                    $nt = 0;
                    while (($line = fgetcsv($csvFile)) !== FALSE) {
                        $data = [];
                        $data['patientnumber'] = !empty($line[0]) ? $line[0] : "";
                        $data['gender'] = !empty($line[1]) ? $line[1] : "";
                        $data['nationality'] = !empty($line[2]) ? $line[2] : "";
                        $data['currentstatus'] = !empty($line[3]) ? $line[3] : "";
                        $data['city'] = !empty($line[4]) ? $line[4] : "";
                        $data['district'] = !empty($line[5]) ? $line[5] : "";
                        $data['state'] = !empty($line[6]) ? $line[6] : "";
                        $data['dateannounced'] = !empty($line[7]) ? $line[7] : "";
                        $data['notes'] = !empty($line[8]) ? $line[8] : "";
                        $data['transmissiontype'] = !empty($line[9]) ? $line[9] : "";
                        $data['type'] = !empty($line[10]) ? $line[10] : "";
                        $data['latitude']=!empty($line[11])?$line[11]:0;
                        $data['longitude']=!empty($line[12])?$line[12]:0;
                        $this->Admin->updatePatient($data);
                    }
                    // Close opened CSV file
                    fclose($csvFile);
                    echo '<script>alert("Data updated successfully");</script>';                } else {

                    echo '<script>alert("Something went wrong!Please try again");document.location="'.URLROOT.'Patient"</script>';                }
            } else {
                
                echo '<script>alert("File format not supported");document.location="'.URLROOT.'Patient"</script>';
            }
        }
    }
    public function deleteData()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
       {
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          $id=$_POST['id'];
          $pdata=[
              'id'=>$_POST['id'],
              'status'=>$_POST['status'],
              'district'=>$_POST['district']
          ];
          if($this->Admin->deletePatient($pdata))
          {
             echo '<script>alert("Patient Deleted from database"); document.location="'.URLROOT.'Patient"</script>';
          }  
          else
          {
            echo '<script>alert("Something Went Wrong"); document.location="'.URLROOT.'Patient"</script>';
          }
       }
       else
       {
        echo '<script>document.location="'.URLROOT.'Patient"</script>';
       }
    }
    public function addPatient()
    {
        
        if(isset($_POST['patientnumber']))
        {
            
            $data = [];
            $data['patientnumber'] = $_POST['patientnumber'];
            $data['gender'] = $_POST['gender'];
            $data['nationality'] = $_POST['nationality'];
            $data['currentstatus'] = $_POST['status'];
            $data['city'] = $_POST['city'];
            $data['district'] = $_POST['district'];
            $data['state'] = $_POST['state'];
            $data['dateannounced'] = $_POST['dateannounced'];
            $data['notes'] = $_POST['notes'];
            $data['transmissiontype'] = $_POST['transmissiontype'];
            $data['type'] = "Patient";
            $data['latitude']=$_POST['latitude'];
            $data['longitude']=$_POST['longitude'];
            $result=$this->Admin->updatePatient($data);
            if($result)
            {
                echo '<script>alert("Data updated successfully");document.location="'.URLROOT.'Patient"</script>';                
            }
            else{
                echo '<script>alert("Patient Number already exists!");document.location="'.URLROOT.'Patient"</script>';  

            }
            
        }
        else{
            echo '<script>document.location="'.URLROOT.'Patient"</script>';

        }
    }
    public function editPatient()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
           $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
           $pdata=[
               'patientnumber'=>$_POST['patientnumber'],
               'status'=>$_POST['status'],
               'district'=>$_POST['district'],
               'nationality'=>$_POST['nationality'],
               'city'=>$_POST['city'],
               'notes'=>$_POST['notes'],
               'date'=>$_POST['date'],
               'latitude'=>$_POST['latitude'],
               'longitude'=>$_POST['longitude'],
               'type'=>'patient'
           ];
           $result=$this->Admin->editPatient($pdata);
           if($result)
           {
               echo '<script>alert("Data updated successfully");document.location="'.URLROOT.'Patient"</script>';                
           }
           else{
               echo '<script>alert("Something Went Wrong");document.location="'.URLROOT.'Patient"</script>';  

           }
        }
        else{
            echo '<script>document.location="'.URLROOT.'Patient"</script>';

        }
    }

 }
