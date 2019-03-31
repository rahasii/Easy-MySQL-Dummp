<?php
require('config.php');


class Partial
{

    private $_command;
    private $_user;
    private $_password;
    private $_host;
    private $_port;
    private $_database;

    private $_partialSettingsName;

    function __construct($settingsName)
    {
        $this->_command = 'mysql';
        $this->_user = ' -u' . DB_USER;
        $this->_password = ' -p' . DB_PASSWORD;
        $this->_host = ' -h' . DB_HOST;
        $this->_port = ' -P' . DB_PORT;
        $this->_database = ' ' . DB_NAME;

        $this->_partialSettingsName = self::makeSettingsName($settingsName);
    }

    public function makeSettingsName($settingsName)
    {
        return PARTIAL_SETTINGS_DIR.'/'.$settingsName . '.text';
    }

    public function makePartialSettingsFile($searchWord,$redirection)
    {
        return $this->_command . $this->_user . $this->_password . $this->_host . $this->_port . $this->_database .
            ' -N -e "show tables like ' . "'".$searchWord."'" . '" '.$redirection.' '.$this->_partialSettingsName;
    }


}