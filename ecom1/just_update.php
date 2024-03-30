<?php
$sn="localhost";
$un="root";
$ps="";
$dn="ecomm";
$conn1=new mysqli($sn,$un,$ps,$dn);
    echo $_GET['img'].$_COOKIE['imagechangeid'];
    echo "hi";
    $stmt=$conn1->prepare("UPDATE products SET photo= ? WHERE id=?");
    $stmt->bind_param("ss", $_GET['img'],$_COOKIE['imagechangeid']);
    echo "<script>";
        if($stmt->execute()){
            echo "alert('Added successfully');";}
            echo "window.location= 'adminproducts.php'";
            echo "</script>";
?>