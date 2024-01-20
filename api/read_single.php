<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include_once('../core/initialize.php');

//instantiate post
$post = new Post($db);

// Get the user ID from the request or exit with an error
$post->id = isset($_GET['id']) ? $_GET['id'] : die(json_encode(['message' => 'User ID is required.']));

// Check if the user exists
if ($post->userExists($post->id)) {
    // User exists, fetch and print details
    $post->read_single();  // Fetch details from the database

    $post_arr = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name,
    );

    // Set HTTP response code to 200 OK
    http_response_code(200);

    // Print JSON response
    echo json_encode($post_arr);
} else {
    // User not found, set HTTP response code to 404 Not Found
    http_response_code(404);

    // Print JSON response
    echo json_encode(['message' => 'User not found.']);
}
?>
