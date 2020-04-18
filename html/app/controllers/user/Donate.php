<?php 

class Donate extends Controller{

     public function __construct()
     {
        
     }

     public function index()
     {
        $data=[
            'tittle'=>'Donate'
        ] ;
        $this->views('user/donate',$data);
     }
}


?>