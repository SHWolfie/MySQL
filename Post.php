<?php
 class Post {
     //DB Stuff
     private $conn;
     private $table = 'post';

     // Post Properties
     public $sid;
     public $category_id;
     public $category_name;
     public $title;
     public $body;
     public $author;
     public $created_at

     // Constructor with DB
     public function _construct($db) {
         $this->conn = $bd;
     }
 
    // Get Posts
public function read() {
    // Create Query
    $query = 'SELECT
             c.name as category_name,
             p.id,
             p.category_id,
             p.title,
             p.body,
             p.author,
             p.created_at,
            FROM
              ' . $this->table . ' p
              LEFT JOIN
                categories c ON p.category_id = c.id
            ORDER BY
               p.created_at DESC'

    // Prepare statement
    $stmt = $this->conn->prepare($squery);

    // Execute query
    $stmt->execute();
    
    return $stmt;

}
 }               