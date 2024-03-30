<?php
    session_start();
    include 'includes/conn.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NPHOENIX</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <?php include 'all.css'?>
        <style>
            .productbox{
                width:250px;
                height: 320px;
                cursor:pointer;
                float:left;
                display:inline block;
                margin-right:15px;
                margin-top:101px;
                margin-bottom:40px;
                z-index: -1;
                background: linear-gradient(90deg, rgba(20,20,170, 0.1), transparent);
                box-shadow:0px 0px 2px rgba(76, 77, 79, 0.4);
            }
            .productbox:hover{
                box-shadow:0px 10px 13px rgba(76, 77, 79, 0.4);
            }
            .detbox a{
                text-decoration:none;
            }
            .detbox{
                background-color:white;
            }
            .img1{
                width:250;
                height:230;
                overflow:hidden;
            }
            .detbox img{
                border-right:none;
                width:250px;
                max-height:150%;
                text-align:center;
            }
            .mainbody{
                width: 1440px;
                height:auto;
            }
            .mainbody{
                color:rgba(50,50,50);
                min-height: 600px;
                width: 1500px;
            }
            .productbox .detbox img{
                max-width:95%;
            }
            .name1{
                width:100%;
                background-color:rgba(254,254,254);
                height:40px;
                float:left;
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
    .free-delivery{
        background-color:aliceblue;
        border-radius:15px;
        width:fit-content;
        padding: 3px;
        margin-left:6px;
        font-size:12px;
        color:gray;
    }
    .rating{
        width:fit-content;
        padding: 3 8px;
        margin-left:6px;
        border-radius:15px;
        margin-top:5px;
        color:white;
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
        .rates{
            color:gray;
            margin-top:-15px;
            font-size:12px;
        }
        
        .card-back h3:nth-child(1){
            position: absolute;
            top:250px;
            color:white;
            background-color:rgb(180, 180, 180, 0.6);
            height: 50px;
            width:100%;
            padding-top:10px;
        }
        .uppers{
            width:1600px;
            margin-left:-10px;
        }
        </style>
    </head>
    <body>
        <?php include 'includes/navbar.php' ?>
        <div class="mainbody">
            <h2>Search Results :</h2>
            <?php
                if(isset($_GET['search'])){
                    $search=$_GET['search'];
                }
                else{
                    $search="";
                }
                $query="SELECT * FROM products WHERE name LIKE '%$search%'";
                $result=mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                //echo "<div class='productbox'>
                  //  <div class='detbox'>
                    //    <div class='img1' style='background-image:images/".$row['photo'].";'><a href='product.php?productid=".$row['id'].";'><img src='images/".$row['photo']."' ></div>
                      //  <div class='name1'><h4 style='color:dodgerblue;float:left;font-size: 16px;margin-left:20px;margin-right:20px'>".$row['name']."</h4></div><br>
                       // <div class='price1'><h3 style='float:left;color:mediumseagreen;margin-top:px;margin-left:20px;margin-right :20px;margin-top:25px;'>$ ".$row['price']."</h3></a></div>
                    //</div>
                //</div>";
                $r2 = rand(20, 47)/10;
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
                            </div></div>';}}
                            else{
                                if($row['category_id']<=4){
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
                            </div></div>';}}
            }?>
        <div class="foot"><?php include 'includes/footer.php'?></div>
    </body>
</html>