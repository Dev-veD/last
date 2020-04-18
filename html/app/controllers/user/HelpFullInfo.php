<?php 

class HelpFullInfo extends Controller{

     public function __construct()
     {
         
     }

     public function index()
     {
         $data=[
              'tittle'=>'Helpfulinfo'
         ];
         $this->views('user/helpFullInfo',$data);
     }
}


?>