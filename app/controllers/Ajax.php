<?php

    class Ajax extends Controller{
        public function index()
        {
            # code...
        }
        public function getUsers()
        {
            $getUser            =   $this->model('users_model')->getUsers();
            echo json_encode($getUser);
        
        }
        public function deleteUsers()
        {
            if(isset($_POST['id'])){
                $id             =   $_POST['id'];
                $delete         =   $this->model('users_model')->deleteUser($id);
                if($delete){
                    $json       =
                    [
                        'statusCode'    =>  200,
                        'success'       =>  true,
                        'data'          =>  'Data berhasil dihapus'
                    ];
                }else{
                    $json       =
                    [
                        'statusCode'    =>  400,
                        'success'       =>  false,
                        'data'          =>  'Kesalahan Server, Coba Lagi'
                    ];
                }
                echo json_encode($json);
            }
        }
        public function addUsers()
        {
            if(isset($_POST['username'])){
                $fullName               =   $_POST['full_name'];
                $username               =   $_POST['username'];
                $password               =   $_POST['password'];
                $data                   =
                [
                    'full_name'         =>  $fullName,
                    'username'          =>  $username,
                    'password'          =>  $password
                ];
                $saveUser               =   $this->model('users_model')->saveUser($data);
                if($saveUser){
                    $json               =
                    [
                        'statusCode'    =>  200,
                        'success'       =>  true,
                        'data'          =>  'Data berhasil ditambahkan'
                    ];
                }else{
                    $json               =
                    [
                        'statusCode'    =>  400,
                        'success'       =>  false,
                        'data'          =>  'Terjadi Kesalahan, Silahkan Coba Lagi'
                    ];
                }
                echo json_encode($json);
            }
        }
        // Edit User
        public function editUser()
        {
            if(!empty($_POST['id'])){
                $id                     =   $_POST['id'];
                $username               =   $_POST['username'];
                $password               =   $_POST['password'];
                $fullName               =   $_POST['full_name'];
                $data                   =
                [
                    'full_name'         =>  $fullName,
                    'username'          =>  $username,
                    'password'          =>  $password
                ];
                $update                 =   $this->model('users_model')->editUsers($data, $id);
                if($update){
                    $json               =
                    [
                        'statusCode'    =>  200,
                        'success'       =>  true,
                        'data'          =>  'Data berhasil diubah'
                    ];
                }else{
                    $json               =
                    [
                        'statusCode'    =>  401,
                        'success'       =>  false,
                        'data'          =>  'Terjadi kesalahan server, data gagal diubah'
                    ];
                }
            }else{
                $json                   =
                [
                    'statusCode'        =>  400,
                    'success'           =>  false,
                    'data'              =>  'Maaf permintaan tidak bisa di lakukan'
                ];
            }
            echo json_encode($json);
        }
        // Get User For Edit Modal
        public function getUser()
        {
            if(!empty($_POST['id'])){
                $id                     =   $_POST['id'];
                $getUser                =   $this->model('users_model')->getUsers($id);
                if($getUser){
                    $json               =
                    [
                        'statusCode'    =>  200,
                        'success'       =>  true,
                        'data'          =>  $getUser
                    ];
                }else{
                    $json               =
                    [
                        'statusCode'    =>  400,
                        'success'       =>  false,
                        'data'          =>  'Maaf, data tidak ditemukan'
                    ];
                }
            }else{
                $json                   =
                [
                    'statusCode'        =>  401,
                    'success'           =>  false,
                    'data'              =>  'none'
                ];
            }
            echo json_encode($json);
        }
    }