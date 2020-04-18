<?php


  class ReportGatheringModel{
    protected $db='';
    public function __construct()
    {
        $this->db=new Database();
    }
    public function registerNewMassGathering($data)
    {
      $databaseData=[];
      $databaseData['user_id']=$_SESSION['user_id'];
      $databaseData['remarks']=$data['remarks'];
      $databaseData['address']=$data['address'];
      $databaseData['photographs']=$data['attachment'];
      $this->db->query('INSERT INTO mass_gatherings(user_id,remarks,address,photographs) values(:user_id,:remarks,:address,:photographs)');
      $this->db->bindvalues(':user_id',$databaseData['user_id']);
      $this->db->bindvalues(':remarks',$databaseData['remarks']);
      $this->db->bindvalues(':address',$databaseData['address']);
      $this->db->bindvalues(':photographs',$databaseData['photographs']);
      if($this->db->execute())
      {
          return true;
      }
      else
      {
          return false;
      }

    }


  }

?>