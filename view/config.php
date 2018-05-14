<?php 
	session_start();

	// connect to database
        class DB {
       public $db;
    
    public function __construct() {
        $dsn= 'mysql:host=localhost;dbname=blog_test';
        $this->db = new PDO($dsn, 'root','');
    }
    
    public function query($sql, $args = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);     
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert($sql, $args = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);     
        return;
    }
}
       // coming soon...

	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/Sexysaladblog/view/pages/');

