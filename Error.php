<?php
/**
 * Created by PhpStorm.
 * User: purelightme
 * Date: 2017/7/30
 * Time: 20:39
 */
namespace purelightme;

class Error extends \Exception
{
    public function __construct()
    {
        set_error_handler([$this,'errHandler']);
        set_exception_handler([$this,'exceptionHandler']);
    }

    public function errHandler($type, $msg, $file, $line)
    {
        $str = '[ '.date('Y-m-d H:i:s').' ]'." $type"." $msg"." $file"." $line";
        self::error($str,'error');
    }

    public function exceptionHandler(\Exception $exception)
    {
        $msg = $exception->message;
        $code = $exception->code;
        $file = $exception->file;
        $line = $exception->line;
        $str = '[ '.date('Y-m-d H:i:s').' ]'." $code"." $msg"." $file"." $line";
        self::error($str,'exception');
    }

    public static function error($str, $type)
    {
        error_log(var_export($str,true),3,"./".date('Ymd').$type);
    }
}