<?php

include_once 'model/contact_model.php';

class DashController {
    static function addContact() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', ['url' => 'view/contact_crud_page/add']);
        }
    }

    static function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $contacts = Contact::select();
            echo json_encode($contacts);
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $_POST['Id'];
            $CURRENT_JOB = $_POST['CURRENT_JOB'];
            $NAME = $_POST['NAME'];
            $ADRESS = $_POST['ADRESS'];
            $Status = $_POST['Status'];
            $PHONE_NUMBER = $_POST['PHONE_NUMBER'];

            $result = Contact::insert($Id, $CURRENT_JOB, $NAME, $ADRESS, $Status, $PHONE_NUMBER);
            echo json_encode(['success' => $result]);
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
            parse_str(file_get_contents("php://input"), $_PUT);
            $Id = $_PUT['Id'];
            $CURRENT_JOB = $_PUT['CURRENT_JOB'];
            $NAME = $_PUT['NAME'];
            $ADRESS = $_PUT['ADRESS'];
            $Status = $_PUT['Status'];
            $PHONE_NUMBER = $_PUT['PHONE_NUMBER'];

            $result = Contact::update($Id, $CURRENT_JOB, $NAME, $ADRESS, $Status, $PHONE_NUMBER);
            echo json_encode(['success' => $result]);
        }
        elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            parse_str(file_get_contents("php://input"), $_DELETE);
            $Id = $_DELETE['Id'];
    
            $result = Contact::delete($Id);
            echo json_encode(['success' => $result]);
        }
        else {
            http_response_code(405);
            echo json_encode(['error' => 'Maaf Halaman Ini Eror']);
        }
    }
}
DashController::handleRequest();
