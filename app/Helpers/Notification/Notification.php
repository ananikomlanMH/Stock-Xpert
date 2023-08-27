<?php

namespace App\Helpers\Notification;

class Notification
{

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setNotification(string $type, string $message): array
    {
        $_SESSION['notificationNBR'] = 0;
        return $_SESSION['notification'][] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public static function getNotification(): bool|string
    {
        if (!empty($_SESSION['notification'])){
            $_SESSION['notificationNBR'] += 1;
            return json_encode($_SESSION['notification'][0]);
        }
        return 'null';
    }

    public static function clearNotification(): string
    {
        if (!empty($_SESSION['notification'])) {
//            if ($_SESSION['notificationNBR'] >= 1) {
                unset($_SESSION['notification'],$_SESSION['notificationNBR']);
//            }
        }
        return "";
    }

}