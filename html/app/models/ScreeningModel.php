<?php


class ScreeningModel
{
  protected $db = '';
  public function __construct()
  {
    $this->db = new Database();
  }
  public function generateReport($data)
  {
    $result = [];
    $symptoms = ($data['fever'] === "yes" || $data['dryCough'] == "yes" || $data['breatheTrouble'] === "yes" || $data['chestPain'] === "yes");
    $past_diseases = ($data['conditions'] === "yes");
    $travel_history = ($data['traveled'] === "yes");
    $visited_widespread_area = ($data['covidCity'] === "yes" || $data['careFacility'] === "yes" || $data['covidContact'] === "yes");
    if (!$symptoms) {
      $result['message'] = 'You Should Practice Social Distancing';
      $result['note'] = 'Help stop the spread. When outside the home, stay at least six feet away from other people, avoid groups, and only use public transit if necessary.';
      $result['step'] = [
        "Quarantine at Home" => "You may have been exposed. You should stay home for the next 14 days and see if any symptoms appear. You should also try to limit your contact with others outside the home.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. Also, check your temperature twice a day for two weeks. If symptoms get worse, call your doctor.",
      ];
      $result['test'] = ["No Test at This Time" => "As of now, your answers suggest you do not need to get tested. If anything changes, take the questionnaire again."];
      $result['responses'] = $data;
    } else if ($symptoms && !$past_diseases && !$travel_history && !$visited_widespread_area) {
      $result['message'] = 'You Should Self-Isolate';
      $result['note'] = 'Based on your answers, you should stay home and away from others. If you can, have a room and bathroom that’s just for you. This can be hard when you’re not feeling well, but it will protect those around you.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office."
      ];
      $result['test'] = ["No Test at This Time" => "As of now, your answers suggest you do not need to get tested. If anything changes, take the questionnaire again."];
      $result['responses'] = $data;
    } else if ($symptoms && !$past_diseases && !$travel_history && $visited_widespread_area) {
      $result['message'] = 'You Should Self-Isolate';
      $result['note'] = 'Based on your answers, you should stay home and away from others. If you can, have a room and bathroom that’s just for you. This can be hard when you’re not feeling well, but it will protect those around you.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office."
      ];
      $result['test'] = ["No Test at This Time" => "As of now, your answers suggest you do not need to get tested. If anything changes, take the questionnaire again."];
      $result['responses'] = $data;
    } else if ($symptoms && !$past_diseases && $travel_history && !$visited_widespread_area) {
      $result['message'] = 'You Should Self-Isolate';
      $result['note'] = 'Based on your answers, you should stay home and away from others. If you can, have a room and bathroom that’s just for you. This can be hard when you’re not feeling well, but it will protect those around you.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office."
      ];
      $result['test'] = ["No Test at This Time" => "As of now, your answers suggest you do not need to get tested. If anything changes, take the questionnaire again."];
      $result['responses'] = $data;
    } else if ($symptoms && !$past_diseases && $travel_history && $visited_widespread_area) {
      $result['message'] = 'You Should Self-Isolate';
      $result['note'] = 'Based on your answers, you should stay home and away from others. If you can, have a room and bathroom that’s just for you. This can be hard when you’re not feeling well, but it will protect those around you.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office."
      ];
      $result['test'] = ["No Test at This Time" => "As of now, your answers suggest you do not need to get tested. If anything changes, take the questionnaire again."];
      $result['responses'] = $data;
    } else if ($symptoms && $past_diseases && !$travel_history && !$visited_widespread_area) {
      $result['message'] = 'Contact Your Healthcare Provider';
      $result['note'] = 'Your answers suggest you should talk to a medical professional about getting tested for COVID-19.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office.",
        "Talk to Someone About Testing" => "Your answers suggest you may need to get tested for COVID-19. You should get in touch with your doctor’s office or your state or local health department for more information. Testing access may vary by location and provider."

      ];
      $result['responses'] = $data;
    } else if ($symptoms && $past_diseases && !$travel_history && $visited_widespread_area) {
      $result['message'] = 'Contact Your Healthcare Provider';
      $result['note'] = 'Your answers suggest you should talk to a medical professional about getting tested for COVID-19.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office.",
        "Talk to Someone About Testing" => "Your answers suggest you may need to get tested for COVID-19. You should get in touch with your doctor’s office or your state or local health department for more information. Testing access may vary by location and provider."

      ];
      $result['responses'] = $data;
    } else if ($symptoms && $past_diseases && $travel_history && !$visited_widespread_area) {
      $result['message'] = 'Contact Your Healthcare Provider';
      $result['note'] = 'Your answers suggest you should talk to a medical professional about getting tested for COVID-19.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office.",
        "Talk to Someone About Testing" => "Your answers suggest you may need to get tested for COVID-19. You should get in touch with your doctor’s office or your state or local health department for more information. Testing access may vary by location and provider."

      ];
      $result['responses'] = $data;
    } else if ($symptoms && $past_diseases && $travel_history && $visited_widespread_area) {
      $result['message'] = 'Contact Your Healthcare Provider';
      $result['note'] = 'Your answers suggest you should talk to a medical professional about getting tested for COVID-19.';
      $result['step'] = [
        "Isolate From Others" => "You should try to stay away from others for at least 7 days from when your symptoms first appeared. Your isolation can end if your symptoms improve significantly and if you have had no fever for at least 72 hours without the use of medicine. By isolating yourself, you can slow the spread of COVID-19 and protect others.",
        "Rest and Take Care" => "Eat well, drink fluids, and get plenty of rest.",
        "Monitor Symptoms" => "Watch for COVID-19 symptoms such as cough, fever, and difficulty breathing. If your symptoms get worse, contact your doctor’s office.",
        "Talk to Someone About Testing" => "Your answers suggest you may need to get tested for COVID-19. You should get in touch with your doctor’s office or your state or local health department for more information. Testing access may vary by location and provider."

      ];
      $result['responses'] = $data;
    }
    return $result;
  }
}
