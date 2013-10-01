<?php

## add specific app data here
$appconf["title"] = "UM RESTful MVC framework";
$appconf["url"] = 'http://' . $_SERVER['SERVER_NAME'] . '/';

## add other config files if use
$dbcon = new config_mysql();
$reg->dbcon = $dbcon->getConnection(); //register it

//load app libs
$reg->user = new libs_user(@$_SESSION["userId"]); //user data lib


?>
