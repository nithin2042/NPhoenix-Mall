<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $id=1;
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $calc=$conn1->prepare("SELECT id FROM cart");
        $calc->execute();
        foreach($calc->get_result() as $row){
                if($row['id']>$id){
                    $id=$row['id'];
                }
        }
        echo 'hello'.$id.$_COOKIE['userid'].$_GET['pid'].$q;
        $id++;
        $q=1;
        $stmt=$conn1->prepare("INSERT INTO cart (id, user_id, product_id, quantity) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$id,$_COOKIE['userid'], $_GET['pid'], $q);
        echo "hello";
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Added successfully! Go to Cart to view');";}
            echo "window.location= 'cart_view.php'";
            echo "</script>";
?>