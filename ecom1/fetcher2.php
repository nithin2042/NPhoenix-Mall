                                <tr>
                                    <th></th>
                                    <th>Category Name <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Tools<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                </tr><?php
    include 'includes/conn.php';
    $search="";
                                if(isset($_COOKIE['catsearch'])){
                                    $search=$_COOKIE['catsearch'];
                                }
                                $rownum=10000;
                                if(isset($_COOKIE['catsel'])){
                                    $rownum=$_COOKIE['catsel'];
                                }
            $query100="SELECT id FROM category  WHERE name LIKE '%$search%' or cat_slug LIKE '%$search%'";
            $result100=mysqli_query($conn, $query100);
            $count=0;
            $rows = 0;
            while($row100 = mysqli_fetch_assoc($result100)){
                $userid=$row100['id'];
            $query="SELECT * FROM category WHERE id=$userid" ;
            $result=mysqli_query($conn,$query);
            if($count<$rownum){
                $count++;
                while($row = mysqli_fetch_assoc($result)){
                    $rows++;
                        echo "<tr>
                        <td></td>
                        <td>".$row['name']."</td>
                        <td><button id='catedit' name='cateid' onClick='editFunction(".$row['id'].")' style='display:inline-block;padding:5 10;'><i class='fa fa-edit'></i>Edit</button><button style='display:inline-block;background-color:red;padding:5 10;'onClick='delFunction(".$row['id'].")' id='del' style='background-color:rgba(255,20,20,0.7);'><i class='fa fa-trash-o'></i>Delete</button></td></td>
                    </tr>";
                }  }}
                if($rownum==10000){
                    $rownum=$rows;
                }
                setrawcookie('rows', $rows);
        ?>