<?php
// Connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select a database
$database = $mongoClient->Signup;

// Select a collection
$collection = $database->Sign;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Create a document to insert
    $user = [
        "name" => $name,
        "email" => $email,
        "password" => $password
    ];

    // Insert the document into the collection
    $result = $collection->insertOne($user);

    // Check if insertion was successful
    if ($result->getInsertedCount() > 0) {
        // Redirect to home.html after successful signup
        header("Location: home.html");
        exit();
    } else {
        // Handle insertion failure
        echo "Error: Unable to sign up. Please try again.";
    }
}
?>
