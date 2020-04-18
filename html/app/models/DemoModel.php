<?php 

class DemoModel{
    protected $db;
    public function __construct(){
        $this->db=new Database();
    }

    public function getData($city)
    {
        $this->db->query('SELECT * FROM testtable WHERE city=:city');
        $this->db->bindvalues(':city',$city);
        return $this->db->resultSet();
    }
    public function setData($city)
    {

        $this->db->query('INSERT INTO testtable(city) VALUES(:city)');
        if($this->db->execute)
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