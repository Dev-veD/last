<?php

class AuthenticationModel{
     
    protected $db='';
    public function __construct()
    {
        $this->db=new Database();
    }

    public function createUser($data)
    {
      if($this->checkExistingEmail($data))
      {
          $this->db->query('UPDATE users SET otp=:otp WHERE email=:email');
          $this->db->bindvalues(':otp',$data['otp']);
          $this->db->bindvalues(':email',$data['email']);
          if($this->db->execute())
          {
              return true;
          }
          else
          {
              return false;
          }
      }
      else
      {
            $this->db->query('INSERT INTO users(type,name,email,otp) values(:type,:name,:email,:otp)');
            $this->db->bindvalues(':type',$data['type']);
            $this->db->bindvalues(':name',$data['name']);
            $this->db->bindvalues(':email',$data['email']);
            $this->db->bindvalues(':otp',$data['otp']);
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

    public function checkExistingEmail($data)
    {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bindvalues(':email',$data['email']);
        $this->db->execute();
        if($this->db->rowCount()>0)
        {
            return true;
        }  
        else
        {
            return false;
        }
    }
    public function verifyOTP($data)
    {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bindvalues(':email',$data['email']);
        return $this->db->single();
    }

}


?>