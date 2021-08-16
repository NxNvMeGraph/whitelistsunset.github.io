<?php
 include 'header.php';
 

 if(isset($_GET['id'])){
	$player_info=$player_obj->view_player_by_player_id($_GET['id']);
  
 }
 else{
  header('Location: index.php');
 }
 ?>
<div class="container " > 
    
  <div class="row content">

       
          
           
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View Whitelisted Players</a> 
     
 <h3>View Player Info</h3>
       
    
     <hr/>
   
   
 
          <label >ID:</label>
   <?php  if(isset($player_info['id'])){echo $player_info['id']; }?>
   <br/>
    <label >Character Name:</label>
   <?php  if(isset($player_info['name'])){echo $player_info['name']; }?>

<br/>
    <label>Steam hex :</label>
  <?php  if(isset($player_info['steam'])){echo $player_info['steam'];} ?>
  <br/>
  
  <label>Discord Name :</label>
  <?php  if(isset($player_info['D_id'])){echo $player_info['D_id'];} ?>
  <br/>
  <label>Discord ID :</label>
  <?php  if(isset($player_info['D_user'])){echo $player_info['D_user'];} ?>
  <br/>
  <label>Whitelist Date :</label>
  <?php  if(isset($player_info['Date'])){echo $player_info['Date'];} ?>
    <br/>
  

          

    <a href="<?php echo 'update-player-info.php?id='.$player_info["id"] ?>" class="button button-blue">Edit</a>

   
  
     
   
  </div>
     
</div>
<hr/>
 <?php
 include 'footer.php';
 ?>

