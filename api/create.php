
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);


//headers
// use * to allowing anyone without the problem about authentication 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// other headers
//for save or create query 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Athorization, X-Requested-With');
//initializing our api
//to load our pathes
include_once('../core/initialize.php');


//instantiate post
$post = new Post($db);

 //get row posted data
 $data = json_decode(file_get_contents('php://input'));

 $post->title = $data->title;
 $post->body = $data->body;
 $post->author = $data->author;
 $post->category_id = $data->category_id;

 //create post
 if($post->create()){
     echo json_encode(
         array('message' => 'Post created.')
     );
 } else {
     echo json_encode(
         array('message' => 'Post not created.')
     ); 
 }
?>