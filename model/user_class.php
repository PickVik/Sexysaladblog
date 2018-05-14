<?php

class Users {
    
    
    
 public $first_name;
 public $last_name;
 private $password;
 public $admin;
 
 
    function __construct($email, $first_name, $last_name, $password, $admin) {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->admin = $admin;
    }

    

    
     function check_admin(){
         $db = Db::getInstance();
        //admin
        
    }
    
    
    function register(){
        
        // Connect to DATABASE
        $db = Db::getInstance(); 
        
        //SQL (INSERT into users that you got from VIEW with the control of USER CONTROLLER
        
       
    }
    
    
    
    function login(){
        $db = Db::getInstance();
        
        
    }
    
    function change_password(){
        $db = Db::getInstance();
        
        
        
    }
    
    function delete_profile(){
        $db = Db::getInstance();
        
    }
    
    
    
   
    
    function delete_user(){
        $db = Db::getInstance();
        //admin
        
    }
    
    function list_users(){
        $db = Db::getInstance();
        //admin 
        
    }
    
    
 
    
 
    
}

    
