<?php

namespace App\Components\Admin;

use App\Models\Utilisateurs;

class Auth
{

    public function __construct()
    {

    }


    public function checkAuth(): void
    {

        if (!empty($_SESSION['connected']) && $_SESSION['connected'] === true && !empty($_SESSION['username'])) {
            if (!empty($_SESSION['last_login_timestamp'])) {
                if ((time() - $_SESSION['last_login_timestamp']) > 1900) {
                    $this->redirectToLogin();
                } else {
                    $_SESSION['last_login_timestamp'] = time();
                }
            }
        } else {
            $this->redirectToLogin();
        }
    }

    public static function User()
    {
        return Utilisateurs::find($_SESSION['id']);
    }

    private function redirectToLogin()
    {
        $root = strtok($_SERVER["REQUEST_URI"], '?');
        if ($root !== "/login") {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            session_destroy();
            setcookie('redirect_login', $_SERVER["REQUEST_URI"] ?? "/", time() + 300, '/');
            header("Location: /login");
            exit();
        }

    }
}