<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $cat_slug=strtolower(str_replace(" ", "_",$_COOKIE['name']));
        $stmt=$conn1->prepare("UPDATE products SET category_id=? , name=? , slug=? , price=? , description=? WHERE id=?");
        $stmt->bind_param("ssssss" , $_COOKIE['cat'] , $_COOKIE['name'] , $cat_slug , $_COOKIE['price'] , $_COOKIE['desc'] , $_COOKIE['id']);
        echo "<script>";
        if($stmt->execute()){
            echo "alert('Updated successfully');";}
            echo "window.location= 'adminproducts.php'";
            echo "</script>";
?>