<?php $menubtn=0;
        $width=1320;
       if(isset($_GET['prodid'])){
        $prodid=$_GET['prodid'];
       }
       else{
        $prodid=0;
       }
       $blur=0;
        include 'includes/conn.php'; 
    ?>
    <?php if(!empty($_POST['newcat']) && isset($_POST['add'])){
                setcookie('newcat',$_POST['newcat']);
                header("Location:add_cat.php");
            }
            if(!empty($_POST['newname']) && isset($_POST['edit'])){
                setcookie('newname',$_POST['newname']);
                header("Location:update_cat.php");
            }?>
<html>
<head>
<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>NPHOENIX - A Virtual Mall</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <?php include 'alladmin.css';?>
        <style id="editbody">
                        </style>
                        <style>
        .popup, .popup1, .popup2{
            top:-400px;
        }
        @keyframes drop {
            0%{}
            70%{transform :translateY(490px)}
            100%{transform:translateY(455px)}
        }
                        </style>
</head>
    <body id="body">  
        <div class="blur" id="blur">
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
                            <div class="head3"><h2>Category List</h2><p>Home > Products > Category List</p></div>
                            <button onclick="addFunction()" class='addprf'>+ add</button>
                            
                            <div class="s111"><label for="s11">Search : </label><input type="search" name="s11" id="catsearch"></div>
                            <?php 
                                $search="";
                                if(isset($_POST['s11'])){
                                    $search=$_POST['s11'];
                                }
                            ?>
                            
                            <div class="s22">
                                <p>Show <select name="thesel" id="catsel" >
                                            <option value="1000000">Auto</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="500">500</option>                                    
                                        </select> entries
                                </p>
                            </div>
                            <?php 
                                $rownum=10000;
                                if(isset($_POST["thesel"])){
                                    $rownum=$_POST["thesel"];
                                }?>
                                 <script>
                                        function change(){
                                            document.getElementById("form").submit();
                                        }
                                        function change1(){
                                            document.getElementById("form1").submit();
                                        }
                                    </script>
                            <div class="transtable3"><table id='transtable1'>
                                <tr>
                                    <th></th>
                                    <th>Category Name <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Tools<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                </tr>
                                <script>var dict={};</script>
        <?php
            $query100="SELECT id FROM category  WHERE name LIKE '%$search%' or cat_slug LIKE '%$search%'";
            $result100=mysqli_query($conn, $query100);
            $count=0;
            $rows = 0;
            while($row100 = mysqli_fetch_assoc($result100)){
                $userid=$row100['id'];
            $query="SELECT * FROM category WHERE id=$userid" ;
            $result=mysqli_query($conn,$query);
            if($count<$rownum){
                $count++;
                while($row = mysqli_fetch_assoc($result)){
                    $rows++;
                    echo "<script>
                    dict['".$row['id']."'] = '".$row['name']."'</script>";
                        echo "<tr>
                        <td></td>
                        <td>".$row['name']."</td>
                        <td>";echo '<button id="catedit" name="cateid" onClick="editFunction('.$r1.')" style="display:inline-block;padding:5 10;">'; echo"<i class='fa fa-edit'></i>Edit</button><button style='display:inline-block;background-color:red;padding:5 10;'onClick='delFunction(".$row['id'].")' id='del' style='background-color:rgba(255,20,20,0.7);'><i class='fa fa-trash-o'></i>Delete</button></td></td>
                    </tr>";
                }  }}
                if($rownum==10000){
                    $rownum=$rows;
                }
        ?>
            </table></div>
        <?php
        if(array_key_exists('cateid', $_POST)){
            $iddd=$_COOKIE['id'];
            $query1000="SELECT name FROM category where id=$iddd";
            $result1000=mysqli_query($conn, $query1000);   
            while($row1000 = mysqli_fetch_assoc($result1000)){ 
                $cattttt=$row1000['name'];
            }}
        ?>
         <div class="popup" id="popup">
                <form method="POST"><h3 style="color:white;margin-left:20px;">Edit Category</h3>
                    <input name="newname" id="newname" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:8px;" placeholder="Add New Name">
                    <button onclick="closeFunction()" class="glow-on-hover" type="button" style="background:transparent;color:white;padding:7 20;position:fixed;top:140px;margin-left:30px;border:1px solid lightgray;">Close</button>
                    <button  onclick="closeFunction()" class="glow-on-hover" id="edit" name="edit" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:140px;margin-left:580px;border:1px solid lightgreen;background-color:green;"><i class="fa fa-check-square-o fa-lg  fa-pulse" style="color:white"></i>  Update</button></form>
                </div>
                

        <div class="popup1" id="popup1">
            <h3 style="color:white;margin-left:20px;">Deleting...</h3>
            <h4 style="color:white;text-align:center;">Do you really want to delete the selected category?</h4>
            <button onclick="closeFunction1()" class="glow-on-hover" style="background:transparent;color:white;padding:7 20;position:fixed;top:140px;margin-left:30px;border:1px solid lightgray;">Close</button>
            <form action="delete_cat.php" method="post"><button class="glow-on-hover" id="del" name="del" type="submit" style="color:white;padding:7 20;position:fixed;top:140px;margin-left:580px;border:3px solid #b43757;border-radius:3px;background-color:rgb(124,10,2)"><i class="fa fa-trash-o fa-lg  fa-pulse" style="color:white"></i> Delete</button></form>
        </div>

        <div class="popup2" id="popup2">
            <form method="POST"><h3 style="color:white;margin-left:20px;">Add Category</h3>
            <input name="newcat" style="border: 1px solid lightgray;width:450px;height:35px;position:absolute;left:17%;margin-top:8px;" type="text" placeholder="Add New Category">
            <button onclick="closeFunction2()" class="glow-on-hover"style="background:transparent;color:white;padding:7 20;position:fixed;top:140px;margin-left:30px;border:1px solid lightgray;">Close</button>
            <button  onclick="closeFunction2()" class="glow-on-hover" id="add" name="add" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:140px;margin-left:580px;border-radius:5px;border:1px solid white;background-color:dodgerblue"><i class='fa fa-plus-circle fa-lg' style='color:#ffffff'></i> ADD</button></form>
        </div>

        <script>
            var ts=0;
            function editFunction(i) {
                var popup = document.getElementById('popup');
                popup.classList.add('show');
                popup.style.animation ="drop 0.5s ease forwards";
                document.getElementById('newname').value=dict[i];
                console.log(i);
                var blur = document.getElementById('editbody');
                blur.innerHTML=".s111,.transtable3,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf {filter: blur(30px);}";
                document.cookie="id="+i;
                }
        </script>
        <script>
            function closeFunction(){
                var popup = document.getElementById('popup');
                popup.classList.remove('show');
                var blur = document.getElementById('editbody');
                blur.innerHTML=""; 
            }
        </script>
        <script>
            function delFunction(i) {
                var popup = document.getElementById('popup1');
                popup.classList.add('show');
                 popup.style.animation ="drop 0.5s ease forwards";
                var blur = document.getElementById('editbody');
                    blur.innerHTML=".s111,.transtable3,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf {filter: blur(30px);}";
                    document.cookie="id1="+i;
                }
                
        </script>
        <script>
            function closeFunction1(){
                var popup = document.getElementById('popup1');
                popup.classList.remove('show');
                var blur = document.getElementById('editbody');
                blur.innerHTML=""; 
                ts=0;
            }
        </script>
        <script>
            function addFunction(i) {
                var popup = document.getElementById('popup2');
                popup.classList.add('show');
                popup.style.animation ="drop 0.5s ease forwards";
                var blur = document.getElementById('editbody');
                ts=(ts+1)%2;
                if(ts==1){
                    blur.innerHTML=".s111,.transtable3,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf {filter: blur(3px);}";}
                else{
                    blur.innerHTML="";} 
                }
                
        </script>
        <script>
            function closeFunction2(){
                var popup = document.getElementById('popup2');
                popup.classList.remove('show');
                var blur = document.getElementById('editbody');
                blur.innerHTML=""; 
                ts=0;
            }
        </script>
                            <script>
                                    var x = document.getElementById('catsearch');
                                                    x.addEventListener("input", e => {
                                                                            const value = e.target.value;
                                                                            console.log(value);
                                                                            document.cookie = "catsearch ="+ value;
                                                                        });
                                    var y = document.getElementById('catsel');
                                                    y.addEventListener("input", e => {
                                                                            const value1 = e.target.value;
                                                                            console.log(value1);
                                                                            document.cookie = "catsel ="+ value1;
                                        });
                                            function loadDoc() {
                                                var xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("transtable1").innerHTML = this.responseText;
                                                    }
                                                };
                                                xhttp.open("GET", "fetcher2.php", true);
                                                xhttp.send();
                                                }
                                                setInterval(() => {
                                                    loadDoc();
                                                }, 1000);
                                            loadDoc();
                                    </script>
    </body>
</html>  