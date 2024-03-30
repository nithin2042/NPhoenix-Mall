<html>
    <head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <style>
        *{
        font-family:sans-serif;
        }
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
        height:20%;
        width:150%;
        white-space: nowrap
        text-overflow: ellipsis; 
        background-color:aliceblue;
        overflow:hidden;
        color:gray;
        display:block;
        text-align:left;
        font-size:4em;
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
    .prodbody{
        padding:20px;
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
    .prodbody img{
        width:50vw;
        height:70vh;
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
        margin-top:35px;
        color:white;
        font-size:20px;
    }
    .prodbody .price{
        font-size:5em;
        margin-top:-33px;
    }

   
        .card-back h3 {
            margin-bottom: 0.3rem;
        }

        .uppers{
            width:1208px;
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
            margin-left:70px;
            font-size:12px;
            margin-top:-13px;
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
            width: 90vw;
            height: 75vh;
            margin-left: 80px;
            border:1px solid lightgray;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }  
        .on{
            background:dodgerblue;
            color:white;
            font-size:3em;
            border:3px solid aliceblue;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            border-radius:16px;
        }
        h1{
            font-size:3em;
            width:41vw;
            color:dodgerblue;
            background-color:aliceblue;
            margin-left:80px;
            font-family:sans-serif;
            text-shadow: 2px 2px cyan;
        }
    </style>
    </head>
<body>
    <h1>FOOD ITEM INFORMATION</h1>
    
<?php

                if(isset($_GET['foodId'])){
                    $foodId = $_GET['foodId'];
                }
                $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "hoteldata";
                    $conn = mysqli_connect($server, $username, $password, $dbname);
                    if($conn -> connect_error){
                        die("Connection failed : ".$conn->connect_error);
                    }
                $query="SELECT * FROM items WHERE id = $foodId";
                $result=mysqli_query($conn,$query);
                $stmt = $conn->prepare($query);
                $stmt->execute();
                while($row = mysqli_fetch_assoc($result)){
                            if(!empty($row['Image'])){$img=$row['Image'];}else{$img='noimage.jpg';}
                            $name=$row['Name'];
                            $price=$row['price'];
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
                    <div class="name"><text><?php echo $name;?></text></div><br><br>
                    <div class="price"><span id="pr">$ <?php echo $price;?></span><br></div>
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
                                    ?><br><br><br><br>
                                    <button class="on" onclick="go()">Order Now</button></div><br>
                                    <script>
                                        function go(){
                                            window.alert("Ordered Successfully");
                                            window.location="index.php";
                                        }
                                    </script>
                                    </body>
                                    </html>