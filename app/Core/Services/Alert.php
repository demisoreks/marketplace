<?php

namespace App\Core\Services;

class Alert {

    public static function format($summary, $message) {
        return "<span class=\"font-weight-bold\">".$summary."</span><br />".$message;
    }

}
