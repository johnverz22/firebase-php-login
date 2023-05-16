<?php 
require_once __DIR__ . '/vendor/autoload.php';


//SETUP CLIENT
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\BulkWriter;

$db = new FirestoreClient([
        'keyFilePath' => 'keys\blog-e86aa-firebase-adminsdk-mfpsb-ea73f93712.json', //only for development
        'projectID' => 'blog-e86aa'
]);


//SINGLE DATA

$userColRef = $db->collection("users");
/*
$document = $collection->add([
    'name' => 'user01',
    'email'=>'user01@example.com',
    'firstname' => 'Dummy',
    'lastname' => 'User',
    'password' => password_hash("user", PASSWORD_DEFAULT)
]);
*/
//BULK ADD DATA USING CSV
/*
$csv = fopen("src/users.csv", "r");

if ($csv !== false){
    
    $batch = $db->bulkWriter(); //start bulk writing
    while (($row = fgetcsv($csv)) !==false){ //loop through each row
        $newDocRef = $userColRef->add(); 
        $batch->create($newDocRef, [
            'name'=>$row[0],
            'email'=>$row[1],
            'firstname'=>$row[2],
            'lastname'=>$row[3],
            'password'=>$row[4],
        ]);


        $userColRef->add([
            'name'=>$row[0],
            'email'=>$row[1],
            'firstname'=>$row[2],
            'lastname'=>$row[3],
            'password'=>$row[4],
        ]);
    }
    //$batch->flush(); //perform the batch write 

}else{
    echo "CSV not found...";
}
*/

//READING records

//deleting record
$snapshots = $db->collection("users")->documents();
foreach($snapshots as $ss){
    if(empty($ss->data)){
        $ss->reference()->delete();
    }
}
