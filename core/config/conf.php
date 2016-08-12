<?php

//# some constants
define('PROJECTDIR', 'app/');
define('COREDIR', 'core/');

//# config libs loader
$core_libs = ['coreInfo', 'validate', 'error', 'cleanData'];

//optional libs and setings
require_once '../'.COREDIR.'lib/libMySQL.php';

require_once '../'.COREDIR.'lib/user.php';
//# default user table info
$reg->userTable = 'login';
$reg->userIdFild = 'loginId';

require_once '../'.COREDIR.'lib/access.php';
//ACL Levels
final class LEVELS
{
    private function __construct()
    {
    }

    const FORBIDEN = 0;
    const GET = 1;
    const ADD = 2;
    const CHANGE = 3;
    const DELETE = 4;
    //default level, it is used if no level set
    const DEF = self::GET;
}

//API folders -- for web service add "/" root folder in array
$reg->api = ['api'];
