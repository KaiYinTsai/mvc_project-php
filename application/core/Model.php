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

    private function dbconnect() {

        $this->loadconfig($this->config);
        $this->connect($this->dbserver, $this->dbuser, $this->password, $this->dbname);
    }


    public function selectdata($table,$modelname,$condition) {
        $this->config = 'dbconfig';
        $this->dbconnect();
        $this->_table = $table;
        if( $condition == '')
            $data = $this->selectAll($modelname);
        else {

            $this->where($condition);
            $data = $this->selectAll($modelname);

        }
 
            $this->disconnect();
        return $data;
    }

    public function getinfo($table,$modelname,$condition) {

        $this->config = 'dbconfig';
        $this->dbconnect();
        $this->_table = $table;

       $data = $this->getTableAll($modelname);
        return $data;

    }


}

