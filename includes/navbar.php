<header class="main-header">
        <nav onmouseover = "speed()" onmouseout = "speed2()">
        <table><tr>
            <div class="wr">
                <td><div class="logo"><p id="l" class="glow-on-hover" onmouseover = "speed()" onmouseout = "speed2()"><?php 
                if($_COOKIE['ptype']==2){
                    echo 'NPhoenix Clothing';
                }
                else{
                    echo 'Nphoenix Electronics';
                }
                ?></p></div></td>
                    <div class="options ">
                        <ul class="categories">
                            <td><li class="main glow-on-hover"><a class="m" <?php if(isset($_COOKIE['userid']) && $_COOKIE['userid']!=0){echo 'href="index.php"';}elseif (!isset($_COOKIE['loginchecker']) || $_COOKIE['loginchecker']=0) {
                               echo "href='index.php'";
                            }else if($_COOKIE['userid']==1){echo 'href="adminhome.php"';}else{echo "href='index.php'";}?>><i class="fa fa-home"></i> Home</a></li></td>
                            <td><li class="main"><a class="m" href="#">Select category<i class="fa fa-caret-down"></i></a>
                            <div class="submenu">
                                <ul>
                                <?php   
                                        include 'conn.php';
                                        $query111="SELECT * FROM category" ;
                                        $result111=mysqli_query($conn,$query111);
                                        while($row111 = mysqli_fetch_assoc($result111)){
                                            if($_COOKIE['ptype']==2){
                                                if($row111['id']>4){
                                                echo '<li class="sub glow-on-hover"><a class="s" href="category.php?category='.$row111['id'].';">'.$row111['name'].'</a></li>';}
                                            }
                                            else{
                                                if($row111['id']<=4){
                                                echo '<li class="sub glow-on-hover"><a class="s" href="category.php?category='.$row111['id'].';">'.$row111['name'].'</a></li>';
                                            }}
                                        }
                                            
                                            ?>
                                            
                                </ul>
                            </div>
                            </li>
                        </ul></td>
                    <div class="search">
                        <td>
                        <form method="POST">
                            <input class="m1" id="m1" type="text" placeholder="Search..." style="float:left;" name="search">
                            <button class="m2" id="m2" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        </td>
                        <?php if(!empty($_POST['search'])){
                         $search = $_POST['search'];
                            echo "<script>window.location='search.php?search=".$search."'</script>";
                        }?>
                    </div>
                </div>
            </div>
            <div class="right">
                <td><?php
                        $query11="SELECT * FROM cart" ;
                        $count11=0;
                        if(isset($_COOKIE['userid'])){
                        if(isset($_COOKIE['loginchecker'])){
                        $result11=mysqli_query($conn,$query11);
                        while($row11 = mysqli_fetch_assoc($result11)){
                            if($_COOKIE['userid']==$row11['user_id']){$count11++;}}
                                if ($_COOKIE['loginchecker']==1){
                                    echo "<div class='cart'>
                                        <form action='cart_view.php?userid=".$_COOKIE['userid']."'>
                                            <button class='cart'><i class='fa fa-shopping-cart'><sup style='color:mediumseagreen;border-radius:50%;'>".$count11."</sup></i></button>
                                        </form>
                                    </div>"; }}}?>
                </td>
                        <?php
                                if(!empty($_COOKIE['loginchecker'])){
                                    if($_COOKIE['loginchecker']==1){
                                        $id=$_COOKIE['userid'];
                                        $login=$_COOKIE['loginchecker'];
                                        $query="SELECT * FROM users" ;
                                        $result=mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)){
                                            if($row['id']==$id){
                                                echo " 
                                                <div class='profile'><td>
                                                    <div class='prficon'>
                                                    <a href='profile.php'><img src='images/".$row['photo']."' alt='images/noimage.jpg'></a>
                                                    </div>
                                                </td>
                                            <td>
                                            <a href='profile.php'> <b>  ".$row['firstname']." ".$row['lastname']."</b></a>
                                            </td>
                                            </div>";
                                            }
                                        }
                                    }
                                }
                            else{
                            echo "<ul class='right' style='position:absolute;right:200px;top:28px;'>
                                    <li class='main'>
                                        <a class='m glow-on-hover ' href='login.php'>Login</a>
                                    </li>
                                    <li class='main glow-on-hover '>
                                        <a class='m' href= 'signup.php'>Signup</a>
                                    </li>
                                  </ul>";
                            }
                        ?>
             </div>
             
        </tr>
        </table>
        
        </nav>
        <div id="nav"><div class="bck" id = "bck" style="background-image:url('<?php
        
                if($_COOKIE['ptype']==1){
                    echo 'https://images7.alphacoders.com/864/864929.jpg';
                }
                else{
                    echo 'https://tse1.mm.bing.net/th?id=OIP.C7PNEQEQFyW5rq-HyLnTLAHaEm&pid=Api&P=0&h=180';
                }
                
                ?>')"></div></div>
    </header>
    <script>
        function speed(){
                    document.getElementById('bck').style.animation='move 3s linear infinite';
                }
                function speed2(){
                    document.getElementById('bck').style.animation='move 300s linear infinite';
                }
    </script>
