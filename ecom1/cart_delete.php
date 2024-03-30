<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $stmt=$conn1->prepare("DELETE FROM cart WHERE id=?");
        $stmt->bind_param("s",$_GET['cartid']);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Deleted successfully');";}
            echo "window.location= 'cart_view.php'";
            echo "</script>";

?>