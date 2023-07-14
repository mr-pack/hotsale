<?php

class Response {

    private static function PrintJson($hasError, $messages) {
        print json_encode(['hasError' => $hasError, 'messages' => $messages]);
        exit;
    }

    public static function JsonErrors($messages) {
        self::PrintJson(true, $messages);
    }

    public static function JsonMessages($messages) {
        self::PrintJson(false, $messages);
    }

}
