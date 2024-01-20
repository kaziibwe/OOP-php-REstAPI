<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Athorization, X-Requested-With');

// initializing our API
include_once('../core/initialize.php');

// instantiate post
$post = new Post($db);

// get row posted data
$data = json_decode(file_get_contents('php://input'));




if (isset($data->id) || isset($_GET['id'])) {
    $post->id = isset($data->id) ? $data->id : $_GET['id'];

    // Check if the user with the provided ID exists
    if ($post->userExists($post->id)) {
        // Continue with the deletion logic
        if ($post->delete()) {
            echo json_encode(['message' => 'Post deleted.']);
        } else {
            echo json_encode(['message' => 'Post not deleted.']);
        }
    } else {
        // User does not exist, return a JSON response
        echo json_encode(['message' => 'User not available with the provided ID.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request.']);
}

?>


