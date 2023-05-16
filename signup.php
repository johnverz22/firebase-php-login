<?php
require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccountPath = 'keys\infoman-two-firebase-adminsdk-g4tq3-ef8abc67a6.json';

$serviceAccountJson = file_get_contents($serviceAccountPath);

// Create a service account instance using the provided JSON file
$serviceAccount = ServiceAccount::fromValue($serviceAccountJson);


$factory = (new Factory)
    ->withServiceAccount($serviceAccount);


$auth = $factory->createAuth();
$firestore = $factory->createFirestore();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate= $_POST['birthdate'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);     
    $username = $_POST['username'];
    // Create user account with Firebase Authentication
    $userProperties = [
        'email' => $email,
        'password' => $password,
        'username' => $username,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'birthdate' => $birthdate,

    ];

    $user = $auth->createUser($userProperties);

    // Store additional user data in Firestore
  
    $userDocRef = $firestore->database()->collection('users')->document($user->uid);
    $userDocRef->set([
        'email' => $email,
        'username' => $username,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
    ]);

    // Redirect to success page or perform other actions
    header('Location: index.php');
    exit;
}
?>
