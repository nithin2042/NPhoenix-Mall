<html>
    <head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <style>
            *{
                text-decoration:none;
            }
            .prods{
                width:100%;
            }
            body{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
                overflow-x:hidden;
            }
            h1{
                margin-left:50vw;
                transform:translateX(-50%);
            }
            .card-container{
                border: 1px solid lightgray;
                height: 40vh;
                width:60vw;
                display:inline flex;
                margin: 20px;
                margin-left:50vw;  
                transform:translateX(-50%);
                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
                padding:15px;
            }
            .card-container:nth-child(1){
                position: relative;
            }
            .card:hover {
                transform: translate3d(0px, 0px, -150px);
                box-shadow: 0 50px 80px -20px rgba(76, 77, 79, 0.3); /* Increased box shadow on hover */
            }
            img{
                height:100%;
                width:30vw;
            }
            .food-details{
                position: relative;
                boder:2px solid grey;
                left:32vw;
                top:-35vh;
            }
            .name{
        height:15%;
        width:25vw;
        white-space: nowrap
        text-overflow: ellipsis; 
        background-color:aliceblue;
        overflow:hidden;
        color:gray;
        display:block;
        text-align:left;
        font-size:2em;
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
    .fa-star{
            font-size:12px;
            margin-left:3px;
        }
        .rates{
            color:gray;
            font-size:12px;
            margin-left:7px;
        }

        </style>
    </head>
<body>
    

<h1 style="color:orange;">LIST OF FOOD ITEMS </h1>
    <div class="prods">
    <?php 
    $server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hoteldata";
 	$conn = mysqli_connect($server, $username, $password, $dbname);
	if($conn -> connect_error){
		die("Connection failed : ".$conn->connect_error);
	}
    $count=0;
    while($count<70){
        $r=rand(1,169);
    $query="SELECT * FROM items where id=$r";
                    $result=mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result)){
                      $r2 = rand(20, 47)/10;
                                  $r3 = rand(10, 1000);
                          echo '<div class="card-container">
                          <div class="card">
                              <div class="card-inner ">
                                  <div class="card-front">
                                  <a href="food_item.php?foodId='.$row['id'].'";><img src="images/'.$row['Image'].'" >
                                  <div class="food-details">
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
                                  <div class="rates">'.$r3.' reviews</div></div>
                                  </div>
                                  </div></div></div>';$count++;}
                  }
                  ?>
                  </div>
    </div>
    </body></html>