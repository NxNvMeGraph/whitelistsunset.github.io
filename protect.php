<?php


// Add login/password pairs below, like described above
// NOTE: all rows except last must have comma "," at the end of line
$LOGIN_INFORMATION = array(
  'admin' => 'admin'
);

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
define('LOGOUT_URL', 'http://localhost/whitelist.php');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 2);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

##################################################################
#  SETTINGS END
##################################################################


///////////////////////////////////////////////////////
// do not change code below
///////////////////////////////////////////////////////

// show usage example
if(isset($_GET['help'])) {
  die('Include following code into every page you would like to protect, at the very beginning (first line):<br>&lt;?php include("' . str_replace('\\','\\\\',__FILE__) . '"); ?&gt;');
}

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
  setcookie("verify", '', $timeout, '/'); // clear password;
  header('Location: ' . LOGOUT_URL);
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {
?>
<html>
   <head>
      <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
      <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
      <title>LOGIN</title>
      <style>
         body {
         background-color: black;
         background-image: url('https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fGhhY2tlcnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: cover;
         }
         input[type=text] {
         color: white;
         }
         h1 {
         color: white;
         font-size: 40px !important;
         }
         *{
         font-family: "Impact" !important;
         }
      </style>
   </head>
   <body>
      <center>
         <div class="container">
         <div class="z-depth-1 grey darken-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 5px solid #2962ff; border-radius: 20px !important;">
         <form class="col s12" method="post" action="">
            <div class='row'>
               <div class='col s12'>
               </div>
            </div>
            <div style="width:500px; margin-left:auto; margin-right:auto; text-align:center">
         <form method="post">
         <font color="red"><?php echo $error_msg; ?></font><br />
         <?php if (USE_USERNAME) echo 'Login:<br /><input type="input" class="col s12 btn btn-large waves-effect red" style="border-radius: 20px !important;" placeholder="Username" name="access_login" /><br /><br />'; ?>
         <input type="password" class='col s12 btn btn-large waves-effect red' placeholder="Password" style="border-radius: 20px !important;" name="access_password" /><p></p><input type="submit" class='col s12 btn btn-large waves-effect red' style="border-radius: 20px !important;" name="Submit" value="Submit" />
         </form>
         <br />
         </div>
      </center>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
   </body>
</html>
<?php
  // stop at this point
  die();
}
}

// user provided password
if (isset($_POST['access_password'])) {

  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) ) 
  ) {
    showLoginPasswordProtect("Incorrect password.");
  }
  else {
    // set cookie if password was validated
    setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
    
    // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
    // So need to clear password protector variables
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }

}

else {

  // check if password cookie is set
  if (!isset($_COOKIE['verify'])) {
    showLoginPasswordProtect("");
  }

  // check if cookie is good
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['verify'] == md5($lp)) {
      $found = true;
      // prolong timeout
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("verify", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
    showLoginPasswordProtect("");
  }

}

?>
