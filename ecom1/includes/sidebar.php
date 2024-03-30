<?php 
    include 'conn.php';
    $calc=$conn->prepare("SELECT * FROM products");
    $calc->execute();
    $arr = array();
    foreach($calc->get_result() as $row){
        $arr[$row['id']] = $row['counter'];
        }
    arsort($arr);
?>
<div class="sidebar" id="f">
        <div class="box1" id="b" >
            <h3 style="color:rgba(70,70,70);">Most viewed products today</h3><br>
            <div class="ininfo">
                <?php 
                $count =0;
                foreach ($arr as $key => $value) {
                    $calc1=$conn->prepare("SELECT * FROM products WHERE id=$key");
                    $calc1->execute();
                    foreach($calc1->get_result() as $row1){
                        if($_COOKIE['ptype']==2){
                            if($row1['category_id']>4){
                                echo '
                                <a class ="abox1" href="product.php?productid='.$row1['id'].'"><i class="fa fa-check-square-o"></i>'.$row1['name'].'</a><br>';
                                $count++;
                            }
                        }
                        else{
                            if($row1['category_id']<=4){
                                echo '
                                <a class ="abox1" href="product.php?productid='.$row1['id'].'"><i class="fa fa-check-square-o"></i>'.$row1['name'].'</a><br>';
                                $count++;
                            }
                        }
                        }
                    if($count == 4){
                        break;
                    }
                }?>
            </div>
        </div>
        <div class="box1" id="b1" >
            <h3 style="color:rgba(70,70,70);">Become a subscriber</h3><br>
            <p style="color:gray;">Get free updates on the latest products and discounts, straight to your email.</p><br>
            <input class="mailinp" type="text"><button style="border:none;padding:0px;margin:0px;height:35px;"class="mail"><i class="fa fa-envelope" style = "height:0px;margin:0px;margin-bottom:13px;"></i></button>
        </div>
        <div class="box1" id="b2">
            <h3 style="color:rgba(70,70,70);">Follow us on social media</h3><br>
            <div class="media">
                <button class="facebook" style="border:none;"><i class="fa fa-facebook "></i></button>
                <button class="twitter" style="border:none;"><i class="fa fa-twitter"></i></button>
                <button class="twitter" style="border:none;"><i class="fa fa-skype"></i></button>
                <button class="google" style="border:none;"><i class="fa fa-google"></i></button>
                <button class="instagram" style="border:none;"><i class="fa fa-instagram"></i></button>
                <button class="linkedin" style="border:none;"><i class="fa fa-linkedin"></i></button>
            </div>
        </div>
        
        </div>  