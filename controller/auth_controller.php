<?php

include_once 'model/user_model.php';

class AuthController {
    static function login() {
        if (isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'dashboard');
            exit;
        } else {
            view('auth_page/login');
        }
    }

    static function authenticate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::authenticate($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: '.BASEURL.'dashboard');
                exit;
            } else {
                header('Location: '.BASEURL.'login?auth=failed');
                exit;
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method Not Allowed']);
        }
    }

    static function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: '.BASEURL.'login');
        exit;
    }
}
