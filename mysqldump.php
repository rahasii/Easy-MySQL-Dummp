<?php
require('Class/Dump.php');


$param = $argv;
$pwd = dirname(__FILE__);

if(isset($argv[1])){
    $dumpType = $argv[1];
}else{
    $dumpType = 'all';
}

$dump = new Dump();
switch ($dumpType){
    case 'all' :
        echo exec($dump->dumpAll());
        break;
    default:
        break;
}

exit;
