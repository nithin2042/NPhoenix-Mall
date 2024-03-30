<html>
  <head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <style>
    body{
        background: linear-gradient(90deg, rgba(0,0,15), rgba(0,0,25));
    }
    .profilepage{
        width: 700px;
        height: 550px;
        background:url(https://i.pinimg.com/originals/89/ab/f2/89abf2fc2254e5e10aaaac6331c07e96.gif);
        border:4px solid lightgreen;
        border-radius:4px;
        margin-left:350px;
        margin-top :50px;
        padding :50 50;
        color:white;
        background-filter: blur(0px);
    }
    img{
        max-height:250px;
    }
    button{
        padding:10 20;
        border:3px solid lightgreen;
        border-radius:7px;
    }
    input{
        border-radius:7px;
    }
    textarea{
        border-radius:7px;
    }
    .popup3{
    width: 700px;
    height: 600px;
    border: 1px solid lightgray;
    position: fixed;
    top:45px;
    left:26%;
    visibility: hidden;
    background:url(https://i.pinimg.com/originals/89/ab/f2/89abf2fc2254e5e10aaaac6331c07e96.gif);
    border-radius:27px;
   }
   .popup5{
    width: 700px;
    height: 180px;
    border: 1px solid lightgray;
    position: fixed;
    top:45px;
    left:26%;
    visibility: hidden;
        background:url(https://i.pinimg.com/originals/89/ab/f2/89abf2fc2254e5e10aaaac6331c07e96.gif);
        border-radius:27px;
   }
   .show{
    visibility:visible;
   }
   button:hover{
    cursor: pointer;
    border:3px solid white;
   }
   button.login-box:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}
table td:nth-child(1){
    color:#03e9f4; 
}
table td:nth-child(2){
    color:white; 
}
h2:hover{
    text-shadow:1px 1px lightgreen;
}
        .popup3, .popup4, .popup5{
            top:-400px;
        }
        @keyframes drop {
            0%{}
            70%{transform :translateY(490px)}
            100%{transform:translateY(450px)}
        }
    </style>
    <style id="editbody"></style>
  </head>  
  <body>
                <?php
                include '../../ecom1/includes/conn.php';
                if(isset($_POST['edit'])){
                if(!empty($_POST['firstname']) && !empty($_POST['Lastname']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['phone'])&& !empty($_POST['address'])){
                    setcookie('firstname11', $_POST['firstname']);
                    setcookie('lastname11', $_POST['Lastname']);
                    setcookie('pass11', $_POST['pass']);
                    setcookie('email11', $_POST['email']);
                    setcookie('phone11', $_POST['phone']);
                    setcookie('address11', $_POST['address']);
                    header("Location:selfupdate_user.php");
                }}
                $r=$_COOKIE['userid'];
                $query="SELECT * FROM users WHERE id=$r";
                $result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="profilepage">
                        <img src="../../ecom1/images/'.$row['photo'].'" alt="">
                        <table>
                        <tr><td><h2>Name          </td><td> <h3> : '.$row['firstname'].' '.$row['lastname'].'</h2></td></tr>
                        <tr><td><h2>Email         </td><td>  <h3>: '.$row['email'].'</h2></td></tr>
                        <tr><td><h2>Password      </td><td>  <h3>: '.$row['password'].'</h2></td></tr>
                        <tr><td><h2>Contact Number</td><td>  <h3>: '.$row['contact_info'].'</h2></td></tr>
                        <tr><td><h2>Address       </td><td>  <h3>: '.$row['address'].'</h2></td></tr></table><br>
                        <a href="logout.php"><button class="login-box">Logout</button></a><button onclick="editFunction('.$row['id'].')" style="float:right;" class = "login-box">Update</button>';
                        $f1=$row['firstname'];
                        $l1=$row['lastname'];
                        $e1=$row['email'];
                        $p1=$row['password'];
                        $a1=$row['address'];
                        $c1=$row['contact_info'];
                        if($_COOKIE['logintype']==0){echo '<button class = "login-box" onclick="delFunction('.$row['id'].')" style="float:right;margin-right:15px;">Delete</button>';}
                        echo '';}
                        ?>
                        <a href="img_upload2.php"><button style="position:absolute;left: 640px;top:44%;background-color:lightgreen;color:white;padding:5 5;"><i class="fa fa-edit"></i></button></a>
                        <a onclick="history.back()"><button style="position:absolute;left: 360px;top:7%;background-color:lightgreen;color:white;padding:15 15;border-radius:5px;"><i class="fa fa-arrow-left" ></i></button></a></div>

                            <div class="popup3" id="popup3" enctype="multipart/form-data">
                                <form method="POST"><h3 style="color:white;margin-left:20px;">UPDATE USER</h3>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:8px;color:White;">First Name</label>
                                <input name="firstname" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:28px;" type="text" value = <?php echo $f1;?>>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:66px;color:White;">Last Name</label>
                                <input name="Lastname" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:86px;" type="text" value = <?php echo $l1;?>>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:126px;color:White;">Password</label>
                                <input name="pass" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:143px;" type="password" value = <?php echo $p1;?>>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:188px;color:White;">Email</label>
                                <input name="email" type="text" id="email" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:205px;color:gray;" value = <?php echo $e1;?>>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:245px;color:White;">Phone Number</label>
                                <input name="phone" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:267px;" type="text" value = <?php echo $c1;?>>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:309px;color:White;">Address</label>
                                <textarea name="address" style="border: 1px solid lightgray;width:450px;height:105px;position:absolute;left:17%;margin-top:329px;" type="text" ><?php echo $a1;?></textarea>
                                <button onclick="closeFunction()" style="background:transparent;color:white;padding:7 20;position:fixed;top:530px;margin-left:120px;border:3px solid #b43757;border-radius:7px;background-color:rgb(124,10,2);">Close</button>
                                <button  onclick="closeFunction()" id="edit" name="edit" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:530px;margin-left:480px;border-radius:7px;background-color:green;"><i class="fa fa-check-square-o fa-lg  fa-pulse" style="color:white"></i>  Update</button></form>
                            </div>
                            <div class="popup5" id="popup5">
                                <h3 style="color:white;margin-left:20px;">Deleting...</h3>
                                <h4 style="color:white;text-align:center;">Do you really want to delete the your account</h4>
                                <button onclick="closeFunction1()" style="background:transparent;color:white;padding:7 20;position:fixed;top:120px;margin-left:30px;border:1px solid lightgray;border-radius:7px;">Close</button>
                                <form action="selfdelete_user.php" method="post"><button  id="del" name="del" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:120px;margin-left:580px;border:3px solid #b43757;border-radius:7px;background-color:rgb(124,10,2)"><i class="fa fa-trash-o fa-lg  fa-pulse" style="color:white"></i> Delete</button></form>
                            </div>
    
                            <script>
                                var ts=0;
                                function editFunction(i) {
                                    var popup = document.getElementById('popup3');
                                    popup.classList.add('show');
                                    popup.style.animation ="drop 0.5s ease forwards";
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".profilepage {filter: blur(20px);}";
                                    document.cookie="id11="+i;
                                    }
                                    
                            </script>
                            <script>
                                function closeFunction(){
                                    var popup = document.getElementById('popup3');
                                    popup.classList.remove('show');
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=""; 
                                    event.preventDefalut();
                                }
                                </script>
                            <script>
                                function delFunction() {
                                    var popup = document.getElementById('popup5');
                                    popup.classList.add('show');
                                    popup.style.animation ="drop 0.5s ease forwards";
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".profilepage {filter: blur(20px);}";}
                            </script>
                            <script>
                                function closeFunction1(){
                                    var popup = document.getElementById('popup5');
                                    popup.classList.remove('show');
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=""; 
                                }
                            </script>
    
                        </body>


</html>