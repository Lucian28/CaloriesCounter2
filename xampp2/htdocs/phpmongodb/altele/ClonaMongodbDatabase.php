<?php

require_once('vendor/autoload.php');

class MongodbDatabase{

    

    function __construct(){
    $this->db = (new MongoDB\Client)->videoPlaylists->videos;
    }

    public function insertNewItem($itemInfo=[])
    {
   if( empty ( $itemInfo ) ) {
       return false;
   }
   // daca avem date, le inseram
   $insertable = $this->db->insertOne([
       'videoTitle' => $itemInfo['videoTitle'],
       'videoLink'  =>  $itemInfo['videoLink'],
       'videoID' =>  $itemInfo['videoID'],
       'videoArtist' =>  $itemInfo['videoArtist']
   ]);   
// return this inserted documents mongodb id
return $insertable->getInsertedId();
}

public function fetchPlaylist(){ // aici am putea adauga parametrii pentru limitarea nr. de afisari.. etc
return $this->db->find();
}




}
