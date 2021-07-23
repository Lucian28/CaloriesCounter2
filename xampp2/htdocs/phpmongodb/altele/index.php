<?php
require_once('.\MongodbDatabase.php');

$db=new MongodbDatabase;
$space="\n";

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title> Alimentele din baza de date </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>


<?php 
// check if we have data to insert information about videos to mongodb databasse


if( isset ( $_POST['videoTitle'])){
    if( ! empty($_POST['videoTitle'])) {
       $insertable = $db->insertNewItem([
    'videoTitle' => $_POST['videoTitle'],
    'videoLink'  => $_POST['videoLink'],
    'videoID' =>  $_POST['videoID'],
    'videoArtist' =>  $_POST['videoArtist']
    
    
          ]);
          if($insertable){
              ?>
<div class="container">
 <div class="panel">
    <h3> New video has inserted. </h3>
  </div>
 </div>
              <?php
          }
       }
    }
?>


 <div class="container">
  <div class="col-sn-6">
    <div class="panel panel-default">
      <div class="panel-heading">
       <b> Add a video </b>
       </div>
       <div class="panel-body">
        <form action="index.php" method="POST">

          <div class="form-group">
           <input type="text" name="videoTitle" id="" class="form-control" placeholder="Video Title">
           </div>
           <div class="form-group">
           <input type="text" name="videoLink" id="" class="form-control" placeholder="Video Link">
           </div>
           <div class="form-group">
           <input type="text" name="videoID" id="" class="form-control" placeholder="Video Id">
           </div>
           <div class="form-group">
           <input type="text" name="videoArtist" id="" class="form-control" placeholder="Video Artist">
           </div>
           <div class="form-group">
           <input type="submit" class="btn btn-danger" value="Add video">
           </div>
 </form>
 </div>
</div>
</div>
<div class="col-sm-6">
  <h1> Playlists </h1>
  <ul class="list-group">
  <?php

   foreach( $db->fetchPlaylist() as $item){
  ?>

 <li class="list-group-item">
 <a href="./index.php?item=<?php echo $item->_id?>">
 <?php echo $item->videoTitle. "</p>\n"  ,$item->videoLink. "</p>\n",
            $item->videoID. "</p>\n",$item->videoArtist. "</p>\n"?>
 </a>
 </li>

   <?php
        
   }
   ?>
   </ul>
 </div>
</div>
</body>
</html>