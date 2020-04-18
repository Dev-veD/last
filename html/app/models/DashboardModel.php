<?php


  class DashboardModel{
    protected $db='';
    
    public function __construct()
    {
        $this->db=new Database();
        
    }

   public function getAllNotice(){
    $this->db->query('SELECT * FROM notices');
    return $this->db->resultSet();
  }
  public function getAllDistrictData(){
    $this->db->query('SELECT * FROM uDistrict');
    return $this->db->resultSet();
  }

  public function getDistrictData($district){
    
 
    $this->db->query('SELECT * FROM uDistrict where district=:dest ');
    $this->db->bindvalues(':dest',$district);
    return $this->db->single();

  }
}

?>