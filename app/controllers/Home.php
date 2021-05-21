<?php

    class Home extends  Controller{
        
        public function index()
        {
            $data                   =
            [
                'title'             =>  'CRUD OOP MVC',
                'sub_title'         =>  'Home',
                'users'             =>  $this->model('users_model')->getUsers()
            ];
            $this->view('_partials/header', $data);
            $this->view('home/index', $data);
            $this->view('_partials/footer');
        }

    }