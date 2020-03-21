<?php
 class Post {
    private $cnx;
    private $table = 'posts';
    
    public $id;
    public $title;
    public $body;

    public function __construct($db) {
        $this->cnx = $db;
    }

    public function index(){
        $query = "SELECT * FROM ' . $this->table . '";
        $stmt = $this->cnx->prepare($query);
        $stmt->exceute();

        return $stmt;
    }
 } 