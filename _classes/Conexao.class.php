<?php
    
    class Conexao{
        private $dbhost;
        private $dbport;
        private $dbuser;
        private $dbpass;
        private $dbname;
        private $dbh;
        private $dsn;


        public function __construct(){
            $this->dbhost = getenv('OPENSHIFT_MYSQL_DB_HOST');
            $this->dbport = getenv('OPENSHIFT_MYSQL_DB_PORT');
            $this->dbuser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
            $this->dbpass = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
            $this->dbname = getenv('OPENSHIFT_GEAR_NAME');
            
            echo $this->dsn .'<br>'.$this->dbpass;
            try {
                $this->dsn = 'mysql:dbname='.$this->dbname.';host='.$this->dbhost.';port='.$this->dbport;
                $this->dbh = new PDO($this->dsn, $this->dbuser, $this->dbpass);
            } catch (Exception $ex) {
                echo 'Erro ao conectar ao banco <br>'.$ex->getMessage();
            }
        }
        
        
    }