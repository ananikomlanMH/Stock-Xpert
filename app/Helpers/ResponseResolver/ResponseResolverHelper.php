<?php

namespace App\Helpers\ResponseResolver;


use App\Helpers\Notification\Notification;

class ResponseResolverHelper
{

    public static function sendResponse(array $data): bool|int|string
    {

        if (self::isAjax()) {
            return json_encode($data);
        } else {
            Notification::setNotification($data['type'], $data['message']);
            header('Location: '.$data['redirection']);
            exit();
        }
    }

    private static function isAjax(): bool
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

}
