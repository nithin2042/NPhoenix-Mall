<?php $menubtn=0;?>
<html>
<head>
    <meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPHOENIX - A Virtual Mall</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <?php include 'alladmin.css';?>
</head>
<body style="height:600px;overflow:hidden;"> 
        <?php 
            include 'includes/conn.php';
            $query100="SELECT id FROM products";
            $result100=mysqli_query($conn, $query100);
            $no_of_products=mysqli_num_rows($result100);
            $query1000="SELECT id FROM users";
            $result1000=mysqli_query($conn, $query1000);
            $no_of_users=mysqli_num_rows($result1000);
            if(array_key_exists('menubutton1', $_POST)){
                $menubtn=1;
            }
            if(array_key_exists('menubutton2', $_POST)){
                $menubtn=0;
            }

            if($menubtn==0){
                echo "<div class='topbar1' style='position:fixed;'>

                    </div>
                    <div class='leftbar' style='position:fixed;'>
                    <div class='menubutton' style='width:45px;height:45px;position:fixed;'>
                        <form method='post' style='width:45px;height:45px;'>
                            <button type='submit' name='menubutton1' style='width:45px;height:45px;position:fixed;'>
                                <i class='fa fa-bars'></i>
                            </button>
                        </form>
                    </div>
                    </div>
                    <div class='mainbody1'>
                    <div class='head1'><b style='float:left;font-size:26px;margin-top:15px;color:White;'>Dashboard</b><p style='color:white;float:right;font-size:13px;margin-top:20px;'>Home > Dashboard</pre></div>
                    <div class='boxes1'>
                        <div class='boxo1'>
                            <div class='up' style='background-color: rgba(100, 160, 220, 0.8);'>
                                <h1 style='color:white;'>$ 14.97K</h1>
                                <p style='color:white;'>Total Sales</p>
                                <i class='fa fa-shopping-cart' style='color: rgba(100, 160, 220);'></i>
                            </div>
                            <div class='down' style='background-color: rgba(100, 160, 220);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                        <div class='boxo1'>
                            <div class='up' style='background-color: rgba(10,150,10, 0.8);' >
                            <h1 style='color:white;'>".$no_of_products."</h1>
                            <p style='color:white;'>Number of Products</p>
                            <i class='fa fa-barcode' style='color: rgba(10,150,10);'></i>
                            </div>
                            <div class='down' style='background-color: rgba(10,150,10);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                        <div class='boxo1'>
                            <div class='up' style='background-color: rgba(255,112,0,0.8);'><h1 style='color:white;'>".$no_of_users."</h1>
                            <p style='color:white;'>Number of Users</p>
                            <i class='fa fa-users' style='color: rgba(255,112,0);'></i></div>
                            <div class='down' style='background-color:rgba(255,112,0);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                        <div class='boxo1'>
                            <div class='up' style='background-color: rgba(255,0,0,0.8);'><h1 style='color:white;'>$ 0</h1>
                            <p style='color:white;'>Sales Today</p>
                            <i class='fa fa-money' style='color: rgba(255,0,0);'></i></div>
                            <div class='down' style='background-color: rgba(255,0,0);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div></div>
                        <div class='graph1'>
                            <p style='color:white;font-size:20px;'>Monthly Sales Report</p>
                            <form action='adminhome.php' id='form'><div class='rt1'><label style='color:white;font-size:14px;'>Select year : </label><select onchange='change()'><option>2023</option><option>2022</option><option>2021</option><option>2020</option><option>2019</option></select></form></div>
                            <p align='center' style='color:white'>SALES <i class='fa fa-square' style='color:dodgerblue;'></i></p>
                            <div  class='bars box-shadow' style='color: black;'>
                            <table cellspacing=20px' style='text-align:left;'>
                            <tr><td> sales($)</td><td> $ 1000</td><td>$ 2000</td><td>$ 3000</td><td>$ 4000</td><td>$ 5000</td><td>$ 6000</td><td>$ 7000</td><td>$ 10000</td><td>$ 9000</td><td>$ 10000</td><td>$ 11000</td><td>$ 12000</td><td>$ 13000</td><td>$ 14000</td><td>$15000</td></tr></table>
                            <table>
                                <table>
                                <tr><td>January</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>February</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>March</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>April</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>May</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>June</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>July</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>August</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>September</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>October</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>November</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>December</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                </table>
                                </div>
                                
                    </div>";

            }
            else if($menubtn==1){
                echo "<div class='topbar2' style='position:fixed;'>

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
                    <div class='mainbody2'>
                    <div class='head'><b style='float:left;font-size:20px;margin-top:15px;color:white;'>Dashboard</b><p style='float:right;color:white;font-size:13px;margin-top:20px;'>Home > Dashboard</pre></div>
                    <div class='boxes'>
                        <div class='boxo'>
                            <div class='up' style='background-color: rgba(100, 160, 220, 0.8);'>
                                <h1 style='color:white;'>$ 14.97K</h1>
                                <p style='color:white;'>Total Sales</p>
                                <i class='fa fa-shopping-cart' style='color: rgba(100, 160, 220);'></i>
                            </div>
                            <div class='down' style='background-color: rgba(100, 160, 220);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                        <div class='boxo'>
                            <div class='up' style='background-color: rgba(10,150,10, 0.8);' >
                            <h1 style='color:white;'>".$no_of_products."</h1>
                            <p style='color:white;'>Number of Products</p>
                            <i class='fa fa-barcode' style='color: rgba(10,150,10);'></i>
                            </div>
                            <div class='down' style='background-color: rgba(10,150,10);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                        <div class='boxo'>
                            <div class='up' style='background-color: rgba(255,112,0,0.8);'><h1 style='color:white;'>".$no_of_users."</h1>
                            <p style='color:white;'>Number of Users</p>
                            <i class='fa fa-users' style='color: rgba(255,112,0);'></i></div>
                            <div class='down' style='background-color:rgba(255,112,0);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                        <div class='boxo'>
                            <div class='up' style='background-color: rgba(255,0,0,0.8);'><h1 style='color:white;'>$ 0</h1>
                            <p style='color:white;'>Sales Today</p>
                            <i class='fa fa-money' style='color: rgba(255,0,0);'></i></div>
                            <div class='down' style='background-color: rgba(255,0,0);'><a href='#'>more info <i class='fa fa-arrow-circle-right'></i></a></div>
                        </div>
                    </div>
                    <div class='graph'>
                            <p style='color:rgba(70,70,70);font-size:18px;color:white;'>Monthly Sales Report</p>
                            <form action='adminhome.php' id='form'><div class='rt1'><label style='color:white;font-size:14px;'>Select year : </label><select onchange='change()' style='background-color:;'><option>2023</option><option>2022</option><option>2021</option><option>2020</option><option>2019</option></select></form></div>
                            <p align='center' style='color:white;'>SALES <i class='fa fa-square' style='color:dodgerblue;'></i></p>
                            <div  class='bars1 box-shadow'>
                                
                                <table cellspacing='15px' style='text-align:left;'>
                                <tr><td> sales($)</td><td> $ 1000</td><td>$ 2000</td><td>$ 3000</td><td>$ 4000</td><td>$ 5000</td><td>$ 6000</td><td>$ 7000</td><td>$ 8000</td><td>$ 9000</td><td>$ 10000</td><td>$ 11000</td><td>$ 12000</td><td>$ 13000</td><td>$ 14000</td><td>$15000</td></tr></table>
                                <table>
                                <tr><td>January</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>February</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>March</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>April</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>May</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>June</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>July</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>August</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>September</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>October</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>November</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                <tr><td>December</td><td><div class='appear'style='background-color: dodgerblue;width:".rand(0,1000)."px;height:45px;'><div></td></tr>
                                </table>
                                </div>
                                
                    </div>";
            }
        ?>
        <a href='profile.php' class = 'ppp'><div style="position:fixed;right:63px;top:5px;"><img src='images/thanos1.jpg'   style="float:left;width:35px;height:35px;border-radius:50%;"><p onMouseOver="this.style.color:blue" style="color:white;float:right;margin-top:7px;margin-left:4px;vertical-align:center;">Code Projects</p></div></a>
        <script>
            function change(){
                document.getElementById("form").submit();
                window.location = 'adminhome.php';
            }
        </script>
</body>
</html>