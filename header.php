<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>UG Whitelist</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/style.css">
		<script src="jquery-3.3.1.min.js"></script>

    </head>
    <body >
	
        <?php
		ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
		include 'protect.php';
        include './class/player.php';
        $player_obj = new Player();
        ?>  
	

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                          <li> <img src="./assets/images/ug.ico" alt="CE" class="tlogo"> </li>
                        <li class="button"><a href="index.php">Home</a></li>
						<li class="button"><a href="create-player-info.php">Add Player</a></li>
                    </ul>

                </div>
            </div>
        </nav>