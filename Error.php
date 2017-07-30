<?php
/**
 * Created by PhpStorm.
 * User: purelightme
 * Date: 2017/7/30
 * Time: 20:39
 */

class Error extends \Exception
{
    public function __construct()
    {
        set_error_handler([$this,'errHandler']);
    }

    public function errHandler($type, $msg, $file, $line)
    {
        $str = '[ '.date('Y-m-d H:i:s').' ]'." $type"." $msg"." $file"." $line";
        self::error($str);
    }

    public static function error($str)
    {
        error_log(var_export($str,true),3,"./".date('Ymd').'error');
    }
}