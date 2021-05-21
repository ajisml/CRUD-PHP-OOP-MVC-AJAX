<?php

    class Users_model{

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUsers($id = null)
        {
            if($id !== null){
                $this->db->query('SELECT * FROM users WHERE id=:id');
                $this->db->bind('id', $id);
                $this->db->execute();
                return $this->db->single();
            }else{
                $this->db->query('SELECT * FROM users');
                return $this->db->resultSet();
            }
        }
        public function deleteUser($id)
        {
            $query      =   "DELETE FROM users WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->execute();
            return $this->db->rowCount();
        }
        public function saveUser($data)
        {
            $query      =   "INSERT INTO users (full_name,username,password) VALUES (:full_name,:username,:password)";
            $this->db->query($query);
            $this->db->bind('full_name', $data['full_name']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->execute();
            return $this->db->rowCount();
        }
        public function editUsers($data, $id)
        {
            $query      =   "UPDATE users SET full_name=:full_name, username=:username, password=:password WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('full_name', $data['full_name']);
            $this->db->bind('username', $data['username']);
            $this->db->bind('password', $data['password']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }