<?php $menubtn=0;
        $width=1320;
        include 'includes/conn.php';
        ?>
<html>
<head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPHOENIX - A Virtual Mall</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style id="editbody"></style>
    <?php include 'alladmin.css';?>
    <style>
        .popup6{
            top:-400px;
        }
        @keyframes drop {
            0%{}
            70%{transform :translateY(490px)}
            100%{transform:translateY(455px)}
        }
    </style>
</head>
<body >  
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
                            <div class="head3"><h2>Sales History</h2><p>Home > Sales</p></div>
                            <div class="periodchooser">
                                <i class="fa fa-calendar"></i><input type="text" name="daterange" value="01/01/2018  -  01/15/2018" />

                                <script>
                                $(function() {
                                $('input[name="daterange"]').daterangepicker({
                                    opens: 'left'
                                }, function(start, end, label) {
                                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                                });
                                });
                                </script>
                            </div>
                            <div class="s22">
                                <form id="form" method="post"><p>Show <select onchange="change()" class="thesel" name="thesel" id="thesel"><option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="500">500</option>                                    
                                        </select> entries
                                </p></form>
                            </div>
                            <div class="s11" ><form action="" method="post" id="s11" name="s11"><label for="s11">Search : </label><input type="text" name="s11" placeholder="Search..." onchange="change1()"></form></div>
                            <?php 
                                $search="";
                                if(isset($_POST['s11'])){
                                    $search=$_POST['s11'];
                                }
                            ?>
                            <div class="transtable"><table>
                                <tr>
                                    <th></th>
                                    <th>Date <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Buyer Name<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Transaction#<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Amount<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Full Details<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                </tr>
                                <?php
                                     if(isset($_POST['thesel'])){
                                        $rownum=$_POST['thesel'];
                                    }
                                    else{
                                        $rownum=10000;
                                    }
                                    $query100="SELECT id FROM users  WHERE firstname LIKE '%$search%' or lastname LIKE '%$search%'";
                                    $result100=mysqli_query($conn, $query100);
                                    $count=0;
                                    $rows = 0;
                                    while($count<$rownum){
                                        $count++;
                                    while($row100 = mysqli_fetch_assoc($result100)){
                                        $userid=$row100['id'];
                                    $query="SELECT * FROM sales WHERE user_id =$userid";
                                    $result=mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $sales_id=$row['id'];
                                        $rows++;
                                        echo "<tr><td></td><td>".$row['sales_date']."</td>";
                                    $query2="SELECT * FROM users WHERE id=$userid";
                                    $result2=mysqli_query($conn,$query2);
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        if($row2['id']==$row['user_id']){
                                            echo "<td>".$row2['firstname']." ".$row2['lastname']."</td>";}}
                                            echo "<td>".$row['pay_id']."</td>";
                                    $query1="SELECT * FROM details WHERE sales_id=$sales_id";
                                    $result1=mysqli_query($conn,$query1);
                                    $amount=0;
                                    while($row1 = mysqli_fetch_assoc($result1)){
                                        if($row1['sales_id']==$row['id']){
                                            $query3="SELECT * FROM products";
                                            $result3=mysqli_query($conn,$query3);
                                            while($row3 = mysqli_fetch_assoc($result3)){
                                                if($row1['product_id']==$row3['id']){
                                                $amount+=$row3['price']*$row1['quantity'];}}
                                    }}
                                        echo "<td>$ ".$amount."</td>
                                        <td><button onclick='view_fun(".$row['id'].")'><i class='fa fa-search' ></i>View</button></td>
                                    </tr>";
                                    }}}

                                    if($rownum==10000){
                                        $rownum=$rows;
                                    }
                                    ?>
                                    </table></div>

                                    <p style='position:relative;top:90px;left:-1192px;' class="thesel">showing 2 out of 2 rows</p>
                                    <div class="popup6" id="popup6" style="padding:30 30;color:white;height:340px;">
                                        </div> 
                                    
                                     <script>
                                        function change(){
                                            document.getElementById("form").submit();
                                        }
                                        function change1(){
                                            document.getElementById("s11").submit();
                                        }
                                        function view_fun(i){
                                            document.cookie="sales_id="+i;
                                            var popup = document.getElementById('popup6');
                                            popup.classList.add('show');
                                            var blur = document.getElementById('editbody');
                                            blur.innerHTML=".s11,.transtable,.cato,.s22 , .results ,.leftbar,.topbar1,.topbar2,.leftmenu,.head3,.ppp,.addprf,.numbers, .thesel, .periodchooser {filter: blur(30px);}";
                                            popup.style.animation ="drop 0.5s ease forwards";
                                        }
                                        function loadDoc() {
                                                var xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                    document.getElementById("popup6").innerHTML = this.responseText;
                                                    }
                                                };
                                                xhttp.open("GET", "viewdetails.php", true);
                                                xhttp.send();
                                                }
                                                setInterval(() => {
                                                    loadDoc();
                                                }, 1000);
                                            loadDoc();
                                    </script>                         
                        </div>
                        
                       
                               
                </body>
                </html>
                