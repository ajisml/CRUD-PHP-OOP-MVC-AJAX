<?php

    class Database{
        

        private $host           =   HOST;
        private $user           =   DBUSER;
        private $pass           =   DBPASS;
        private $dbname         =   DBNAME;

        private $dbh;
        private $stmt;

        public function __construct() {
            try{
                $this->dbh      =   new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass,[
                    PDO::ATTR_PERSISTENT            =>  true,
                    PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION
                ]);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        public function query($query)
        {
            $this->stmt         =   $this->dbh->prepare($query);
        }
        public function bind($params, $value, $type = null)
        {
            if(is_null($type)){
                switch ( true ) {
                    case is_int($value):
                        $type   =   PDO::PARAM_INT;
                        break;
                    case is_bool($value) :
                        $type   =   PDO::PARAM_BOOL;
                        break;
                    case is_null($value) : 
                        $type   =   PDO::PARAM_NULL;
                        break;
                    default:
                        $type   =   PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($params, $value, $type);
        }
        public function execute()
        {
            $this->stmt->execute();
        }
        public function resultSet()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function rowCount()
        {
            return $this->stmt->rowCount();
        }

    }