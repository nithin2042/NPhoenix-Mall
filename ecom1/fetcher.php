<?php 
    include 'includes/conn.php';
    $search = "";
    if(isset($_COOKIE['sel_val'])){
        $search = $_COOKIE['sel_val'];
    }
    echo                        '<tr>
                                    <th></th>
                                    <th>Photo <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Email<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Name<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Status<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Date Added<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Tools<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                </tr>';
                                    if(isset($_COOKIE['sel_val'])){
                                        $search = $_COOKIE['sel_val'];}
                                    $query100="SELECT id FROM users  WHERE firstname LIKE '%$search%' or lastname LIKE '%$search%'";
                                    $result100=mysqli_query($conn, $query100);
                                    $count=0;
                                    $rows = 0;
                                    while($row100 = mysqli_fetch_assoc($result100)){
                                        $userid=$row100['id'];
                                    $query="SELECT * FROM users WHERE id=$userid";
                                    $result=mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($result)){
                                        if($row['type']==0){
                                            $rows++;
                                        echo "<tr>
                                        <td></td>
                                        <td><img src='images/".$row['photo']."'><a href='img_upload1.php?id=".$row['id']."'><button style='background-color:pink;' id = 'image-editor'><i class='fa fa-edit' style='float:right;background-color:magneta;'></i></button></a></td>
                                        <td>".$row['email']."</td>
                                        <td>".$row['firstname']." ".$row['lastname']."</td>
                                        <td><b style='color:white;background-color:rgba(10,200,10);padding:5px 10px;font-size:10px;'>active</b></td>
                                        <td>".$row['created_on']."</td>
                                        <td><a href='cart_view.php?userid1=".$row['id']."'><button style='background-color:rgba(0,200,200,0.7);' ><i class='fa fa-search'></i>cart</button></a><button onclick='editFunction(".$row['id'].")'><i class='fa fa-edit'></i>edit</button><button onclick='delFunction(".$row['id'].")' style='background-color:rgba(255,20,20,0.9);'><i class='fa fa-trash-o'></i>delete</button></td>
                                    </tr>";
                                    if (isset($_COOKIE['rows']) && $_COOKIE['rows'] == $rows){break;}}
                                    }}
?>