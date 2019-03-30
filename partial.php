<?php
require('Class/Partial.php');

$param = $argv;
$pwd = dirname(__FILE__);

if(isset($argv[1])){
    $search = $argv[1];
}else{
    echo 'required search word';
    exit;
}

if(isset($argv[2])){
    $settingsName = $argv[2];
}else{
    $settingsName = $argv[1];
}

$partial = new Partial($settingsName);
echo exec($partial->makePartialSettingsFile($search));
exit;
