<?php $menubtn=0;
        $width=1320;
       if(isset($_POST['catt'])){
        $prodid=$_POST['catt'];
       }
       else{
        $prodid=0;
       }
        include 'includes/conn.php';
        if(!empty($_POST['newname1']) && !empty($_POST['price1']) && !empty($_POST['cat1']) && !empty($_POST['hel']) && isset($_POST['add'])){
            setcookie('name' , $_POST['newname1']);
            setcookie('price', $_POST['price1']);
            setcookie('cat'  , $_POST['cat1']);
            setcookie('desc', $_POST['hel']);
            setcookie('newImg',$_FILES["newImg"]["name"]);
            move_uploaded_file($_FILES["newImg"]["tmp_name"], "images/".$_FILES["newImg"]["name"] );
            header("Location:add_product.php");
        }
        
        if(!empty($_POST['newname']) && !empty($_POST['price']) && !empty($_POST['cat']) && !empty($_POST['hel1']) && isset($_POST['edit'])){
            setcookie('name' , $_POST['newname']);
            setcookie('price', $_POST['price']); 
            setcookie('cat'  , $_POST['cat']);
            setcookie('desc' , $_POST['hel1']);
            header("Location:update_prod.php");
        }
        ?>
<html>
<head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPHOENIX - A Virtual Mall</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <style id="editbody"></style>
    <?php include 'alladmin.css';?>
    <style>
        .popup3, .popup4, .popup5{
            top:-400px;
        }
        #edit-popup{
            height:150;
            font-weight:bolder;
            padding:10px;
            width:95%;
            background-color:white;
            overflow-y:scroll;
        }
        @keyframes drop {
            0%{}
            70%{transform :translateY(490px)}
            100%{transform:translateY(455px)}
        }
        
    </style>
