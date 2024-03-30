<?php
    include 'includes/conn.php';
    $query="SELECT * FROM cart" ;
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)){if($_GET['cartid']==$row['id']){$q=$row['quantity']+-1;}}
    if($q<1){$q=1;}
    if(isset($_GET['cartid'])){
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
            $stmt=$conn1->prepare("UPDATE cart SET quantity= ? WHERE id=?");
            $stmt->bind_param("ss", $q,$_GET['cartid']);
            echo "<script>";
                $stmt->execute();
                    echo "window.location= 'cart_view.php'";
                    echo "</script>";
            }
?>