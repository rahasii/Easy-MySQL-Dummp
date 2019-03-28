<?php

class Dump
{

    public function dumpAll()
    {
        return 'mysqldump -uroot -p -h 0.0.0.0 -P43306 db > dumpfile.dump';
    }

    public function dumpPartial()
    {

    }

}
