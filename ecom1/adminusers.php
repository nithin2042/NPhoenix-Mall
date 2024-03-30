<?php $menubtn=0;
        $width=1320;
        include 'includes/conn.php';?>
        <?php if(!empty($_POST['firstname1']) && !empty($_POST['lastname1']) && !empty($_POST['pass1']) && !empty($_POST['email1']) && !empty($_POST['phone1'])&& !empty($_POST['address1']) && isset($_POST['add'])){
            setcookie('firstname', $_POST['firstname1']);
            setcookie('lastname', $_POST['lastname1']);
            setcookie('pass', $_POST['pass1']);
            setcookie('email', $_POST['email1']);
            setcookie('phone', $_POST['phone1']);
            setcookie('address', $_POST['address1']);
            header("Location:add_user.php");
        }?>
        <?php if(!empty($_POST['firstname']) && !empty($_POST['Lastname']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['phone'])&& !empty($_POST['address']) && isset($_POST['edit'])){
            setcookie('firstname', $_POST['firstname']);
            setcookie('lastname', $_POST['lastname']);
            setcookie('pass', $_POST['pass']);
            setcookie('email', $_POST['email']);
            setcookie('phone', $_POST['phone']);
            setcookie('address', $_POST['address']);
            header("Location:update_user.php");
        }
        
        ?>
<html>
<head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPHOENIX - A Virtual Mall</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <style id="editbody"></style>
    <?php include 'alladmin.css';
    ?>
    <style>
        .popup3, .popup4, .popup5{
            top:-400px;
        }
        @keyframes drop {
            0%{}
            70%{transform :translateY(490px)}
            100%{transform:translateY(455px)}
        }</style>
