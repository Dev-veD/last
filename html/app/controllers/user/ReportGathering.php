<?php

class ReportGathering extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            $url = URLROOT . 'Authentication';
            header('location:' . $url);
        }
        $this->reportGatheringModel = $this->model('ReportGatheringModel');
    }

    public function index()
    {

        $errors = '';
        if ($_POST && isset($_SESSION['user_id'])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $name_of_uploaded_file =
                basename($_FILES['uploaded_file']['name']);

            $type_of_uploaded_file =
                substr(
                    $name_of_uploaded_file,
                    strrpos($name_of_uploaded_file, '.') + 1
                );

            $size_of_uploaded_file =
                $_FILES["uploaded_file"]["size"] / 1024;
            $max_allowed_file_size = 2049;
            $allowed_extensions = array("jpg", "jpeg", "gif", "bmp", "png");
            if ($name_of_uploaded_file != '') {
                $errors .= Helpers::documentValidation($size_of_uploaded_file, $max_allowed_file_size, $allowed_extensions, $type_of_uploaded_file);
            }
            $upload_folder = "/var/www/html/public/massGatheringDocument/";
            $path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
            $tmp_path = $_FILES["uploaded_file"]["tmp_name"];

            if (is_uploaded_file($tmp_path)) {
                mkdir(dirname($path_of_uploaded_file), 0777, true);
                move_uploaded_file($tmp_path . '/' . $name_of_uploaded_file, $path_of_uploaded_file);
                if (!copy($tmp_path, $path_of_uploaded_file)) {
                    $errors .= 'Error while copying the uploaded file';
                }
            } else if ($name_of_uploaded_file != '') {
                $errors .= 'Something went wrong please try again latter';
            }
            if ($errors == '') {
                $_POST['attachment'] = $path_of_uploaded_file;
                $result = $this->reportGatheringModel->registerNewMassGathering($_POST);
                if ($result) {
                    echo '<script>alert("Mass gathering Reported");document.location="Dashboard"</script>';
                }
            }
        }
        $data['err'] = $errors;
        $this->views('user/reportGathering', $data);
    }
}
