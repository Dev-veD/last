<?php

class Admine extends Controller
{

    protected $adminDetails = ["Table" => ""];

    public function __construct()
    {
        $this->Admin = $this->model('Admin');
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if ($this->Admin->checkAdmin($data)) {
                // Now Admin session is set in checkAdmin()
                echo '<script>alert("Verification Successful");document.location="Patient"</script>';
            } else {
                $this->views('admin/admine', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => ''
            ];
            $this->views('admin/admine', $data);
        }
    }
}
