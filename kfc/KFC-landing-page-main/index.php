<!DOCTYPE html>
<html lang="en">
<head>
  
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  
    <style>
      <?php include 'style2.css';?>
      *, html{
        text-decoration:none;
        scroll-behavior:smooth !important;
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
        z-index: 9999;
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
        z-index: inherit;
        
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
        padding: 3px 10px;
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
        z-index: 9999;;
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
        .box1{
            width:300px;
            z-index: initial;
        }
        .prods{
          margin-left:80px;
        }
        #rests1, #rests{
          scroll-behaviour:smooth;
        }
    </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NPhoenix Food</title>
</head>
<body>
  <section class="main">
    <header>
      <a href="#"><img src="logo1.png" class="logo" style="width:150px;position:relative;top:-10px;"></a><br><br><br>
      <div class="toggle"></div>
      <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="#rests" id ="rests1">Restaurents</a></li>
        <?php
      include '../../ecom1/includes/conn.php';
      if(!empty($_COOKIE['loginchecker'])){
        if($_COOKIE['loginchecker']==1){
            $id=$_COOKIE['userid'];
            $login=$_COOKIE['loginchecker'];
            $query="SELECT * FROM users" ;
            $result=mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
                if($row['id']==$id){
                    echo '<div class="in-ops"><a href="profile.php"><img src="../../ecom1/images/'.$row['photo'].'" alt=""><Strong>'.$row['firstname']." ".$row['lastname'].'</strong>';
                    
                    
                }
            }
        }
    }
                else{
                  echo 
                    '<li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>';
                }
      ?>
      </ul>
    </header>
    <div class="content">
      <div class="text">
        <br><br><br><br><br><br><br>
        <h2>It's Everyone's<br>Favourite <span>Food.</span></h2>
        <p>The food in this website are tasty and as well as everyone's favourite. Every food item in this website has a rating of more than 3.5 rating.Kindly order food within the working hours between 9:00 AM and 9:00 PM</p>
        <a href="#" class="btn">Order Now</a>
      </div>
      <div class="slider">
        <div class="slides active">
          <img src="burger_fries.png">
        </div>
        <div class="slides">
          <img src="french_fries.png">
        </div>
        <div class="slides">
          <img src="burger.png">
        </div>
        <div class="slides">
          <img src="fried_chicken.png">
        </div>
      </div>
    </div>

    <div class="footer">
      <ul class="sci">
        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
      </ul>
      <div class="prevNext">
        <p>Always Fresh</p>
        <span class="prev"><ion-icon name="chevron-back-outline"></ion-icon></span>
        <span class="next"><ion-icon name="chevron-forward-outline"></ion-icon></span>
      </div>
    </div>
    <br><br><br>
            <h1 style="color:orange;">LIST OF RESTAURENTS </h1>
    <div class="prods" id="rests">
    <?php 
    $server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hoteldata";
 	$conn = mysqli_connect($server, $username, $password, $dbname);
	if($conn -> connect_error){
		die("Connection failed : ".$conn->connect_error);
	}
    $query="SELECT * FROM hotels";
                    $result=mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result)){
                      $r2 = rand(20, 47)/10;
                                  $r3 = rand(10, 1000);
                        if($row['id']<=20){
                          echo '<div class="card-container">
                          <div class="card">
                              <div class="card-inner ">
                                  <div class="card-front">
                                  <div class="img">
                                  <a href="food_items.php";><img src="images/'.$row['Image'].'" ></div>
                                  <div class="name"><span>'.$row['Name'].'</span></div>
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
                                  <a href="food_items.php";><img src="images/'.$row['Image'].'" ></div>
                                      <h3 class="glow-on-hover"> View Food Items </h3>
                                  </div>
                              </div>
                          </div></div>';
                  }
                  }?>
    </div>
    <br><br><br>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script>
    //toggle 
    const menutoggle = document.querySelector('.toggle');
    const navigation = document.querySelector('.navigation');
    menutoggle.onclick = function(){
      menutoggle.classList.toggle('active')
      navigation.classList.toggle('active')
    }

    //slider
    const slides = document.querySelectorAll('.slides');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');

    i = 0;
    
    function ActiveSlide(n){
      for(slide of slides)
      slide.classList.remove('active');
      slides[n].classList.add('active');
    }

    // function for next btn
    next.addEventListener('click', function(){
      if(i == slides.length - 1){
        i = 0;
        ActiveSlide(i);
      }
      else 
      {
        i++;
        ActiveSlide(i);
      }
    })

     // function for prev btn
     prev.addEventListener('click', function(){
      if(i == 0){
        i = slides.length - 1;
        ActiveSlide(i);
      }
      else 
      {
        i--;
        ActiveSlide(i);
      }
    })
  </script>
</body>
</html>