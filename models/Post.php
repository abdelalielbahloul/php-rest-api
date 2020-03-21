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

    public function show() {
        $query = 'SELECT title,body FROM '. $this->table .' WHERE id = ?';
        $stmt = $this->cnx->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->body = $row['body'];

    }
 } 