<?php

class Screening extends Controller
{
   public function __construct()
   {
      //call model from here
      $this->screeningModel = $this->model('ScreeningModel');
   }

   public function index()
   {
      //call view as needed 
      $data = [
         'tittle' => 'Screening page'
      ];
      $this->views('user/screening', $data);
   }
   public function response()
   {
      if ($_GET && count($_GET) == 11) {
         $testData = $_GET;
         $testingResult = [];
         foreach ($testData as $key => $value) {

            $fieldsdata = explode("_", $key, 2);
            $fields = $fieldsdata[0];
            if ($fields === "age") {
               switch ($value) {
                  case "option1":
                     $testingResult[$fields] = "under 18";
                     break;
                  case "option2":
                     $testingResult[$fields] = "between 18 and 64";
                     break;
                  case "option3":
                     $testingResult[$fields] = "over 64";
                     break;
               }
            } else if ($fields !== "url") {
               switch ($value) {
                  case "option1":
                     $testingResult[$fields] = "yes";
                     break;
                  case "option2":
                     $testingResult[$fields] = "no";
                     break;
               }
            }
         }
         $result = $this->screeningModel->generateReport($testingResult);



         $this->views('user/screeningResponse', $result);
         exit();
      }
      $data = [
         'tittle' => 'Screening Response'
      ];
      Core::redirect('Screening');
   }
}
