<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>NPHOENIX</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <?php include 'all.css'?>
    <style>
        span{
            text-align:center;
            font-size:15px;
            font-weight:600;
            padding-inline:15px;
        }
        span.num{
            font-size:15px;
            border-right:2px solid gray;
            border-left:2px solid gray;
            pointer-events:none;
        }
        .spans{
            width:150px;
            background-color:lightgray;
            cursor: pointer;
            border:2px solid gray;
        }
        .rm{
            background-color:red;
        }
        .fa-times{
            border:none;
            outline:none;
            font-size:24px;
        }
        button.rm{
            width:30px;
            height:30px;
            border:none;
        }
        .minus_10, .minus_11,.plus_10,.plus_11,.num_10,.num_11{
            background-color:green;
        }
        .sidebar{
                top:140px;
                left:1000px;
                position: absolute;
            }
        
    </style>
</head>
<body> 
    <?php include 'includes/navbar.php';?>
    <div class="cartbody"><br><br>
    <?php
    if($_COOKIE['logintype']=0){
            echo '<p style="float:left;color:rgb(50,50,50);font-size:23px;letter-spacing:0.5px;margin-top:19px;">YOUR CART</p><br><br><br>';}
    else{
            echo '<p style="float:left;color:rgb(50,50,50);font-size:23px;letter-spacing:0.5px;margin-top:19px;">USER CART</p><br><br><br>'; }  ?>
            <hr>
            <table class="carttable">
                <tr>
					<td></td>
	        		<td>Photo</td>
		    		<td>Name</td>
    				<td>Price</td>
		        	<td width="20%">Quantity</td>
					<td>Subtotal</td>
                </tr>
                                <?php 
                                    if(isset($_GET['userid1'])){$usrid=$_GET['userid1'];}
                                    elseif(isset($_COOKIE['userid'])){$usrid=$_COOKIE['userid'];}
                                    $tot=0;
                                    $query="SELECT * FROM cart" ;
                                        $result=mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            if($usrid==$row['user_id'] && $usrid!=1){
                                                $query2="SELECT * FROM products" ;
                                                    $result2=mysqli_query($conn,$query2);
                                                    while($row2 = mysqli_fetch_assoc($result2)){
                                                        if($row['product_id']==$row2['id']){
                                                            $id=$row['id'];
                                                        echo '</table><table class="carttable" >
                                                        <tr>    
                                                            <td><a href="cart_delete.php?cartid='.$row['id'].'"><button  class="rm" style="background-color:red;"><i class="fa fa-times" ></i></button></a></td>
                                                            <td><img src="images/'.$row2['photo'].'" alt="" style="max-width:160px;max-height:100%"></td>
                                                            <td>'.$row2['name'].'</td>
                                                            <td>$ '.$row2['price'].'</td>
                                                            <td>
                                                                <div class="spans">
                                                                        <a href="add_quantity.php?cartid='.$id.'"><button style="display:inline-block;border:none;width: 50px;padding:2 2;background:transparent;border-right:2px solid gray;">+</button></a>
                                                                        <span id="num" style="display:inline-block;">'.$row['quantity'].'</span>
                                                                        <a href="remove_quantity.php?cartid='.$id.'"><button style="display:inline-block;border:none;width: 50px;padding:2 2;background:transparent;border-left:2px solid gray;">-</button>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>$ '.$row2['price']*$row['quantity'].'</td>
                                                        </tr>
                                                        </table>';
                                                        $tot+=$row2['price']*$row['quantity'];
                                            }}}
                                        }
                                    ?>
                                    <?php echo "</table><table class='carttable' style='margin-bottom:0px;'>
                                                        <tr><td></td><td></td><td></td><td></td><td></td><td><h3 style='float:top;color:dodgerblue;'>Total : ".$tot."</h3>";?></td>
                                                        <?php echo "</table><table class='carttable' style='margin-bottom:50px;'>
                                                        <tr><td></td><td></td><td></td><td></td><td></td><td><h3 style='float:top;color:dodgerblue;'><button style='background-color:dodgerblue;padding:7 10;border:0;color:white;'>Buy Now</button>";?></td>
                   
        <?php include 'includes/sidebar.php'?>
    </div>
    <?php include 'includes/footer.php'?>
    </div>
</body>
</html>