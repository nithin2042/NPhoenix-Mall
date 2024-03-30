<?php
    session_start();
    include 'includes/conn.php';
    $prodid=$_GET['productid'];
?>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>NPHOENIX</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="magnify.css">
    <?php include 'includes/header.php';?>
    <?php include 'all.css'?><style>
            body{
                width: 0px;
                margin-right:50px;
            }
            .card-container {
                display:inline flex;
                z-index: -1;
            }

    .card {
        margin-right:35px;
        position: relative;
        background-color: aliceblue;
        width: 200px;
        height: 350px;
        perspective: 1000px;
        transform: perspective(750px) translate3d(0px, 0px, -50px) rotateX(20deg) ;
        border: 4px solid aliceblue;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        transition: 0.4s ease-in-out transform, 0.4s ease-in-out box-shadow;
    }
.card:hover {
        transform: translate3d(0px, 0px, -150px);
        box-shadow: 0 50px 80px -20px rgba(76, 77, 79, 0.3); /* Increased box shadow on hover */
    }

    .card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        
    }.card:hover .card-inner {
        transform: rotateY(180deg) scale(1.1, 1.1);
    }

    .card-front,
    .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 16px;
        background:white;
    }

    .card-front {
        background: white;
    }

    .card-front img {
        
        width: 100%;
        overflow:hidden;
    }
    .card-front .img{
        height:60%;
        overflow:hidden;
    }
    .name{
        height:11%;
        width:100%;
        white-space: nowrap
        text-overflow: ellipsis; 
        background-color:aliceblue;
        overflow:hidden;
        color:gray;
        display:block;
        text-align:left;
    }
    .name span{
        margin-left:6px;
    }
    .price{
        height:12%;
        text-overflow: ellipsis; 
        color:#353543;
        padding-left:6px;
        font-family:sans-serif;
        margin-top:5px;
    }
    .card .free-delivery{
        background-color:aliceblue;
        border-radius:15px;
        width:fit-content;
        padding: 3px;
        margin-left:6px;
        font-size:12px;
        color:gray;
    }
    .prodbody .free-delivery{
        background-color:rgb(210,218,225, 0.5);
        border-radius:15px;
        width:fit-content;
        padding-inline: 5px;
        padding-block:2px;
        margin-top:15px;
        font-size:17px;
        color:gray;
    }
    .card .rating{
        width:fit-content;
        padding: 3 8px;
        margin-left:6px;
        border-radius:15px;
        margin-top:5px;
        color:white;
    }
    .prodbody .rating{
        width:fit-content;
        padding: 4 9px;
        margin-left:px;
        border-radius:15px;
        margin-top:5px;
        color:white;
        font-size:20px;
    }

    .card-back {
        color: #ffffff;
        transform: rotateY(180deg) translate3d(0px, -50px, -50px);
        border:1px solid lightgray;
        width:300px;
        height:300px;
        overflow:hidden;
    }
    

            .card-back img {
            transform: perspective(3000px) rotateY(5deg);
            width:100%;
            min-height:300px;
            z-index: 9999;
        }

        .card-back h3 {
            margin-bottom: 0.3rem;
        }

        .uppers{
            width:1358px;
            padding-left:100px;
        }
        .fa-star{
            font-size:12px;
            margin-left:3px;
        }
        .card .rates{
            color:gray;
            margin-top:-15px;
            font-size:12px;
        }
        .prodbody .rates{
            color:gray;
            margin-top:-15px;
            margin-left:70px;
            font-size:12px;
        }

        .prodbody .revs{
            color:gray;
            margin-top:-13px;
            margin-left:136px;
            font-size:12px;
            position: relative;
        }
        .card-back h3:nth-child(1){
            position: absolute;
            top:250px;
            color:white;
            background-color:rgb(180, 180, 180, 0.6);
            height: 50px;
            width:100%;
            padding-top:10px;
            border-radius:0px;
        }
        
        
        .prods{
            display:inline-flex;
            width: 1400px;
            height: fit-content;
            margin-left: 80px;
            margin-top:90px;
            border:1px solid lightgray;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }
        .uppers{
            width:1300px;
            margin-left:65px;
        }
        .mainprods{
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            padding:20px;
            border-radius:15px;
            background:white;   
        }
        .cloth-sizes span{
            border:1px solid #353543;
            border-radius:27Px;
            padding:6 16;
            font-size:20px;
            color:#353543;
            cursor:pointer;
            font-weight:30px;
        }
        #truck{
            height:100%;
        }
        .shp{
            display:inline-flex;
        }
        .shp1{
            background-color:aliceblue;
            border-radius:48%;
            border:2px solid dodgerblue;
            height: 60px;
            width: 60px;
            overflow:hidden;
            position: relative;
            top:20px;
        }
        .shp-details{
            width: 314px;
            height:70px;
            position:relative;
            left:67px;
        }
        .sd-box{
            width:100;
            height: 100%;
            display:inline-flex;
            margin:0px;
        }
        .sd-box span:nth-child(1){
            height:50%;
            width:100px;
            position:absolute;
            top:0px;
            left: 0px;
        }
        .sd-box span:nth-child(2){
            height:50%;
            width:100px;
            position:absolute;
            left: 0px;
            top:35px;
        }
        .sdbox .rating{
            color:dodgerblue;
        }
        .ratbox{
            height: 150px;
            width:400px;
            margin-top:16px;
            margin-left:18px;
        }
        .adj{
            width:19%;
            height:20%;
        }
        .fillbar{
            width:60%;
            height:20%;
        }
        .ratnum{
            width:14%;
            height:20%;
            color:#8b8ba3;
            font-size:13px;
        }
        .inl{
            display:inline-flex;
        }
        img.ref-prf-icon{
            width: 40px;
            height:40px;
            border:1px solid grey;
            border-radius:50%;
        }
        .prods::before{
            content:'';
            display:block;
            position:absolute;
            width:92.2%;
            height:405%;
        background-image:url('<?php 
                if($_COOKIE['ptype']==1){
                   echo "https://i.pinimg.com/originals/89/ab/f2/89abf2fc2254e5e10aaaac6331c07e96.gif')";
                }
                else{
                    echo 'https://tse4.mm.bing.net/th?id=OIP.LK_PgHSggzSdjlhwtZKllgHaE7&pid=Api&P=0&h=180';
                    echo "');filter:opacity(3%);";
                    
                }?>;
                
            }
     </style>

</head>
<body> 
    <?php include 'includes/navbar.php';?>
        <?php
                $cat="None";
                $query="SELECT * FROM products WHERE id = $prodid";
                $result=mysqli_query($conn,$query);
                $stmt = $conn->prepare($query);
                $stmt->execute();
                while($row = mysqli_fetch_assoc($result)){
                    include 'includes/conn.php';
                    $query111="SELECT * FROM category" ;
                    $result111=mysqli_query($conn,$query111);
                    while($row111 = mysqli_fetch_assoc($result111)){
                        if($row['category_id']==$row111['id']){
                        $cat=$row111['name'];}}
                            if(!empty($row['photo'])){$img=$row['photo'];}else{$img='noimage.jpg';}
                            $desc=$row['description'];
                            $name=$row['name'];
                            $price=$row['price'];
                            $cat_id = $row['category_id'];
                            $counter = $row['counter'];
                            }?> 
                <div class="prods">
                <div class="prodbody rounded-border-gradient" style="height:fit-content;">
                    <div class="prodimg" style="border-radius:15px;">
                        <a href="images/large-<?php echo $img;?>"><img src="images/<?php echo $img;?>" alt="img" data-magnify-src="images/large-<?php echo $img;?>" class="zoom" id="image"></a>
                    </div>
                    <br>
                    </div>
                    <div class="prodbody rounded-border-gradient"  style="float:right;position:relative;left:15px;height:fit-contet;">
    <div class="mainprods">
                    <text><?php echo $name;?></text><br><br>
                    <span id="pr">$ <?php echo $price;?></span><br>
                    <?php
                                
                            $r21 = rand(28, 47)/10;
                            $r31 = rand(100, 999);
                            $r41 = rand(10, 400);
                                echo '<div class="rating"';
                                        if($r21<2.5){
                                            echo "style='background-color:red;'";
                                        }
                                        elseif($r21>=2.5 && $r21<3.5){
                                            echo "style='background-color:#F4B619;'";
                                        }
                                        else{
                                            echo "style='background-color:#23bb75;'";
                                        }
                                        echo '>'.sprintf("%.1f", $r21).'<i class="fa fa-star"></i></div>
                                    
                                    <div class="rates">'.$r31.' ratings, </div>
                                    <div class="revs">'.$r41.' reviews</div>
                                    <div class="free-delivery">Free Delivery</div>';
                                    ?>
                                    </div><br>
                                    <div class="mainprods">
                    <pre><b><span style='color:#353543;font-size: 19px;' class = "cat-name">Category:</span></b><p style="margin-left:2px;"><?php echo "".$cat;?></p></pre></div><br>
                                    <div class="mainprods">
                            <?php
                                if($cat_id<=4){
                                   echo ' <div class="cloth-sizes">
                                   <b><p  style="color:#353543;font-size: 19px;">Select Size :</p></b><br>
                                           <span class = "cloths" onclick="focuser(0)">4 GB + 64 GB</span><br><br>
                                           <span class = "cloths" onclick="focuser(1)">6 GB + 128 GB</span><br><br>
                                           <span class = "cloths" onclick="focuser(2)">8 GB + 128 GB</span><br><br>
                                           <span class = "cloths" onclick="focuser(3)">8 GB + 256 GB</span><br><br>
                                           <span class = "cloths" onclick="focuser(4)">12 GB + 256 GB</span><br><br>
                                           <span class = "cloths" onclick="focuser(5)">16 GB + 512 GB</span>
                                   </div>';
                                }
                                else{
                                    echo '<div class="cloth-sizes">
                                    <b><p  style="color:#353543;font-size: 19px;">Select Size :</p></b><br>
                                    <span class = "cloths" onclick="focuser(0)">S</span>
                                    <span class = "cloths" onclick="focuser(1)">M</span>
                                    <span class = "cloths" onclick="focuser(2)">L</span>
                                    <span class = "cloths" onclick="focuser(3)">XL</span>
                                    <span class = "cloths" onclick="focuser(4)">XXL</span>
                                    <span class = "cloths" onclick="focuser(5)">XXXL</span>
                                </div>';
                                }
                            ?>
                           
                            
                    </div><br>
                    <div class="mainprods">
                    <b style='color:#353543;font-size: 19px;'>Product Details</b><br><br><hr><br>
                    <p style='font-family:sans-serif;'><span style="font-size:17px;color:#808080;"><?php echo $desc;?></span></p></div><br>
                    <div class="mainprods">
                    <b style='color:#353543;font-size: 19px;'>Sold By</b><br><br>
                            <div class="shp"><div class="shp1"><img src="https://i.pinimg.com/originals/c6/c7/32/c6c7322df1086fd6b8b3a488c9107ee7.gif" alt="" id ="truck"></div></div>
                            <span style="font-size:18px;position:relative;top: -5px;" class="shp"><pre> </pre>Anjana Group.</span>
                            <?php $r2 = rand(28, 47)/10;
                            $r3 = rand(1000, 29999);
                            $r4 = rand(10, 400);
                            $r5 = rand(4, 99);?>
                            <div class="shp-details">
                                <div class="sd-box">
                                    <span> <div class="rating" style="color:dodgerblue;border-radius:27px;background-color:aliceblue;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                                    <?php echo sprintf("%.1f", $r2);?><i class="fa fa-star" style="color:dodgerblue;"></i></div></span><br><br><br><br>
                                    <span><div class="rates" style="margin-left:3px;"><?php echo $r3;?> ratings </div></span>
                                </div>
                                <div class="sd-box">
                                <span style="font-size:17px;color:#353543;margin-left:106px;padding-top:12px;"><?php echo $r4;?></span>
                                <span><div class="rates" style="margin-left:106px;padding-top:21px;">Followers</div></span>
                                </div>
                                <div class="sd-box">
                                <span style="font-size:17px;color:#353543;margin-left:196px;padding-top:12px;"><?php echo $r5;?></span>
                                <span><div class="rates" style="margin-left:196px;padding-top:21px;">Products</div></span>
                                </div>
                            </div>
                    </div><br>
                    <div class="mainprods">
                    <b style='color:#353543;font-size: 19px;'>Product Ratings & Reviews</b><br><br>
                        <div class="rating" style="color:dodgerblue;font-size:50px;   <?php if($r21<2.5){
                                            echo 'color:red;">';
                                        }
                                        elseif($r21>=2.5 && $r21<3.5){
                                            echo 'color:#F4B619;">';
                                        }
                                        else{
                                            echo 'color:#23bb75;>">';
                                        }?><?php echo sprintf("%.1f", $r21);?> <i class="fa fa-star" style="<?php if($r21<2.5){
                                            echo 'color:red;"';
                                        }
                                        elseif($r21>=2.5 && $r21<3.5){
                                            echo 'color:#F4B619;';
                                        }
                                        else{
                                            echo 'color:#23bb75;';
                                        }?>;font-size:30px;margin-left:-5px;"></i></div><br>
                                    
                                    <div class="rates" style="position:absolute;left:-3px;"><?php echo $r31;?> ratings, </div><br>
                                    <div class="revs" style="position:absolute;margin-left:17px;"> <?php echo $r41;?> reviews</div>
                                    <div class="ratbox">
                                        <div class="adj inl">
                    <font style='color:#353543;font-size: 14px;'>Excellent</font></div><div class="fillbar inl"><span style="width: 260px;height:6px;background-color:lightgray;"><span style="position:absolute;left:141px;background:#06a759;height:6px;width: 100px;border-radius:5px;"></span></span></div><div class="ratnum inl"><pre> </pre>5039</div>
                    
                    <div class="adj inl">
                    <font style='color:#353543;font-size: 14px;'>Very Good</font></div><div class="fillbar inl"><span style="width: 260px;height:6px;background-color:lightgray;"><span style="position:absolute;left:141px;background:lightgreen;height:6px;width: 80px;border-radius:5px;"></span></span></div><div class="ratnum inl"><pre> </pre>2831</div>
                                        <div class="adj inl">
                    <font style='color:#353543;font-size: 14px;'>Good</font></div><div class="fillbar inl"><span style="width: 260px;height:6px;background-color:lightgray;"><span style="position:absolute;left:141px;background:#f4b743;height:6px;width: 72px;border-radius:5px;"></span></span></div><div class="ratnum inl"><pre> </pre>2249</div>
                                        <div class="adj inl">
                    <font style='color:#353543;font-size: 14px;'>Average</font></div><div class="fillbar inl"><span style="width: 260px;height:6px;background-color:lightgray;"><span style="position:absolute;left:141px;background:#ec803d;height:6px;width: 55px;border-radius:5px;"></span></span></div><div class="ratnum inl"><pre> </pre>886</div>
                                        <div class="adj inl">
                    <font style='color:#353543;font-size: 14px;'>Poor</font></div><div class="fillbar inl"><span style="width: 260px;height:6px;background-color:lightgray;"><span style="position:absolute;left:141px;background:#f52833;height:6px;width: 60px;border-radius:5px;"></span></span></div><div class="ratnum inl"><pre> </pre>1501</div>
                    
                                    </div><br><br><hr><br><br>
                                    <div class="rev-prf">
                                        <img src="images/profile.jpg" alt="profile" class="ref-prf-icon"><font color="#8b8ba3" style="position:relative;top:-8px;left:5px;"><br>Kratos</font>
                                    </div><br>
                                    <?php
                                    $r2 = rand(28, 47)/10;
                                    echo '<div class="rating"';
                                    if($r2<2.5){
                                        echo "style='background-color:red;'";
                                    }
                                    elseif($r2>=2.5 && $r2<3.5){
                                        echo "style='background-color:#F4B619;'";
                                    }
                                    else{
                                        echo "style='background-color:#23bb75;'";
                                    }
                                    echo '>'.sprintf("%.0f", $r2).'.0<i class="fa fa-star"></i></div>
                                    <div class="rates" style="position:relative;top:-5px;"><i class="fa fa-long-arrow-right fa-lg  fa-pulse" style="color:#8b8ba3"></i> Posted on 13 Nov 2023</div>'?><br>
                                    <p color="#8b8ba3">It's really nice iss price me kaafi achha product hai ye comfortable hai n work krta hai kaafi zyada fitting nhi h par achha hai seriously</p><br>
                                    <img src="images/<?php echo $img;?>" alt="user Upload" width="120" height="120" style="border-radius:10px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;"><br><br><br><br><br><br><br><br>
                                    <pre style="color:#8b8ba3;font-family:sans-serif;"><i class='fa fa-thumbs-o-up fa-2x  fa-pulse' style='color:#469408;font-size:29px;'></i>  Helpful (7)</pre><br><hr><br>
                                    
                                    <div class="rev-prf">
                                        <img src="images/profile.jpg" alt="profile" class="ref-prf-icon"><font color="#8b8ba3" style="position:relative;top:-8px;left:5px;"><br>Miles Morales</font>
                                    </div><br>
                                    <?php
                                    $r2 = rand(28, 47)/10;
                                    echo '<div class="rating"';
                                    if($r2<2.5){
                                        echo "style='background-color:red;'";
                                    }
                                    elseif($r2>=2.5 && $r2<3.5){
                                        echo "style='background-color:#F4B619;'";
                                    }
                                    else{
                                        echo "style='background-color:#23bb75;'";
                                    }
                                    echo '>'.sprintf("%.0f", $r2).'.0<i class="fa fa-star"></i></div>
                                    <div class="rates" style="position:relative;top:-5px;"><i class="fa fa-long-arrow-right fa-lg  fa-pulse" style="color:#8b8ba3"></i> Posted on 24 Sep 2020</div>'?><br>
                                    <p color="#8b8ba3">Sab Kuchh theek tha bus Thode Se Dhaage nikale Hue The Isliye thoda sa kharab Laga baki sab ठीक-ठाकy</p><br>
                                    <img src="images/<?php echo $img;?>" alt="user Upload" width="120" height="120" style="border-radius:10px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;"><br><br><br><br><br><br><br><br>
                                    <pre style="color:#8b8ba3;font-family:sans-serif;"><i class='fa fa-thumbs-o-up fa-2x  fa-pulse' style='color:#469408;font-size:29px;'></i>  Helpful (10)</pre><br><hr><br>
                                    <div class="rev-prf">
                                        <img src="images/profile.jpg" alt="profile" class="ref-prf-icon"><font color="#8b8ba3" style="position:relative;top:-8px;left:5px;"><br>Harry Den</font>
                                    </div><br>
                                    <?php
                                    $r2 = rand(30, 47)/10;
                                    echo '<div class="rating"';
                                    if($r2<2.5){
                                        echo "style='background-color:red;'";
                                    }
                                    elseif($r2>=2.5 && $r2<3.5){
                                        echo "style='background-color:#F4B619;'";
                                    }
                                    else{
                                        echo "style='background-color:#23bb75;'";
                                    }
                                    echo '>'.sprintf("%.0f", $r2).'.0<i class="fa fa-star"></i></div>
                                    <div class="rates" style="position:relative;top:-5px;"><i class="fa fa-long-arrow-right fa-lg  fa-pulse" style="color:#8b8ba3"></i> Posted on 24 Sep 2020</div>'?><br>
                                    <p color="#8b8ba3">Too good 👍😊😊😊😊😊😊👍 sound quality nice </p><br>
                                    <img src="images/<?php echo $img;?>" alt="user Upload" width="120" height="120" style="border-radius:10px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;"><br><br><br><br><br><br><br><br>
                                    <pre style="color:#8b8ba3;font-family:sans-serif;"><i class='fa fa-thumbs-o-up fa-2x  fa-pulse' style='color:#469408;font-size:29px;'></i>  Helpful (76)</pre><br><hr><br><div class="rev-prf">
                                        <img src="images/profile.jpg" alt="profile" class="ref-prf-icon"><font color="#8b8ba3" style="position:relative;top:-8px;left:5px;"><br>Harry Den</font>
                                    </div><br>
                                    <?php
                                    $r2 = rand(10, 20)/10;
                                    echo '<div class="rating"';
                                    if($r2<2.5){
                                        echo "style='background-color:red;'";
                                    }
                                    elseif($r2>=2.5 && $r2<3.5){
                                        echo "style='background-color:#F4B619;'";
                                    }
                                    else{
                                        echo "style='background-color:#23bb75;'";
                                    }
                                    echo '>'.sprintf("%.0f", $r2).'.0<i class="fa fa-star"></i></div>
                                    <div class="rates" style="position:relative;top:-5px;"><i class="fa fa-long-arrow-right fa-lg  fa-pulse" style="color:#8b8ba3"></i> Posted on 24 Sep 2020</div>'?><br>
                                    <p color="#8b8ba3">Worst Product Don't Buy this Product Money Waste </p><br>
                                    <img src="images/<?php echo $img;?>" alt="user Upload" width="120" height="120" style="border-radius:10px;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;"><br><br><br><br><br><br><br><br>
                                    <pre style="color:#8b8ba3;font-family:sans-serif;"><i class='fa fa-thumbs-o-up fa-2x  fa-pulse' style='color:#469408;font-size:29px;'></i>  Helpful (2)</pre><br><hr><br>
                                    <div class="all-rev" style="cursor:pointer;"> <font style='color:dodgerblue;pointer:cursor;'>View All Reviews <i class='fa fa-angle-right fa-lg' style='color:dodgerblue;'></i></font></div>
                    </div>
                    <?php
                    if( isset($_COOKIE['loginchecker'])  && $_COOKIE['loginchecker']==1){
                    echo '<div class="buynow ">
                    <a href="buy.php" style="text-decoration:none;"><button style="background-color:rgb(73, 156, 198);border: none;margin-left:0px;"><p style="color:white;font-size: 20px;"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>Buy Now</p></button></a><pre>                                                    </pre>
                        <button style="background-color:rgb(73, 156, 198);border: none;float:right;margin-right:30px;"><a href="cart_add.php?pid='.$_GET['productid'].'" style="text-decoration:none;"><p style="color:white;font-size: 20px;"><i class="fa fa-shopping-cart"></i> Add to Cart</p></a></button>
                    </div><br><br>';}
                    else{
                    echo '<div class="buynow">
                    <a href="login.php" style="text-decoration:none;"><button class="glow-on-hover" style="background-color:rgb(73, 156, 198);border: none;margin-left:0px;"><p style="color:white;font-size: 20px;"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i>Buy Now</p></button></a><pre>                                                </pre>
                        <button class="glow-on-hover" style="background-color:rgb(73, 156, 198);border: none;float:right;margin-right:30px;"><a href="login.php" style="text-decoration:none;"><p style="color:white;font-size: 20px;"><i class="fa fa-shopping-cart"></i> Add to Cart</p></a></button>
                    </div><br><br>';}?>
            </div>
            </div>
            
    <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="jquery.magnify.js"></script>
    <script>
        $(document).ready(function() {
            $('.zoom').magnify();
        });
    </script>
    <h1 style="margin-top:70px;margin-left:160px;"><pre style="font-family:sans-serif;">PRODUCTS YOU MAY LIKE</pre></h1>
    <div class="uppers">
    <?php
                $count=0;
                while($count<30){
                    $r=rand(1,169);
                    $query="SELECT * FROM products WHERE id=$r";
                    $result=mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result)){
                            //echo "<div class='productbox'>
                            //    <div class='detbox'>
                            //        <div class='img1'><a href='product.php?productid=".$row['id'].";'><img src='images/".$row['photo']."' ></div>
                              //      <div class='name1'><h4 style='color:dodgerblue;float:left;font-size: 16px;margin-left:20px;margin-right:20px'>".$row['name']."</h4></div>
                                //    <div class='price1'><h3 style='float:left;color:mediumseagreen;margin-left:20px;margin-right :20px;margin-top:25px;'>$ ".$row['price']."</h3></a></div>
                                //</div>
                            //</div>";
                            $r2 = rand(28, 47)/10;
                            $r3 = rand(10, 1000);
                            if($_COOKIE['ptype']==2){
                                if($row['category_id']>4){
                                    echo '<div class="card-container">
                                        <div class="card">
                                            <div class="card-inner ">
                                                <div class="card-front">
                                                <div class="img">
                                                <a href="product.php?productid='.$row['id'].'";><img src="images/'.$row['photo'].'" ></div>
                                                <div class="name"><span>'.$row['name'].'</span></div>
                                                <div class="price" style="text-align:left;"><span style="text-align:left;"><font style="text-align:left;margin-left:0px;margin-top:8px;font-size :27px;">$'.$row['price'].'   </font><sub style=color:#8b8ba3;font-size :7px;>Onwards</sub></span></div>
                                                <div class="free-delivery">Free Delivery</div>
                                                <div class="rating"';
                                                if($r2<2.5){
                                                    echo "style='background-color:red;'";
                                                }
                                                elseif($r2>=2.5 && $r2<3.5){
                                                    echo "style='background-color:#F4B619;'";
                                                }
                                                else{
                                                    echo "style='background-color:#23bb75;'";
                                                }
                                                echo '>'.sprintf("%.1f", $r2).'<i class="fa fa-star"></i></div>
                                                <div class="rates">'.$r3.' reviews</div>
                                                </div>
                                                <div class="card-back glow-on-hover" >
                                                <div class="img ">
                                                <a href="product.php?productid='.$row['id'].'";><img src="images/'.$row['photo'].'" ></div>
                                                    <h3 class="glow-on-hover"> View Product </h3>
                                                </div>
                                            </div>
                                        </div></div>';
                                }
                            $count++;
                                }
                            
                            else{
                                
                                if($row['category_id']<4){
                                    echo '<div class="card-container">
                            <div class="card">
                                <div class="card-inner ">
                                    <div class="card-front">
                                    <div class="img">
                                    <a href="product.php?productid='.$row['id'].'";><img src="images/'.$row['photo'].'" ></div>
                                    <div class="name"><span>'.$row['name'].'</span></div>
                                    <div class="price" style="text-align:left;"><span style="text-align:left;"><font style="text-align:left;margin-left:0px;margin-top:8px;font-size :27px;">$'.$row['price'].'   </font><sub style=color:#8b8ba3;font-size :7px;>Onwards</sub></span></div>
                                    <div class="free-delivery">Free Delivery</div>
                                    <div class="rating"';
                                    if($r2<2.5){
                                        echo "style='background-color:red;'";
                                    }
                                    elseif($r2>=2.5 && $r2<3.5){
                                        echo "style='background-color:#F4B619;'";
                                    }
                                    else{
                                        echo "style='background-color:#23bb75;'";
                                    }
                                    echo '>'.sprintf("%.1f", $r2).'<i class="fa fa-star"></i></div>
                                    <div class="rates">'.$r3.' reviews</div>
                                    </div>
                                    <div class="card-back glow-on-hover" >
                                    <div class="img ">
                                    <a href="product.php?productid='.$row['id'].'";><img src="images/'.$row['photo'].'" ></div>
                                        <h3 class="glow-on-hover"> View Product </h3>
                                    </div>
                                </div>
                            </div></div>';
                    }
                    $count++;
                                }
                            }
                            
                    };?></div>
                    <script>const x = document.getElementsByClassName('cloths');
                    function focuser(i){
                        x[i].style.color="white";
                        x[i].style.backgroundColor="dodgerblue";
                        var j = 0;
                        while(j<6){
                            if(j!=i){
                                x[j].style.color="#353543";
                                x[j].style.backgroundColor="white";
                            }
                            j++;
                        }
                        document.getElementById('pr').innerHTML="$ "+(<?php echo $price;?>*(1+i/10)).toFixed(2);}
                    </script>
                    
    <?php include 'includes/footer.php';
    $p = $counter+1;
    $stmt=$conn->prepare("UPDATE products SET counter = ? WHERE id= ?");
                $stmt->bind_param("ss", $p, $prodid);
                $stmt->execute();?>
</body>
</html>