
<?php
    include '../../includes/conn.php';
    if(!empty($_POST['mail33'])){
        $ct=0;
        $m=$_POST['mail33'];
        $query="SELECT email FROM users";
                $result=mysqli_query($conn,$query);
                $stmt = $conn->prepare($query);
                $stmt->execute();
                while($row = mysqli_fetch_assoc($result)){
                    if($row['email']==$m){
                    $ct++;}
                }
                if($ct==1){
                    header("Location:send_link.php?mail=".$_POST['mail33']);
                }
                else{
                    echo "<script>alert('This Email Doesnt Exist Please Check for spellings or Create a New Account');</script>";
                }
    }
?>
<html>
    <head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>NPHOENIX Login</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <style>
               html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 20px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}


.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%, 100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
    </style>
</head>
    <body>
    <?php
    include 'includes/conn.php';
    if(!empty($_POST['mail33'])){
        $ct=0;
        $m=$_POST['mail33'];
        $query="SELECT email FROM users";
                $result=mysqli_query($conn,$query);
                $stmt = $conn->prepare($query);
                $stmt->execute();
                while($row = mysqli_fetch_assoc($result)){
                    if($row['email']==$m){
                    $ct++;}
                }
                if($ct==1){
                    header("Location:send_link.php?mail=".$_POST['mail33']);
                }
                else{
                    echo "<script>alert('This Email Doesnt Exist Please Check for spellings or Create a New Account');</script>";
                }
    }
?>
            
            <div class="login-box">
                <h2>ENTER REGISTER MAIL TO RESET PASSWORD</h2>
                <form method = "post" id = login_form>
                <div class="user-box">
                    <input type="email" name="mail33" required="">
                    <label>Email</label>
                </div>
                <input type="submit" hidden>
                <a onclick="myFunction()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit
        </a>
                <a href="signup.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Sign Up
                </a>
                <a href="login.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    I Remember Password
                </a>
                <a href="index.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    GO Back to Home
                </a>
            </form>
        </div>
        <script>
            function myFunction(){
                document.getElementById("login_form").submit();
            }
        </script>
    </body>
</html>
