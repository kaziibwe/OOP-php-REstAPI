<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$post = new Post($db);

$data = json_decode(file_get_contents('php://input'));

// file_put_contents('debug_log.txt', json_encode(['received_data' => $data]));

// Ensure that the 'id' property is set before attempting to update
// if (isset($data->id)) {
//     $post->id = $data->id;
//     $post->title = $data->title;
//     $post->body = $data->body;
//     $post->author = $data->author;
//     $post->category_id = $data->category_id;

//     // Check if properties have values before applying functions
//     $post->title = isset($post->title) ? htmlspecialchars(strip_tags($post->title)) : null;
//     $post->body = isset($post->body) ? htmlspecialchars(strip_tags($post->body)) : null;
//     $post->author = isset($post->author) ? htmlspecialchars(strip_tags($post->author)) : null;
//     $post->category_id = isset($post->category_id) ? htmlspecialchars(strip_tags($post->category_id)) : null;
//     $post->id = isset($post->id) ? htmlspecialchars(strip_tags($post->id)) : null;

//     if ($post->update()) {
//         echo json_encode(['message' => 'Post updated.']);
//     } else {
//         echo json_encode(['message' => 'Post not updated.']);
//     }
// } else {
//     echo json_encode(['message' => 'Invalid request.']);
// }





// Debugging: Print received data
// file_put_contents('debug_log.txt', json_encode(['received_data' => $data]));

// Ensure that the 'id' property is set before attempting to update
if (isset($data->id)) {
    $post->id = $data->id;

    // Check if the user with the provided ID exists
    if ($post->userExists($post->id)) {
        // User exists, proceed with updating
        $post->title = $data->title;
        $post->body = $data->body;
        $post->author = $data->author;
        $post->category_id = $data->category_id;

        // Check if properties have values before applying functions
        $post->title = isset($post->title) ? htmlspecialchars(strip_tags($post->title)) : null;
        $post->body = isset($post->body) ? htmlspecialchars(strip_tags($post->body)) : null;
        $post->author = isset($post->author) ? htmlspecialchars(strip_tags($post->author)) : null;
        $post->category_id = isset($post->category_id) ? htmlspecialchars(strip_tags($post->category_id)) : null;
        $post->id = isset($post->id) ? htmlspecialchars(strip_tags($post->id)) : null;
    
        if ($post->update()) {
            echo json_encode(['message' => 'Post updated.']);
        } else {
            echo json_encode(['message' => 'Post not updated.']);
        }

    }
    //  else {
    //     // User does not exist, return a JSON response
    //     echo json_encode(['message' => 'User not available with the provided ID.']);
    // }

} else {
    echo json_encode(['message' => 'Invalid request.']);
}

?>