</head>
<body>  
        <?php 
            if(array_key_exists('menubutton1', $_POST)){
                $menubtn=1;
                $width=1070;
            }
            if(array_key_exists('menubutton2', $_POST)){
                $menubtn=0;
                $width=1320;
            }
            if($menubtn==0){
                echo "<div class='topbar1'>

                    </div>
                    <div class='leftbar'>
                    <div class='menubutton' style='width:45px;height:45px;'>
                        <form method='post' style='width:45px;height:45px;'>
                            <button type='submit' name='menubutton1' style='width:45px;height:45px;'>
                                <i class='fa fa-bars'></i>
                            </button>
                        </form>
                    </div>
                    </div>
                    ";
                }
                else if($menubtn==1){
                    echo "<div class='topbar1'>
    
                        </div>
                        <div class='leftmenu'>
                            <div class='menubutton' style='width:45px;height:45px;'>
                                <form method='post' style='width:45px;height:45px;'><button type='submit' name='menubutton2' style='width:45px;height:45px;'><i class='fa fa-bars'></i></button></form>
                                <h2>NPHOENIX</h2>
                            </div>
                            <div class='profile1'>
                                <img src='images/thanos1.jpg'>
                                <strong>Code Projects</strong>
                                <p><i class='fa fa-circle'></i> Online</p>
                            </div>
                            <table cellspacing='0'><tr>
                                <td>
                                    <div class='heading'>
                                        <p>Reports</p>
                                    </div>
                                </td></tr>
                                <tr><td>
                                    <div class='options'>
                                    <a href='adminhome.php'><p><i class='fa fa-tachometer'></i> Dashboard</p></a>
                                </div></td></tr>
                                <tr><td>
                                <div class='options'>
                                <a href='adminsales.php'><p><i class='fa fa-history'></i> Sales</p></a>
                                </div></td></tr>
                                <tr><td>
                                <div class='heading'>
                                    <p>Manage</p>
                                </div></td></tr>
                                <tr><td>
                                <div class='options'>
                                <a href='adminusers.php'><p><i class='fa fa-users'></i> Users</p>
                                </div></td></tr>
                                <tr><td>
                                <div class='options'>
                                    <button class='main'id='lastmain' style='text-align:left;'><i class='fa fa-list'></i> Products
                                        <ul> <a href='adminproducts.php'><li class='sub'style='width:200px;text-align:left;'><i class='fa fa-circle'></i> Products list</li>
                                            <a href='admincat.php'><li class='sub' style='width:200px;text-align:left;'><i class='fa fa-circle'></i> Category</li></ul></button>
                                </div></td></tr></table>
                        </div>
                        <div class='spacer' style='width:240px;height: 700px;'></div>";}?>
                        <a href='profile.php' class = 'ppp'><div style="position:absolute;right:63px;top:5px;"><img src='images/thanos1.jpg'   style="float:left;width:35px;height:35px;border-radius:50%;"><p onMouseOver="this.style.color:blue" style="color:white;float:right;margin-top:7px;margin-left:4px;vertical-align:center;">Code Projects</p></div></a>
                        <div class="salesbody" style="width: <?php echo $width;?>px;height: 530px;">
                            <div class="head3"><h2>Users</h2><p>Home > Users</p></div>
                            <button class='addprf' onclick="addFunction()">+ add</button>
                            <div class="s111"><label for="s11">Search :</label><input type="search" name="s11" id = "s11-inp"  ></div>
                            <?php 
                                $search="";
                                if(isset($_POST['s11'])){
                                    $search=$_POST['s11'];
                                }
                            ?>
                            <script>
                                var fn={};
                                var ln={};
                                var pass={};
                                var email={}; 
                                var pn={};
                                var address ={};
                            </script>
                             <div class="s22">
                                <?php if(isset($_POST['thesel']))?>
                                <p>Show <select  name="thesel" id="thesel"><option value="10">10</option>
                                            <option value="20" >20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="500">500</option>                                    
                                        </select> entries
                                </p>
                            </div>
                            <?php 
                                if(isset($_POST['thesel'])){
                                    $rownum=$_POST['thesel'];
                                }
                                else{
                                    $rownum=10000;
                                }
                                
                            ?>
                            <div class="transtable1" cellspacing = "0"><table id="transtable1"><?php
                                echo                        '<tr>
                                <th></th>
                                <th>Photo <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                <th>Email<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                <th>Name<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                <th>Status<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                <th>Date Added<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                <th>Tools<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                            </tr>';
                                if(isset($_COOKIE['sel_val'])){
                                    $search = $_COOKIE['sel_val'];}
                                $query100="SELECT id FROM users";
                                $result100=mysqli_query($conn, $query100);
                                $count=0;
                                $rows = 0;
                                while($row100 = mysqli_fetch_assoc($result100)){
                                    $userid=$row100['id'];
                                $query="SELECT * FROM users WHERE id=$userid";
                                $result=mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($result)){
                                    if($row['type']==0){
                                        $rows++;
                                    echo "<script>";
                                    echo "fn[".$row['id']."] =String('".$row['firstname']."');";
                                    echo "ln[".$row['id']."] =String('".$row['lastname']."');";
                                    echo "pass[".$row['id']."]=String('".$row['password']."');";
                                    echo "email[".$row['id']."]=String('".$row['email']."');";
                                    echo "pn[".$row['id']."] =String('".$row['contact_info']."');";
                                    echo "address[".$row['id']."] =String('".$row['address']."');";
                                    echo "</script>";
                                    echo "<tr>
                                    <td></td>
                                    <td><img src='images/".$row['photo']."'><a href='img_upload1.php?id=".$row['id']."'><button style='background-color:pink;' id = 'image-editor'><i class='fa fa-edit' style='float:right;background-color:magneta;'></i></button></a></td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['firstname']." ".$row['lastname']."</td>
                                    <td><b style='color:white;background-color:rgba(10,200,10);padding:5px 10px;font-size:10px;'>active</b></td>
                                    <td>".$row['created_on']."</td>
                                    <td><a href='cart_view.php?userid1=".$row['id']."'><button style='background-color:rgba(0,200,200,0.7);' ><i class='fa fa-search'></i>cart</button></a><button onclick='editFunction(".$row['id'].")'><i class='fa fa-edit'></i>edit</button><button onclick='delFunction(".$row['id'].")' style='background-color:rgba(255,20,20,0.9);'><i class='fa fa-trash-o'></i>delete</button></td>
                                </tr>";}}}
                            ?></table></div>
                                        </div>

                                <div class="popup3" id="popup3" enctype="multipart/form-data">
                                <form method="POST"><h3 style="color:white;margin-left:20px;">UPDATE USER</h3>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:8px;color:White;">First Name</label>
                                <input id="fn" name="firstname" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:28px;border-radius :5px;" type="text" placeholder="First Name">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:66px;color:White;">Last Name</label>
                                <input id="ln" name="Lastname" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:86px;border-radius :5px;" type="text" placeholder="Last Name">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:126px;color:White;">Password</label>
                                <input id="pass" name="pass" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:143px;border-radius :5px;" type="password" placeholder="Password">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:186px;color:White;">Email</label>
                                <input id="email" name="email" type="text" id="email" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:205px;color:gray;border-radius :5px;" placeholder="Email">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:245px;color:White;">Phone Number</label>
                                <input id="pn" name="phone" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:267px;border-radius :5px;" type="text" placeholder="Phone Number">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:309px;color:White;">Address</label>
                                <textarea id="address" name="address" style="border: 1px solid lightgray;width:450px;height:105px;position:absolute;left:17%;margin-top:329px;border-radius :5px;" placeholder="Add Address here"></textarea>
                                <button onclick="closeFunction()" class = "glow-on-hover"style="background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:17%;border:1px solid lightgray;border-radius :5px;">CLOSE</button>
                                <button  onclick="closeFunction()" class = "glow-on-hover" id="edit" name="edit" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:480px;border-radius :5px;border:1px solid lightgreen;background-color:green;"><i class="fa fa-check-square-o fa-lg  fa-pulse" style="color:white"></i>  Update</button></form>
                            </div>

                            <div class="popup4" id="popup4">
                                <form method="POST"  ><h3 style="color:white;margin-left:20px;">ADD NEW USER</h3>
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:8px;color:White;">First Name</label>
                                <input name="firstname1" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:28px;border-radius :5px;" type="text" placeholder="First Name">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:66px;color:White;">Last Name</label>
                                <input name="lastname1" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:86px;border-radius :5px;" type="text" placeholder="Last Name">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:126px;color:White;">Password</label>
                                <input name="pass1" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:143px;border-radius :5px;" type="text" placeholder="Password">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:185px;color:White;">Email</label>
                                <input name="email1" type="email" id="email1" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:205px;color:gray;border-radius :5px;" placeholder="Email">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:245px;color:White;">Phone Number</label>
                                <input name="phone1" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:267px;border-radius :5px;" type="text" placeholder="Phone Number">
                                <label for="" style="width:450px;height:35px;position:absolute;left:17%;margin-top:309px;color:White;">Address</label>
                                <textarea name="address1" style="border: 1px solid lightgray;width:450px;height:105px;position:absolute;left:17%;margin-top:329px;border-radius :5px;" placeholder="Add Address here"></textarea>
                                <button onclick="closeFunction2()" class="glow-on-hover" style="background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:16%;border:1px solid lightgray;border-radius :5px;">CLOSE</button>
                                <button  onclick="closeFunction2()" class="glow-on-hover" id="add" name="add" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:490px;border-radius :5px;border:1px solid white;background-color:dodgerblue"><i class='fa fa-plus-circle fa-lg' style='color:#ffffff'></i> ADD</button></form>
                            </div>

                            <div class="popup5" id="popup5">
                                <h3 style="color:white;margin-left:20px;">Deleting...</h3>
                                <h4 style="color:white;text-align:center;">Do you really want to delete the selected user</h4>
                                <button  class="glow-on-hover" onclick="closeFunction1()" style="background:transparent;color:white;padding:7 20;position:fixed;top:130px;margin-left:30px;border:1px solid lightgray;border-radius :5px;">CLOSE</button>
                                <form action="delete_user.php" method="post"><button class="glow-on-hover" id="del" name="del" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:130px;margin-left:580px;border:1px solid white;border-radius :5px;border-radius:3px;background-color:rgb(124,10,2)"><i class="fa fa-trash-o fa-lg  fa-pulse" style="color:white"></i> Delete</button></form>
                            </div>
                            <script>
                                var ts=0;
                                function editFunction(i) {
                                    var popup = document.getElementById('popup3');
                                    popup.classList.add('show');
                                    document.getElementById('fn').value=fn[i];
                                    document.getElementById('ln').value=ln[i];
                                    document.getElementById('pass').value=pass[i];
                                    document.getElementById('email').value=email[i];
                                    document.getElementById('pn').value=pn[i];
                                    document.getElementById('address').innerHTML=address[i];
                                    popup.style.animation ="drop 0.5s ease forwards";
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers {filter: blur(2px);}";
                                    document.cookie="id="+i;
                                    }
                                    
                            </script>
                            <script>
                                function closeFunction(){
                                    var popup = document.getElementById('popup3');
                                    popup.classList.remove('show');
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=""; 
                                }
                            </script>
                            <script>
                                function delFunction(i) {
                                    var popup = document.getElementById('popup5');
                                    popup.classList.add('show');
                                    popup.style.animation ="drop 0.5s ease forwards";
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf, .numbers {filter: blur(2px);}";
                                    document.cookie="id1="+i;}
                            </script>
                            <script>
                                function closeFunction1(){
                                    var popup = document.getElementById('popup5');
                                    popup.classList.remove('show');
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=""; 
                                }
                            </script>
                            <script>
                                function addFunction() {
                                    var popup = document.getElementById('popup4');
                                    popup.classList.add('show');
                                    popup.style.animation ="drop 0.5s ease forwards";
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers {filter: blur(2px);}";
                                }
                                    
                            </script>
                            <script>
                                function closeFunction2(){
                                    var popup = document.getElementById('popup4');
                                    popup.classList.remove('show');
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=""; 
                                }
                            </script>
                            <script>
                                        function change(){
                                            document.getElementById("form").submit();
                                            document.getElementById("form").preventDefault();
                                        }
                                        function change1(){
                                            document.getElementById("s11").submit();
                                        }
                                    </script>
                                 <script>
                                    var x = document.getElementById('s11-inp');
                                                    x.addEventListener("input", e => {
                                                                            const value = e.target.value;
                                                                            console.log(value);
                                                                            document.cookie = "sel_val ="+ value;
                                                                        });
                                    var y = document.getElementById('thesel');
                                                    y.addEventListener("input", e => {
                                                                            const value1 = e.target.value;
                                                                            console.log(value1);
                                                                            document.cookie = "user_rows ="+ value1;
                                        });
                                            function loadDoc() {
                                                var xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("transtable1").innerHTML = this.responseText;
                                                    }
                                                };
                                                xhttp.open("GET", "fetcher.php", true);
                                                xhttp.send();
                                                }
                                                setInterval(() => {
                                                    loadDoc();
                                                }, 1000);
                                            loadDoc();
                                    </script>

                            </body>
                            
                            </html>
                