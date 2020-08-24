<?php

class Model extends sql
{
    protected $file_path;
    protected $rol_data =[];
    protected $dbserver, $dbname, $dbuser, $password;
    protected $ztdsql;
    
    public $config;


    public function loadfile($filename,$filetype) {

        if(file_exists(DATA . $filename . '.' . $filetype)) {

            $this->rol_data = file(DATA . $filename . '.' . $filetype);
            return $this->rol_data;

        }
    }


    private function loadconfig($dbconfig) {

    $data = parse_ini_file(CONFIG . $dbconfig .'.ini',true);

    $this->dbserver = $data['Database']['dbserver'];
    $this->dbname  = $data['Database']['dbname'];
    $this->password = $data['Database']['dbpassword'];
    $this->dbuser = $data['Database']['dbuser'];
    
    }

    public function dbconnect() {

        $this->loadconfig($this->config);
        $this->connect($this->dbserver, $this->dbuser, $this->password, $this->dbname);
    }





}