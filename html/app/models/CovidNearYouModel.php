<?php


  class CovidNearYouModel{
    protected $db='';
    public function __construct()
    {
        $this->db=new Database();
    }

   public function getTableData()
   {
    $qry = 'SELECT * FROM patient ';
    $this -> db->query($qry);
   return $this -> db->resultset();
    
   }

   public function getPatient($user){
    $this->db->query('SELECT * FROM patient where patientnumber=:usr ');
    $this->db->bindvalues(':usr',$user);
    return $this->db->single();
   }

  }

?>
