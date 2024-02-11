<?php
$credentialsFile = "user_credentials.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];

    // Read user credentials from the credentials file
    $fileContents = file_get_contents($credentialsFile);

    if ($fileContents === false) {
        die("Error reading user credentials file.");
    }

    // Split the file contents into an array of lines
    $lines = explode("\n", $fileContents);

    if ($lines === false) {
        die("Error splitting file contents.");
    }

    // Loop through each line to check for a matching username and password
    foreach ($lines as $line) {
        // Split each line into username and password using a delimiter (e.g., comma)
        $credentials = explode(",", $line);

        if ($credentials === false || count($credentials) < 2) {
            continue; // Skip this line if it doesn't have both username and password
        }

        // Check if the username and password match
        if ($credentials[0] == $username && $credentials[1] == $password) {
            // Authentication successful, redirect to welcome page
            header("Location: welcome.html");
            exit;
        }
    }

    // If no matching username and password found, display error message
    echo "Username not found or wrong password.";
}
?>
