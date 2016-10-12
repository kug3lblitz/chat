<?php
session_start();
 
function loginForm(){
    echo'
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Please enter your name to continue:</p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Service Chat</title>
</head>
<body>

<style>

body {
  font:12px arial;
  color: #222;
  text-align:center;
  padding:35px; 
}
  
form, p, span {
  margin:0;
  padding:0; 
}
  
input { font:12px arial; }
  
a {
  color:#0000FF;
  text-decoration:none; 
}
  
a:hover { text-decoration:underline; }
  
#wrapper, #loginform {
  margin:0 auto;
  padding-bottom:25px;
  background:#EBF4FB;
  width:504px;
  border:1px solid #ACD8F0; 
}
  
#loginform { padding-top:18px; }
  
#loginform p { margin: 5px; }
  
#chatbox {
  text-align:left;
  margin:0 auto;
  margin-bottom:25px;
  padding:10px;
  background:#fff;
  height:270px;
  width:430px;
  border:1px solid #ACD8F0;
  overflow:auto; 
}
  
#usermsg {
  width:395px;
  border:1px solid #ACD8F0; 
}
  
#submit { width: 60px; }
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; }
  
.logout { float:right; }
  
.msgln { margin:0 0 2px 0; }

</style>
    
<?php
if(!isset($_SESSION['name'])){
    loginForm();
}
else{
?>
    <div id="wrapper">
        <div id="menu">
            <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            <div style="clear:both"></div>
        </div>

        <div id="chatbox"></div>

        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" size="63">
            <input name="submitmsg" type="submit" id="submitmsg" value="Send">
        </form>

    </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<?php
}
?>
</body>
</html>
