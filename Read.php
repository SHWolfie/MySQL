<?php
  // Headers
  header('access-Control-Allow-Origin: *');
  header('Content-type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($bd);

  // Blog post Query
  $Result = $post->read();
  // Get Row Count
  $num = $Result->rowCount();

  // Check if any posts
  if($num > 0) {
      // Post array
      $posts_arr = array();
      $posts_arr['data'] = array();

      while($row = $Result->fetch(pdo::FETCH_ASSOC)) {
          extract($row);

          $post_item = array(
              'id' => $id,
              'title' => $title,
              'body' => html_entity_decode($body),
              'author' => $author,
              'Category_id' => $category_id,
              'category_name' => $category_name
        );
        
        // Push to "data"
        array_push($posts_arr['data'], $post_item);
     }
        // Turn to JSON & output
        echo json_encode($posts_arr);

  } else {
    // No Posts
    Echo json_encode(
        array('message' => 'no Posts found')
    );
}