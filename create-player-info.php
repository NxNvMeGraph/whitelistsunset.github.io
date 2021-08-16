<?php
include 'header.php';
if (isset($_POST['create_player'])) {
    $player_obj->create_player_info($_POST);
}
?>
<div class="container"> 
    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">View Whitelisted Players</a> 
        <h3>Add a player to whitelist</h3>
        <hr/>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Character Name:</label>
                <input type="text" name="name" id="name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="steam">Steam Hex:</label>
                <input type="text" class="form-control" name="steam" id="steam" value="steam:" required maxlength="50">
            </div>
			<div class="form-group">
                <label for="D_user">Discord Name:</label>
                <input type="text" name="D_user" id="D_user" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="D_id">Discord ID:</label>
                <input type="text" class="form-control" name="D_id" id="D_id" value="" required maxlength="50">
            </div>
            
            <input type="submit" class="button button-green  pull-right" name="create_player" value="Submit"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

