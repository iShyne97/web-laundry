<?php

class Notification
{

    public static function setNotif($message, $action, $type)
    {
        $_SESSION['notification'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function notif()
    {
        if (isset($_SESSION['notification'])) {
            $notif = $_SESSION['notification'];

            echo '
                <div class="toast bottom-4 right-4 z-50 transition-all duration-700 [transition-timing-function:cubic-bezier(0.25,1,0.5,1)] translate-x-full opacity-0">
                    <div class="alert alert-' . $notif['type'] . ' shadow-lg">
                        <span>' . $notif['message'] . ' ' . $notif['action'] . '</span>
                    </div>
                </div>
        ';

            unset($_SESSION['notification']);
        }
    }
}
