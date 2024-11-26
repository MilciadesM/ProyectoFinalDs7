<?php
class Generate {

    public static function ID() {
        date_default_timezone_set('America/Panama');
        return date('YmdHis');
    }
}
?>
