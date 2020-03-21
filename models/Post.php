<?php

 class Post {
    private $table = 'posts';
    private $cnx;
    
    public $id;
    public $title;
    public $body;

    public function __construct($db) {
        $this->cnx = $db;
    }

    public function index(){
        $query = 'SELECT id,title,body FROM '.$this->table.'';
        $stmt = $this->cnx->prepare($query);
        // var_dump($stmt);
        $stmt->execute();

        return $stmt;
    }
 } 