<?php 

    class Person{

        private $username;
        private $password;
        private $dni;
        private $name;
        private $lastName;


        public function __construct($dni, $name, $lastName, $username, $password){

            if($dni == null && $name ==null && $lastName== null){
                $this->username=$username;
                $this->password=$password;
                
            }else{
                $this->dni=$dni;
                $this->name=$name;
                $this->lastName=$lastName;
                $this->username=$username;
                $this->password=$password;
            }
        }


        public function getDni(){
            return $this->dni;
        }
        public function getName(){
            return $this->name;
        }
        public function getlastName(){
            return $this->lastName;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }

    }