<?php
        $sn="localhost";
        $un="root";
        $ps="";
        $dn="ecomm";
        $conn1=new mysqli($sn,$un,$ps,$dn);
        $newname=$_COOKIE['newname'];
        $id=$_COOKIE['id'];
        $cat_slug=strtolower(str_replace(" ", "_",$newname));
        $stmt=$conn1->prepare("UPDATE category SET name=? , cat_slug = ? WHERE id=?");
        $stmt->bind_param("sss",$newname,$cat_slug,$id);
        echo "<script>";
        if($stmt->execute()){
        echo "alert('Updated successfully');";}
        echo "window.location= 'admincat.php'";
        echo "</script>";
?>