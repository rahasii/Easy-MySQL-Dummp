<?php
require('Class/Dump.php');


$param = $argv;
$pwd = dirname(__FILE__);
$dumpType = $argv[1];


$dump = new Dump($dumpType);
switch ($dumpType){
    case 'all' :
        echo exec($dump->dumpAll());
        break;
    case 'partial' :
        $settingFile = $argv[2];
        echo exec($dump->dumpPartial($settingFile));
        break;
    default:
        break;
}

exit;
