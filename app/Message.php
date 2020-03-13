<?php

namespace App;

class Message
{
    public static function setError($alerta)
    {
        session(['ERROR' => $alerta]);
        return $alerta;
    }

    public static function getError()
    {
        (session('ERROR') != "" ) ? $alerta = session('ERROR') : $alerta = "";
        Message::clearError();
        return $alerta;
    }

    public static function clearError()
    {
        session(['ERROR' => null]);
    }

    public static function setSuccess($alerta)
    {
        session(['SUCCESS' => $alerta]);
        return $alerta;
    }

    public static function getSuccess()
    {
        (session('SUCCESS') != "" ) ? $alerta = session('SUCCESS') : $alerta = "";
        Message::clearSuccess();
        return $alerta;
    }

    public static function clearSuccess()
    {
        session(['SUCCESS' => null]);
    }
}