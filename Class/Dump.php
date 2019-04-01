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

    private $_ignores;

    private $_dumpFileName;

    function __construct($dumpType = null)
    {
        $this->_command = 'mysqldump';
        $this->_user = ' -u' . DB_USER;
        $this->_password = ' -p' . DB_PASSWORD;
        $this->_host = ' -h' . DB_HOST;
        $this->_port = ' -P' . DB_PORT;
        $this->_database = ' ' . DB_NAME;

        $this->_frontPart = $this->_command . $this->_user . $this->_password . $this->_host . $this->_port . $this->_database;
        $this->_dumpFileName = $this->makeDumpFileName($dumpType);
        $this->_ignores = $this->readIgnoreSettings();
    }

    public function makeDumpFileName($dumpType)
    {
        date_default_timezone_set('Asia/Tokyo');
        $datetime = date('Y-md-His');
        return DUMP_FILE_DIR . '/' . DB_NAME . '-' . $datetime . '-' . $dumpType . '.dump';
    }

    public function makeSettingFilePath($settingsName)
    {
        return PARTIAL_SETTINGS_DIR . '/' . $settingsName . '.text';
    }

    public function readIgnoreSettings()
    {
        $file = fopen(__DIR__."/../IgnoreSettings/ignores.txt", "r");
        $ignores = '';
        if ($file) {
            while ($line = fgets($file)) {
                $ignores .= '--ignore-table=' . DB_NAME . '.' . $line . ' ';
            }
        }
        fclose($file);
        return $ignores;
    }

    public function dumpFull()
    {
        return $this->_frontPart . ' > ' . $this->_dumpFileName;
    }

    public function dumpAll()
    {
        return $this->_frontPart . ' ' . $this->_ignores . ' > ' . $this->_dumpFileName;
    }

    public function dumpPartial($settingFile)
    {
        $settingFilePath = self::makeSettingFilePath($settingFile);
        return $this->_frontPart . ' `cat ' . $settingFilePath . '`' . ' > ' . $this->_dumpFileName;
    }

}
