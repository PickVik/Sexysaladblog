<?php


class Articles{
    
    public $id;
    public $title;
    public $body;
    public $user_id;
    public $key_ingredient_id;
    public $date_created;
    public $published;
    
    
    function __construct($id, $title, $body, $user_id, $key_ingredient_id, $date_created, $published) {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->user_id = $user_id;
        $this->key_ingredient_id = $key_ingredient_id;
        $this->date_created = $date_created;
        $this->published = $published;
    }

   
     function publish_article(){
        $db = Db::getInstance();
        //admin
        
    }
    
    function update_article(){
        $db = Db::getInstance();
        //admin
    }
    
    
    
       function add_to_favourites(){
        $db = Db::getInstance();
        
        
        
    }
    
    
    function show_favourites(){
        $db = Db::getInstance();
        
    }
    
    
    function show_categories(){
        $db = Db::getInstance();
    }
    
    function all_by_category(){
        $db = Db::getInstance();
        
    }
    
  
    
    function search_title(){
        $db = Db::getInstance();
        
    }
    
}














