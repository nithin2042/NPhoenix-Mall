                                <tr>
                                    <th></th>
                                    <th>Name <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Photo<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Description<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Price<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Views Today<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                    <th>Tools<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i></th>
                                </tr></table></div>
                <?php 
                    include 'includes/conn.php';
                    $rownum=10000;
                                if(isset($_COOKIE["product_rows"])){
                                    $rownum=$_COOKIE["product_rows"];
                                }
                    if(isset($_COOKIE['product_cat'])){
                        $prodid=$_COOKIE['product_cat'];
                        }
                    else{
                        $prodid=0;
                    }
                    $search = "";
                    if(isset($_COOKIE['product_val'])){
                        $search = $_COOKIE['product_val'];
                    }
                    $query100="SELECT id FROM products  WHERE name LIKE '%$search%' or price LIKE '%$search%'";
                    $result100=mysqli_query($conn, $query100);
                    $count=0;
                    $rows = 0;
                    $searchcount=0;
                    $start = 1;
                    while($row100 = mysqli_fetch_assoc($result100)){
                        $userid=$row100['id'];
                        $searchcount++;
                    $query="SELECT * FROM products WHERE id=$userid" ;
                    $result=mysqli_query($conn,$query);
                    if($count<$rownum){
                        $count++;
                    while($row = mysqli_fetch_assoc($result)){
                        $rows++;
                        if ($prodid==0) {
                            echo "<div><table><tr>
                            <td></td>
                            <td>".$row['name']."</td>
                            <td><img src='images/".$row['photo']."'> <a href='img_upload.php?id=".$row['id']."'><button style='background-color:cyan;'><i class='fa fa-edit' style='float:right;background-color:magneta;'></i></button></a></td>
                            <td><button onclick='viewFunction(".$row['id'].")' style='background-color:dodgerblue;'><i class='fa fa-search'></i>View</button></td>
                            <td>$ ".$row['price']."</td>
                            <td>".$row['counter']."</td>
                            <td><button onclick='editFunction(".$row['id'].")'><i class='fa fa-edit'></i>edit</button><button onclick='delFunction(".$row['id'].")' style='background-color:rgba(255,20,20,0.9);'><i class='fa fa-trash-o'></i>delete</button></td></td>
                        </tr></table>
                        </div>";} 
                        elseif($prodid==$row['category_id']){
                                echo "<div><table><tr>
                                    <td></td>
                                    <td>".$row['name']."</td>
                                    <td><img src='images/".$row['photo']."'></td>
                                    <td><button onclick='viewFunction(".$row['id'].")' style='background-color:dodgerblue;'><i class='fa fa-search'></i>View</button></td>
                                    <td>$ ".$row['price']."</td>
                                    <td>".$row['counter']."</td>
                                    <td><button onclick='editFunction(".$row['id'].")'><i class='fa fa-edit'></i>edit</button><button onclick='delFunction(".$row['id'].")' style='background-color:rgba(255,20,20,0.7);'><i class='fa fa-trash-o'></i>delete</button></td></td>
                                </tr></table>
                                </div>";}}}} 
                        
                                
                            