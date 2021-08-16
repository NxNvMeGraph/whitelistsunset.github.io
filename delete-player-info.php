<?php
 include 'header.php';
 if(isset($_GET['id'])){
  $player_info=$player_obj->delete_player_info_by_id($_GET['id']);
 
     
 }else{
  header('Location: index.php');
 }
 
 ?>
