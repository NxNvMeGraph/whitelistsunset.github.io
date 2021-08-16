<?php
include 'header.php';
if (isset($_GET['id'])) {
    $player_info = $player_obj->view_player_by_player_id($_GET['id']);
    if (isset($_POST['update_player']) && $_GET['id'] === $_POST['id']) {
        $player_obj->update_player_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " > 
    <div class="row content">
        <a href="index.php"  class="button button-purple mt-12 pull-right">View Whitelisted Players</a> 
        <h3>Update Player Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($player_info['id'])) {
            echo $player_info['id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="name">Character Name:</label>
                <input type="text" name="name" value="<?php if (isset($player_info['name'])) {
                   echo $player_info['name'];
        } ?>" id="name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="steam">Steam Hex:</label>
                <input type="text" class="form-control" value="<?php if (isset($player_info['steam'])) {
            echo $player_info['steam'];
        } ?>" name="steam" id="steam" required maxlength="50">
            </div>
			<div class="form-group">
                <label for="D_id">Discord ID:</label>
                <input type="text" class="form-control" value="<?php if (isset($player_info['D_id'])) {
            echo $player_info['D_id'];
        } ?>" name="D_id" id="D_id" required maxlength="50">
            </div>
			<div class="form-group">
                <label for="D_user">Discord Username:</label>
                <input type="text" class="form-control" value="<?php if (isset($player_info['D_user'])) {
            echo $player_info['D_user'];
        } ?>" name="D_user" id="D_user" required maxlength="50">
            </div>
			<div class="form-group">
                <label for="Date">Whitelist Date:</label>
                <input type="text" class="form-control" value="<?php if (isset($player_info['Date'])) {
            echo $player_info['Date'];
        } ?>" name="Date" disabled id="date" required maxlength="50">
            </div>
            
            <input type="submit" class="button button-green  pull-right" name="update_player" value="Update"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

