<?php 

 class Logout {

    public function __construct()
    {
    
    }
    public function index()
    {
        session_start();
        session_destroy();
        header('location:Admine');
    }
 }