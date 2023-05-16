<?php

namespace Johnverz\FirestoreDemo;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;

class Firestore{

    private FirestoreClient $firestore;

    private string $collectionName;

    private string $documentName;

    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'keyFilePath' => 'keys\blog-e86aa-firebase-adminsdk-mfpsb-ea73f93712.json',
            'projectID' => 'blog-e86aa'
        ]);
    }

    public function getUser() :array
    {
        return $this->firestore->collection("users")->document("e7p0Qc991MaisPYJD3m1")->snapshot()->data();
    }

    public function setCollectionName(string $name): Firestore
    {
        $this->collectionName = $name;
        return $this;
    }

    public function setDocumentName(string $name): Firestore
    {
        !empty($this->collectionName) || die("Collection name not set  yet...");
        $this->documentName = $name;
        return $this;
    }

    public function getDocument(): DocumentReference
    {
        !empty($this->documentName) || die("Document name not set yet...");

        $collection = $this->firestore->collection($this->collectionName);

        if(!$collection->documents()->isEmpty()){
            return $collection->document($this->documentName);
        }

        return $collection->document();
    }

    public function getData(string $key = ""){
        if (!empty($key)){
            return $this->getDocument()->snapshot()->get($key);
        } else {
            return $this->getDocument()->snapshot()->data();
        }
    }
}