</head>
<body onload="en()">  
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
                        <i class="fa fa-font-case"></i>
                            <div class="head3"><h2>Product List</h2><p>Home > Products > Product List</p></div>
                            <button class='addprf' onclick="addFunction()">+ add</button>
                            <div class="cato" style="position:absolute;right:50px;">Category : <select style="border:1px solid lightgray;" id = "product-cat" name="catt" onchange="change()"><option value="0">ALL</option>
                                    <?php
                                        $query111="SELECT * FROM category" ;
                                        $result111=mysqli_query($conn,$query111);
                                        while($row111 = mysqli_fetch_assoc($result111)){
                                            echo '<option value="'.$row111['id'].'">'.$row111['name'].'</option>';}?>
                            </select>
                        </div>
                        <div class="s22">
                                <p>Show <select name="thesel" id="thesel" >
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
                                }
                            ?>
                        <div class="s111"><form action="" id="s11" method="post"><label for="s11">Search : </label><input type="search" name="s11" id = "product-search"></form></div>
                            <?php 
                                $search="";
                                if(isset($_POST['s11'])){
                                    $search=$_POST['s11'];
                                }
                            ?>
                             <script>
                                        function change(){
                                            document.getElementById("form").submit();
                                        }
                                        function change1(){
                                            document.getElementById("form1").submit();
                                        }
                                    </script>
                            
                            <div class="transtable1"><table id = 'transtable1'>
                                <tr>
                                    <th></th>
                                    <th>Name <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Photo<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Description<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Price<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Views Today<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Tools<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                </tr>
                                <script>var dict={};
                                        var desc={};
                                        var price={};</script>
                <?php
                    $query100="SELECT id FROM products  WHERE name LIKE '%$search%' or price LIKE '%$search%'";
                    $result100=mysqli_query($conn, $query100);
                    $count=0;
                    $rows = 0;
                    $searchcount=0;
                    while($row100 = mysqli_fetch_assoc($result100)){
                        $userid=$row100['id'];
                        $searchcount++;
                    $query="SELECT * FROM products WHERE id=$userid" ;
                    $result=mysqli_query($conn,$query);
                    if($count<$rownum){
                        $count++;
                    while($row = mysqli_fetch_assoc($result)){
                        $rows++;
                        if ($prodid==0) {
                            echo "<script>dict['".$row['id']."'] = '".$row['name']."'</script>";
                            echo "<script> desc['".$row['id']."']= String('".str_replace("\n", "<br>", $row['description'])."');  </script>";
                            echo "<script>price['".$row['id']."'] = '".$row['price']."'</script>";
                            echo "<tr>
                            <td></td>
                            <td>".$row['name']."</td>
                            <td><img src='images/".$row['photo']."'> <a href='img_upload.php?id=".$row['id']."'><button style='background-color:cyan;'><i class='fa fa-edit' style='float:right;background-color:magneta;'></i></button></a></td>
                            <td><button onclick='viewFunction(".$row['id'].")' style='background-color:dodgerblue;'><i class='fa fa-search'></i>View</button></td>
                            <td>$ ".$row['price']."</td>
                            <td>".$row['counter']."</td>
                            <td><button onclick='editFunction(".$row['id'].")'><i class='fa fa-edit'></i>edit</button><button onclick='delFunction(".$row['id'].")' style='background-color:rgba(255,20,20,0.9);'><i class='fa fa-trash-o'></i>delete</button></td></td>
                        </tr>
                        </div>";} 
                        elseif($prodid==$row['category_id']){
                                echo "<tr>
                                    <td></td>
                                    <td>".$row['name']."</td>
                                    <td><img src='images/".$row['photo']."'></td>
                                    <td><button onclick='viewFunction(".$row['id'].")' style='background-color:dodgerblue;'><i class='fa fa-search'></i>View</button></td>
                                    <td>$ ".$row['price']."</td>
                                    <td>".$row['counter']."</td>
                                    <td><button onclick='editFunction(".$row['id'].",".$row['name'].")'><i class='fa fa-edit'></i>edit</button><button onclick='delFunction(".$row['id'].")' style='background-color:rgba(255,20,20,0.9);'><i class='fa fa-trash-o'></i>delete</button></td></td>
                        </tr>
                                </div>";}}}} 
                                
                                if($rownum==10000){
                                    $rownum=$rows;
                                }
                                if($searchcount<$rows){
                                    $rows=$searchcount;
                                    $rownum=$searchcount;
                                }?>
                                </table></div>
                                 
                                            
                            <div class="popup3" id="popup3" enctype="multipart/form-data">
                                <form method="POST"><h3 style="color:white;margin-left:20px;">Edit Product</h3>
                                <label for="" style="width:250px;height:35px;position:absolute;left:10%;margin-top:8px;color:White;border-radius:5px;">New Product Name</label>
                                <input name="newname" id="newname" style="border: 1px solid lightgray;width:250px;height:35px;position:absolute;left:10%;margin-top:28px;border-radius:5px;" type="text" placeholder="New Product Name">
                                <label for="" style="width:250px;height:35px;position:absolute;left:55%;margin-top:8px;color:White;border-radius:5px;">New Product Price</label>
                                <input name="price" id="price" style="border: 1px solid lightgray;width:250px;height:35px;position:absolute;left:55%;margin-top:28px;border-radius:5px;" type="text" placeholder="New Product Price">
                                <label for="" style="width:250px;height:35px;position:absolute;left:10%;margin-top:78px;color:White;border-radius:5px;">Select Category</label>
                                <select name="cat" id="cat" style="border: 1px solid lightgray;width:250px;height:35px;position:absolute;left:10%;margin-top:98px;color:gray;border-radius:5px;">
                                <?php $query="SELECT * FROM category " ;
                                $result=mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='".$row['id']."' style='color:gray;'>".$row['name']."</option>";
                                }?></select>
                                <label for="" style="width:450px;height:35px;position:absolute;left:10%;margin-top:163px;color:White;">New Description</label>
                                <textarea name="hel1" id="hel1" hidden></textarea>
                                <div class="edit-options" style="border: 1px solid lightgray;width:570px;height:56px;position:absolute;left:10%;margin-top:185px;background-color:white;border-bottom:1px solid light gray;border-radius:5px;">
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty1('bold')"><i class="fa fa-bold"></i></span>
                                <span class="icons" onclick = "sty1('italic')"><i class="fa fa-italic"></i></span>
                                <span class="icons" onclick = "sty1('underline')"><i class="fa fa-underline"></i></span>
                                <span class="icons" onclick = "sty1('strikethrough')"><i class="fa fa-strikethrough"></i></span>
                                <span class="icons" onclick = "sty1('subscript')"><i class="fa fa-subscript"></i></span>
                                <span class="icons" onclick = "sty1('superscript')"><i class="fa fa-superscript"></i></span></div>
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty1('uppercase')"><i class ="fa fa-users"></i></span>
                                <span class="icons" onclick = "sty1('lowercase')"><i class ="fa fa-users"></i></span>
                                </div>
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty1('justifyLeft')"><i class ="fa fa-align-left"></i></span>
                                <span class="icons" onclick = "sty1('justifyRight')"><i class ="fa fa-align-right"></i></span>
                                <span class="icons" onclick = "sty1('justifyFull')"><i class ="fa fa-align-justify"></i></span>
                                <span class="icons" onclick = "sty1('justifyCenter')"><i class ="fa fa-align-center"></i></span>
                                </div>
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty1('insertOrderedList')"><i class ="fa fa-list-ol"></i></span>
                                <span class="icons" onclick = "sty1('insertUnorderedList')"><i class ="fa fa-list-ul"></i></span>
                                </div>
                                <div class="edit-options-tab">
                                    <span class="icons" onclick = "sty1('undo')">
                                        <i class="fa fa-undo"></i>
                                    </span>
                                    <span class="icons" onclick = "sty1('redo')">
                                        <i class="fa fa-rotate-right"></i>
                                    </span>
                                </div>
                                <div class="edit-options-tab"><pre class="icons" style="font-size :14px;">Size:</pre>
                                <select class="icons" style="background-color:lightgreen;" id= "sizes1"><i class ="fa fa-list-ol"></i>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                                <pre class="icons" style="font-size :14px;color:red"><b>Color :</b></pre><input class="icons" style="width:15px;height:15px;padding:0px;margin-left:0px;" type="color" id="color-picker-1">
                                <pre class="icons" style="font-size :14px;background-color:yellow;">Background :</pre><input class="icons" style="width:15px;height:15px;padding:0px;margin-left:0px;" type="color" id="color-picker2-1">
                                </div>
                            </div>
                                <iframe name="newdesc" contenteditable="true" id="newdesc" style="border: 1px solid lightgray;width:570px;height:185px;position:absolute;left:10%;margin-top:240px;background-color:white;border-radius:5px;" placeholder=""></iframe>
                                <button class="glow-on-hover" onclick="closeFunction()" style="left:0%;background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:70px;border:1px solid lightgray;border-radius:5px;">CLOSE</button>
                                <button  class="glow-on-hover" onclick="closeFunction()" id="edit" name="edit" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:560px;border-radius:5px;border:1px solid lightgreen;background-color:green;"><i class="fa fa-check-square-o fa-lg  fa-pulse" style="color:white"></i>  Update</button></form>
                            </div>

                            <div class="popup4" id="popup4" enctype="multipart/form-data" enctype="multipart/form-data">
                                <form method="POST" id="add-form"   enctype="multipart/form-data"><h3 style="color:white;margin-left:20px;border-radius:5px;">Add New Product</h3>
                                <label for="" style="width:250px;height:35px;position:absolute;left:10%;margin-top:8px;color:White;border-radius:5px;">New Product Name</label>
                                <input name="newname1" style="border: 1px solid lightgray;width:250px;height:35px;position:absolute;left:10%;margin-top:28px;border-radius:5px;" type="text" placeholder="New Product Name">
                                <label for="" style="width:250px;height:35px;position:absolute;left:55%;margin-top:8px;color:White;border-radius:5px;">Product Price</label>
                                <input name="price1" style="border: 1px solid lightgray;width:250px;height:35px;position:absolute;left:55%;margin-top:28px;border-radius:5px;" type="text" placeholder="New Product Price">
                                <label for="" style="width:250px;height:35px;position:absolute;left:10%;margin-top:78px;color:White;border-radius:5px;">Select Category</label>
                                <select name="cat1" id="cat" style="border: 1px solid lightgray;width:250px;height:35px;position:absolute;left:10%;margin-top:98px;color:gray;border-radius:5px;">
                                <?php $query="SELECT * FROM category " ;
                                $result=mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<option value='".$row['id']."' style='color:gray;'>".$row['name']."</option>";
                                }?></select>
                                
                                <label for="" style="width:250px;height:35px;position:absolute;left:55%;margin-top:78px;color:White;border-radius:5px;">Select Image</label>
                                <input type="file" name="newImg" style="width:250px;height:35px;position:absolute;left:55%;margin-top:98px;color:White;border-radius:5px;" />
                                <label for="" style="width:450px;height:35px;position:absolute;left:10%;margin-top:163px;color:White;">Product Description</label>
                              
                                <textarea name="hel" id="hel" hidden></textarea>
                                <div class="edit-options" style="border: 1px solid lightgray;width:570px;height:56px;position:absolute;left:10%;margin-top:185px;background-color:white;border-bottom:1px solid lightgray;border-radius:5px;">
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty('bold')"><i class="fa fa-bold"></i></span>
                                <span class="icons" onclick = "sty('italic')"><i class="fa fa-italic"></i></span>
                                <span class="icons" onclick = "sty('underline')"><i class="fa fa-underline"></i></span>
                                <span class="icons" onclick = "sty('strikethrough')"><i class="fa fa-strikethrough"></i></span>
                                <span class="icons" onclick = "sty('subscript')"><i class="fa fa-subscript"></i></span>
                                <span class="icons" onclick = "sty('superscript')"><i class="fa fa-superscript"></i></span></div>
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty('justifyLeft')"><i class ="fa fa-align-left"></i></span>
                                <span class="icons" onclick = "sty('justifyRight')"><i class ="fa fa-align-right"></i></span>
                                <span class="icons" onclick = "sty('justifyFull')"><i class ="fa fa-align-justify"></i></span>
                                <span class="icons" onclick = "sty('justifyCenter')"><i class ="fa fa-align-center"></i></span>
                                </div>
                                <div class="edit-options-tab">
                                <span class="icons" onclick = "sty('insertOrderedList')"><i class ="fa fa-list-ol"></i></span>
                                <span class="icons" onclick = "sty('insertUnorderedList')"><i class ="fa fa-list-ul"></i></span>
                                </div>
                                <div class="edit-options-tab">
                                    <span class="icons" onclick = "sty('undo')">
                                        <i class="fa fa-undo"></i>
                                    </span>
                                    <span class="icons" onclick = "sty('redo')">
                                        <i class="fa fa-rotate-right"></i>
                                    </span>
                                </div>
                                <div class="edit-options-tab">
                                <span class='icons' onclick="sty('insertImage')"><i class="fa fa-image"></i></span>
                                <span class='icons' onclick="sty('insertHorizontalRule')"><i class="fa fa-dash">HR</i></span>
                               </div>
                                <div class="edit-options-tab" ><span class="icons" style="font-size :14px;border-right:1px solid lightgreen;">Size :
                                <select id= "sizes" style="border:none;color:cyan;background-color:lightgreen;border-right:1px solid lightgreen;"><i class ="fa fa-list-ol"></i>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select></span>
                                <span class="icons no-hover" style="font-size :14px;color:red;"><b>Color :</b><input class="icons" style="width:15px;height:15px;padding:0px;margin-top:-5px;border-right:1px solid lightgreen;" type="color" id="color-picker"></span>
                                <pre class="icons no-hover" style="font-size :14px;background-color:yellow;margin-left:0px;">Background :</pre><input class="icons" style="width:15px;height:15px;padding:0px;margin-left:-5px;" type="color" id="color-picker2">
                                </div>
                               
                                
                            </div>
                                <iframe name="newdesc1"  id="newdesc1" style="border: 1px solid lightgray;width:570px;height:185px;position:absolute;left:10%;margin-top:240px;background-color:white;border-radius:5px;" placeholder=""></iframe><button class="glow-on-hover" onclick="closeFunction2()" style="left:0%;background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:70px;border:1px solid lightgray;border-radius:5px;">CLOSE</button>
                                <button class="glow-on-hover" onclick="closeFunction2()" id="add" name="add" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:540px;margin-left:560px;border-radius:5px;border:1px solid white;background-color:dodgerblue"><i class='fa fa-plus-circle fa-lg' style='color:#ffffff'></i> ADD</button>
                               </form>
                            </div>

                            <div class="popup5" id="popup5">
                                <h3 style="color:white;margin-left:20px;">Deleting...</h3>
                                <h4 style="color:white;text-align:center;">Do you really want to delete the selected product</h4>
                                <button  class="glow-on-hover" onclick="closeFunction1()" style="background:transparent;color:white;padding:7 20;position:fixed;top:130px;margin-left:30px;border:1px solid white;border-radius:5px;">CLOSE</button>
                                <form action="delete_prod.php" method="post"><button class="glow-on-hover" id="del" name="del" type="submit" style="background:transparent;color:white;padding:7 20;position:fixed;top:130px;margin-left:580px;border:3px solid #b43757;border-radius:3px;background-color:rgb(124,10,2)"><i class="fa fa-trash-o fa-lg  fa-pulse" style="color:white"></i> Delete</button></form>
                            </div>
                            <div  class="popup5" id="popup6" style="position:fixed;left:550px;top:-400px;background-color:yellow;width: 400px; height:fit-content;padding:20px;border-radius:18px;color:black;font-size:15px;"><h3 style="color:white;">Description</h3><div name="" id="edit-popup"></div><button onclick='closeFunction3()'class="glow-on-hover" style='border:2px solid white;padding:5px;margin-top:20px;background-color:red;color:white;'><i class='fa fa-times' style='color:white;border-radius:5px;'> Close</button></div>
                            <script>
                                var ts=0;
                                function editFunction(i) {
                                    var popup = document.getElementById('popup3');
                                    popup.style.animation ="drop 0.5s ease forwards";
                                    popup.classList.add('show');
                                    document.getElementById('newname').value=dict[i];
                                    console.log(dict[i]);
                                    document.getElementById('price').value=price[i];
                                    console.log(price[i]);
                                    document.getElementById('newdesc').contentWindow.document.body.innerHTML=desc[i];
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers {filter: blur(30px);}";
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
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers {filter: blur(30px);}";
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
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers {filter: blur(30px);}";
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
                                function viewFunction(i) {
                                    var popup = document.getElementById('edit-popup');
                                    popup.innerHTML=desc[i].replaceAll("<br>", "");
                                    var popup1 = document.getElementById('popup6')
                                    popup1.classList.add('show');
                                    popup1.style.animation ="drop 0.5s ease forwards";
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=".s111,.transtable1,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers {filter: blur(30px);}";
                                }
                                    
                            </script>
                            <script>
                                function closeFunction3(){
                                    var popup = document.getElementById('popup6');
                                    popup.classList.remove('show');
                                    var blur = document.getElementById('editbody');
                                    blur.innerHTML=""; 
                                }
                                
                            </script>
                            <script>
                                    var x = document.getElementById('product-search');
                                                    x.addEventListener("input", e => {
                                                                            const value = e.target.value;
                                                                            console.log(value);
                                                                            document.cookie = "product_val ="+ value;
                                                                        });
                                    var y = document.getElementById('thesel');
                                                    y.addEventListener("input", e => {
                                                                            const value1 = e.target.value;
                                                                            console.log(value1);
                                                                            document.cookie = "product_rows ="+ value1;
                                        });
                                    var y = document.getElementById('product-cat');
                                                y.addEventListener("input", e => {
                                                                        const value2 = e.target.value;
                                                                        console.log(value2);
                                                                        document.cookie = "product_cat ="+ value2;
                                    });
                                            function loadDoc() {
                                                var xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("transtable1").innerHTML = this.responseText;
                                                    }
                                                };
                                                xhttp.open("GET", "fetcher1.php", true);
                                                xhttp.send();
                                                }
                                                setInterval(() => {
                                                    loadDoc();
                                                }, 1000);
                                            loadDoc();
                                    </script>
                            <script>
                                function en(){
                                    newdesc1.document.designMode="On";
                                    newdesc.document.designMode="On";
                                }
                                function sty(sty){
                                    newdesc1.document.execCommand(sty, false, null);
                                    document.getElementById('hel').innerHTML=ifrm.innerHTML;
                                }
                                function sty1(sty){
                                    newdesc.document.execCommand(sty, false, null);
                                    document.getElementById('hel1').innerHTML=ifrm.innerHTML;
                                }
                                var xsize = document.getElementById('sizes');
                                                    xsize.addEventListener("input", e => {
                                                                            var sizevalue = e.target.value;
                                                                            console.log(sizevalue);
                                                                            newdesc1.document.execCommand("fontSize", false, sizevalue);
                                                                        });
                                var xsize1 = document.getElementById('sizes1');
                                                    xsize1.addEventListener("input", e => {
                                                                            var sizevalue = e.target.value;
                                                                            console.log(sizevalue);
                                                                            newdesc.document.execCommand("fontSize", false, sizevalue);
                                                                        });
                                var xcolor = document.getElementById('color-picker');
                                xcolor.addEventListener("input", e => {
                                                        var colvalue = e.target.value;
                                                        console.log(colvalue);
                                                        newdesc1.document.execCommand("foreColor", false, colvalue);
                                                    });
                                var xcolor1 = document.getElementById('color-picker-1');
                                                    xcolor1.addEventListener("input", e => {
                                                        var colvalue = e.target.value;
                                                        console.log(colvalue);
                                                        newdesc.document.execCommand("foreColor", false, colvalue);
                                                    });
                                var bxcolor = document.getElementById('color-picker2');
                                bxcolor.addEventListener("input", e => {
                                                        var bcolvalue = e.target.value;
                                                        console.log(bcolvalue);
                                                        newdesc1.document.execCommand("backColor", false, bcolvalue);
                                                    });
                                var bxcolor1 = document.getElementById('color-picker2-1');
                                bxcolor1.addEventListener("input", e => {
                                                        var bcolvalue = e.target.value;
                                                        console.log(bcolvalue);
                                                        newdesc.document.execCommand("backColor", false, bcolvalue);
                                                    });                                                   
                                
                            </script>

                            <script>
                                var ifrm = document.getElementById('newdesc1').contentWindow.document.body;
                                ifrm.addEventListener("DOMCharacterDataModified", e =>{ 
                                                        console.log(ifrm.innerHTML);
                                                        document.getElementById('hel').innerHTML=ifrm.innerHTML;    

                                });
                                document.getElementById('add').addEventListener("click", e =>{ 
                                                        console.log(ifrm.innerHTML);
                                                        document.getElementById('hel').innerHTML=ifrm.innerHTML;    

                                });
                                var ifrm1 = document.getElementById('newdesc').contentWindow.document.body;
                                ifrm1.addEventListener("DOMCharacterDataModified", e =>{
                                                        console.log(ifrm1.innerHTML);
                                                        document.getElementById('hel1').innerHTML=ifrm1.innerHTML;

                                });
                                document.getElementById('edit').addEventListener("click", e =>{ 
                                                        console.log(ifrm.innerHTML);
                                                        document.getElementById('hel1').innerHTML=ifrm1.innerHTML;  });
                            </script>
                            </body>
                            </html>