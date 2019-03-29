<?php

require 'config.php';

class Dump
{

    public function dumpAll()
    {
        $command = 'mysqldump';
        $user = ' -u' . DB_USER;
        $password = ' -p' . DB_PASSWORD;
        $host = ' -h' . DB_HOST;
        $port = ' -P' . DB_PORT;
        $database = ' '.DB_NAME;

        date_default_timezone_set('Asia/Tokyo');
        $datetime = date('Y-m-d-Hi');
        $dumpFileName = DB_NAME.'-'.$datetime.'.dump';

        return $command.$user.$password.$host.$port.$database.' > '.$dumpFileName;
    }

    public function dumpPartial()
    {

    }

}
