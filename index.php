<?php
/**
 * Created by PhpStorm.
 * User: purelightme
 * Date: 2017/7/30
 * Time: 20:47
 */
use purelightme\Error;

require_once 'Error.php';

$err = new Error();

throw new Exception('test exception',100);

echo $a;
