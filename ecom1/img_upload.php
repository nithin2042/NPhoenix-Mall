<html>
    <head">
    <?php
    setcookie('imagechangeid',$_GET['id']);
    if (isset($_POST['submit'])){
        setcookie('thechangedimage',$_POST['up']);
        move_uploaded_file($_FILES["up"]["tmp_name"], "images/".$_FILES["up"]["name"] );
        header("Location:just_update.php?img=".$_FILES["up"]["name"]."");
    }
     include 'all.css';?>
     <style>
        body{
            background:url(https://i.pinimg.com/originals/89/ab/f2/89abf2fc2254e5e10aaaac6331c07e96.gif);
        }
        #s{
            position:fixed;
            left: 430px;
            top: 250px;
        }
        #upl1{
            position:fixed;
            left: 680px;
            top: 400px;
        }
     </style>
    </head>
    <body style="background-color:lightblue;">
    <button id = "s" class='glow-on-hover' onclick="loc()" style="background-color:dodgerblue;color:white;outline:none;border:3px solid cyan;font-size:70px;padding:30px;border-radius:80px;align-items:center;">Select New Image</button>
        <form action="" method="POST" enctype="multipart/form-data" id="thechangedimage"><input type="file" name="up" onchange="sub()" id="upl" hidden><button type="submit" id = "upl1" name="submit" class='glow-on-hover' style="background-color:cyan;color:white;outline:none;border:3px solid dodgerblue;font-size:30px;padding:10px;padding-inline:20px;border-radius:40px;">Upload <i class="fa fa-upload"></i></button></form>
        <script>
            function sub(){
            document.getElementById('thechangedimage').submit();
            }
            function loc(){
                document.getElementById('upl').click(); 
            }
        </script>
    </body>
</html>
<?php

    
?>  