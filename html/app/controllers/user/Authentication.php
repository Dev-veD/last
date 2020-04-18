<?php
use PHPMailer\PHPMailer\PHPMailer;
class Authentication extends Controller{

    public function __construct()
    {
        if(isLoggedIn())
         {
             $url=URLROOT.'ReportGathering';
             header('location:'.$url);
         }
        $this->authenticationModel=$this->model('AuthenticationModel');
    }

    public function index()
    {
        
       if($_SERVER['REQUEST_METHOD']=='POST')
       {
        
          $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
          
          $data=[
              'name'=>$_POST['username'],
              'email'=>$_POST['email'],
              'type'=>'user',
              'otp'=>'',
              'name_err'=>'',
              'email_err'=>''
          ];
          if(empty($data['name']))
          {
              $data['name_err']="name field can't be empty";
          }
          if(empty($data['email']))
          {
              $data['email_err']="email field can't be empty";
          }

          if(empty($data['name_err'])&&empty($data['email_err']))
          {
            
             $data['otp']=mt_rand(100000,999999);
             $otp=$data['otp'];
             if($this->authenticationModel->createUser($data))
             {
                
                $mail=new PHPMailer();
                $mail-> isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth =true;
                $mail->Username="arrowphoto1865096nikhil@gmail.com";
                $mail->Password="avk@9627169357";
                $mail->Port=465;
                $mail->SMTPSecure="ssl";

                $mail->setFrom("Ukgov@gmail.com","Uttarakhand Covid 19");
                $mail->addAddress($data['email']);
                $mail->isHTML(true);
                $mail->Subject="Verify Your Account";
                $mail->Body="
                    Hi,<br><br>
                    Your OTP is $otp.
                    <br> If not done by You Ignore The Message.
                ";
                if($mail->send())
                {
                    if(session_status()==PHP_SESSION_NONE)
                        {
                            session_start();
                        }
                    $_SESSION['tempemail']=$data['email'];
                    echo '<script>alert("Please check your email for otp!");document.location="Authentication/verify"</script>';
                }
                else
                {
                    echo '<script>alert("Something went wrong please try again");document.location="Authentication"</script>';
                }
                //set a session named email. so that it can be used while authenticating OTP.
             }
             else
             {
                echo '<script>alert("Something went wrong please try again");document.location="Authentication"</script>';
             }

          }
          else
          {
             $this->views('user/authentication',$data);
          }
       }
       else
       {
           $data=[
               'name'=>'',
               'email'=>'',
               'name_err'=>'',
               'email_err'=>''
           ];
           $this->views('user/authentication',$data);
       }
    }

    public function verify()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        if(isset($_SESSION['tempemail']))
        {
          $email=$_SESSION['tempemail'];    
        }
        else
        {
            $url=URLROOT;
            header('location:'.$url.'Authentication');
        }
         if($_SERVER['REQUEST_METHOD']=='POST')
         {
            $data=[
                'otp'=>$_POST['otp'],
                'email'=>$email
            ];
            //check database and search for otp in database having session email.
            $result=$this->authenticationModel->verifyOTP($data);
            if($result->otp==$data['otp'])
            {
                $_SESSION['user_id']=$result->id;
                $_SESSION['user_type']=$result->type;
                $_SESSION['user_email']=$data['email'];
                unset($_SESSION['tempemail']); 
                echo '<script>alert("Verification Successful");document.location="http://ec2-3-6-245-141.ap-south-1.compute.amazonaws.com/ReportGathering"</script>';
            }
            else
            {
                echo '<script>alert("OTP Invalid");document.location="verify"</script>';
            }
         }
         else
         {
             $data=[
                 'otp'=>''
             ];
             $this->views('user/enterotp',$data);
         }
    }
}

?>
