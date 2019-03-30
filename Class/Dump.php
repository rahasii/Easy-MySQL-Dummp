<?php

require 'config.php';

class Dump
{
    private $_command;
    private $_user;
    private $_password;
    private $_host;
    private $_port;
    private $_database;

    private $_dumpFileName;

    function __construct()
    {
        $this->_command = 'mysqldump';
        $this->_user = ' -u' . DB_USER;
        $this->_password = ' -p' . DB_PASSWORD;
        $this->_host = ' -h' . DB_HOST;
        $this->_port = ' -P' . DB_PORT;
        $this->_database = ' '.DB_NAME;

        $this->_dumpFileName = $this->makeDumpFileName();
    }

    public function makeDumpFileName()
    {
        date_default_timezone_set('Asia/Tokyo');
        $datetime = date('Y-md-His');
        return DUMP_FILE_DIR.'/'.DB_NAME . '-' . $datetime . '.dump';
    }

    public function dumpFull()
    {

    }

    public function dumpAll()
    {
        return $this->_command.$this->_user.$this->_password.$this->_host.$this->_port.$this->_database.' > '.$this->_dumpFileName;
    }

    public function dumpPartial()
    {

    }

}
