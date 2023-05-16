<?php
require 'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use GuzzleHttp\Client;

// Path to your service account JSON file
$serviceAccountPath = '/path/to/serviceAccountKey.json';

// Create a service account instance using the JSON file
$serviceAccount = ServiceAccount::fromJsonFile($serviceAccountPath);

// Create a Firebase factory with the service account
$factory = (new Factory)
    ->withServiceAccount($serviceAccount);

// Create the Firebase Authentication instance
$auth = $factory->createAuth();

// Firebase configuration
$firebaseConfig = [
    'apiKey' => 'YOUR_API_KEY',
    'authDomain' => 'YOUR_PROJECT_ID.firebaseapp.com',
    'databaseURL' => 'https://YOUR_PROJECT_ID.firebaseio.com',
    'projectId' => 'YOUR_PROJECT_ID',
    'storageBucket' => 'YOUR_PROJECT_ID.appspot.com',
    'messagingSenderId' => 'YOUR_SENDER_ID',
    'appId' => 'YOUR_APP_ID',
];

// Initialize the Firebase JavaScript SDK
$firebaseJsSdkUrl = 'https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js';
echo "<script src='$firebaseJsSdkUrl'></script>";

// Initialize Firebase with your configuration
echo "<script>firebase.initializeApp(" . json_encode($firebaseConfig) . ");</script>";

// Login functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $idToken = $signInResult->idToken();

        // Store the Firebase ID token securely or use it as needed

        echo "Login successful!";
    } catch (\Exception $e) {
        echo "Login failed: " . $e->getMessage();
    }
}
?>

<!-- HTML form for login -->
<form method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Log in">
</form>
